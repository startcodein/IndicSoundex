IndicSoundex
============

Indian laguage soundex package based on Santhosh Thottingal's algorithm. 
For more info on algorithm check [here](http://thottingal.in/blog/2009/07/26/indicsoundex/) 

Soundex is phonetic algorithm for indexing names by sound as
pronounced in English. This module implements Soundex algorithm for
Engish as well as a modified version of soundex algorithm for Indian
languages.

Quick start
-----------

```
git clone https://github.com/startcodein/IndicSoundex.git
```

User composer to generate autoloader

#### Generating soundex

```
<?php 

   use Startcode\IndicSoundex\IndicSoundex as IndicSoundex;
   
   $sound = new IndicSoundex();

   echo $sound->soundex('ಬೆಂಗಳೂರು').PHP_EOL;
   echo $sound->soundex('आम्र् फल्').PHP_EOL;
   echo $sound->soundex('vasudev').PHP_EOL;
   echo $sound->soundex('Rupert्').PHP_EOL;

```

This will give output
 
```
ಬDNFQCPC
आNPMQ000
v2310000
r1630000

```

#### Comparing string soundex

```
<?php 

   use Startcode\IndicSoundex\IndicSoundex as IndicSoundex;
   
   $sound = new IndicSoundex();

   echo $sound->compare('बॆंगळूरु','आम्र् फल्').PHP_EOL;
   echo $sound->compare('Bangalore','ಬೆಂಗಳೂರು').PHP_EOL;
   echo $sound->compare('बॆंगळूरु','बॆंगळूरु').PHP_EOL;
   echo $sound->compare('അമ്മ','അമ').PHP_EOL;
```

This will give output like this 

```
-1  //Not equal
-1  //Not equal
0   // Same word
1   // Similar
2   //Diff lang similar
```


License
-------
Copyright(c) 2015 Sanoob Pattanath 

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Library General Public License for more details.

Contributions
-------------
Any kind of contributions are really appreciated. If you find any bugs or security issues please email *hello[at]pattanath.com* or raise an issue on github.
