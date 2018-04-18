<?php

namespace Pavelpage\Censorship;

require_once __DIR__ . '/../vendor/autoload.php';

$censor = new Censor(['obscene_patterns' => [
    '/fuck/i',
    '/asshole/i',
    '/bastard/i',
]]);

var_dump($censor->hasObsceneWords('This fucking text is bad'));