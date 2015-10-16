<?php

#
# Created as part of startcodein/indicsoundex
# Copyright 2015-2016 Sanoob Pattanath <hello[at]pattanath.com>
# http://startcode.in
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Library General Public License for more details.
#
# If you find any bugs or security issues please email <hello[at]pattanath.com> or raise an issue on github.
#


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