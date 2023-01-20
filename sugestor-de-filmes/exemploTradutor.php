<?php

require_once 'vendor/autoload.php';

use Stichoza\GoogleTranslate\GoogleTranslate;

$tr = new GoogleTranslate('en'); // Translates into English

$tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
#$tr->setSource('en'); // Translate from English
$tr->setSource(); // Detect language automatically
$tr->setTarget('pt'); // Translate to portuguese

echo $tr->translate('Hello World!');