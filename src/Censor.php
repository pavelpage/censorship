<?php

namespace Pavelpage\Censorship;


class Censor {

    protected $obscenePatterns = [];
    protected $exceptWords = [];
    protected $replacePattern = ' ***';
    protected $obsceneWords = [];

    private $tmpExcluded = [];

    /**
     * Censor constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {

        $configFile = include __DIR__.'/config.php';

        $configInfo = array_merge($configFile, $config);

        $this->obscenePatterns = array_merge($configInfo['default_obscene_patterns'], $configInfo['obscene_patterns']);
        $this->replacePattern = $configInfo['replace_pattern'];
        $this->obsceneWords = $configInfo['obscene_words'];
        $this->exceptWords = $configInfo['except_words'];
    }

    /**
     * @param $text
     * @return string
     */
    public function clean($text)
    {
        $patterns = $this->obscenePatterns;
        $replaceString = $this->replacePattern;

        $text = $this->temporarySaveExcludedWords($text);

        foreach ($patterns as $pattern) {
            $text = preg_replace($pattern, $replaceString, $text);
        }

        $text = $this->setTemporarySavedExcludedWords($text);
        $text = $this->replaceCustomObsceneWords($text);
        return $text;
    }

    /**
     * @param $text
     * @return mixed
     */
    public function replaceCustomObsceneWords($text)
    {
        return str_replace($this->obsceneWords, $this->replacePattern, $text);
    }

    /**
     * @param $text
     * @return string
     */
    public function temporarySaveExcludedWords($text)
    {
        // take words
        // and save it to array
        // 'excluded word' => '%excluded_word_$index%', ...
        $arr = explode(' ', $text);
        $tmpExcluded = [];
        $index = 0;

        foreach ($arr as $word) {
            $word = str_replace([',','.','-','='],'',$word);
            if (in_array($word,$this->exceptWords)) {
                $tmpExcluded["%excluded_word_{$index}%"] = $word;
            }

            $index++;
        }

        $this->tmpExcluded = $tmpExcluded;
        return str_replace($this->exceptWords, array_flip($tmpExcluded), $text);
    }

    /**
     * @param $text
     * @return string
     */
    public function setTemporarySavedExcludedWords($text)
    {
        return str_replace(array_keys($this->tmpExcluded), array_values($this->tmpExcluded), $text);
    }


    /**
     * @param $text
     * @return bool
     */
    public function hasObsceneWords($text)
    {
        $patterns = $this->obscenePatterns;

        $text = $this->temporarySaveExcludedWords($text);

        foreach ($patterns as $pattern) {
            if(preg_match($pattern, $text)) {
                return true;
            }
        }

        return false;
    }

}