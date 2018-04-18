# Censor

This package could be used for cleaning obscene language from user messages.

## Usage

### Installation

Simply install it using composer command:

` composer require "pavelpage/censorship:dev-master"`

### Usage

You have to options for using this package:

**Replace obscene words**

```php
$censor = new Censor();
$text = "some text";

$censor->clean($text);// will replace obscene words in your text
```

**Check the text**

```php
$censor = new Censor();
$text = "some text";

$censor->hasObsceneWords($text);
```

## Configuration

You have a few abilities to add functionality if you think, that package doesn't solute your problems.

Here are some parameters which you can replace in the config file:

Parameter | Value
------------ | -------------
default_obscene_patterns | default patterns which used to detect obscene words
obscene_patterns | you can add your own patterns to find obscene words
replace_pattern | place symbols which will replace obscene words
obscene_words | simply write words which should be replaced
except_words | also, you can exclude some words from checking

```php

$censor = new Censor(['param_name' => []);// just send your custom configuration parameters to __construct method of controller

```

### Demo:

You can visit this site [demo](https://demo.pavelpage.ru/censorship/) and check how it is working.

### Notice:

Now package works only with russian language, feel free to add english patterns or use some patterns from the examples directory(english.php).
