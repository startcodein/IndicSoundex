<?php

/**
 * Part of IndicSoundex.
 * User: shanoop
 * Date: 16/10/15
 * Time: 11:11 AM
 */
use \Startcode\IndicSoundex\IndicSoundex as IndicSoundex;

class IndicSoundexTest extends PHPUnit_Framework_TestCase
{




    /**
     * String Soundex generation test
     * @param $word
     * @param $expected
     * @dataProvider soundexProvider
     */

    public function testSoundex($word,$expected)
    {
        $soundex = new IndicSoundex();

        $this->assertEquals($expected,$soundex->soundex($word));
    }

    /*
     * Data set for soundex test
     */

    public function soundexProvider()
    {
        // Add your soundex tests here
        return [
           'small en_US' =>  ['vasudev', 'v2310000'],
           'camel en_US' =>  ['Rupert', 'r1630000'],
           'kn_IN'       =>  ['ಬೆಂಗಳೂರು', 'ಬDNFQCPC'],
           'hi_IN'       =>  ['आम्र् फल्', 'आNPMQ000']
        ];

    }

    /**
     * String Soundex comparison test
     * @param $word1
     * @param $word2
     * @param $expected
     * @dataProvider compareProvider
     */

    public function testCompare($word1, $word2, $expected)
    {
        $soundex = new IndicSoundex();


        $this->assertEquals($expected,$soundex->compare($word1,$word2));
    }

    public function compareProvider()
    {
        //add String comparison tests here
        return [
           'hi_IN not equal'  => ['बॆंगळूरु', 'आम्र् फल्', -1],
           'en_US and kn_IN not equal'    => ['Bangalore', 'ಬೆಂಗಳೂರು', -1],
           'hi_IN equal'    => ['बॆंगळूरु', 'बॆंगळूरु', 0],
           'ml_IN equal sound' =>['അമ്മ','അമ',1],
           'kn_IN and hi_IN sound equal'  => ['ಬೆಂಗಳೂರು', 'बॆंगळूरु', 2]
        ];
    }
}
