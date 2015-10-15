<?php

require_once __DIR__.'/bootstrap.php';

use Startcode\IndicSoundex\IndicSoundex as IndicSoundex;

function sound(){

    $sound = new IndicSoundex();

    echo $sound->soundex('ಬೆಂಗಳೂರು').PHP_EOL;
    echo $sound->soundex('आम्र् फल्').PHP_EOL;
    echo $sound->soundex('vasudev').PHP_EOL;
    echo $sound->soundex('Rupert्').PHP_EOL;

}


echo sound();