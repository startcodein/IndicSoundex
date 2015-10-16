<?php
#
#startcodein/indicsoundex
#{description}
#Copyright(C) 2015 Sanoob Pattanath <hello[at]pattanath.com>
#http://startcode.in
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
#If you find any bugs or security issues please email <hello[at]pattanath.com> or raise an issue on github.
#

namespace Startcode\IndicSoundex;


class IndicSoundex
{

    /**
     * Indic soundex character map, adapted from
     * http://thottingal.in/soundex/soundex.html
     */
   private $charmap=[
       "hi_IN"=>[ "ँ", "ं", "ः", "ऄ", "अ", "आ", "इ", "ई", "उ", "ऊ", "ऋ", "ऌ", "ऍ", "ऎ", "ए", "ऐ", "ऑ", "ऒ", "ओ", "औ", "क", "ख", "ग", "घ", "ङ", "च", "छ", "ज", "झ", "ञ", "ट", "ठ", "ड", "ढ", "ण", "त", "थ", "द", "ध", "न", "ऩ", "प", "फ", "ब", "भ", "म", "य", "र", "ऱ", "ल", "ळ", "ऴ", "व", "श", "ष", "स", "ह", "ऺ", "ऻ", "़", "ऽ", "ा", "ि", "ी", "ु", "ू", "ृ", "ॄ", "ॅ", "ॆ", "े", "ै", "ॉ", "ॊ", "ो", "ौ", "्", "ॎ", "ॏ", "ॐ", "॑", "॒", "॓", "॔", "ॕ", "ॖ", "ॗ", "क़", "ख़", "ग़", "ज़", "ड़", "ढ़", "फ़", "य़", "ॠ", "ॡ", "ॢ", "ॣ", "।", "॥", "०", "१", "२", "३", "४", "५", "६", "७", "८", "९", "॰", "ॱ", "ॲ", "ॳ", "ॴ", "ॵ", "ॶ", "ॷ", "ॸ", "ॹ", "ॺ", "ॻ", "ॼ", "ॽ", "ॾ", "ॿ" ],
       "bn_IN"=>[ "ঁ", "ং", "ঃ", "঄", "অ", "আ", "ই", "ঈ", "উ", "ঊ", "ঋ", "ঌ", "঍", "঎", "এ", "ঐ", "঑", "঒", "ও", "ঔ", "ক", "খ", "গ", "ঘ", "ঙ", "চ", "ছ", "জ", "ঝ", "ঞ", "ট", "ঠ", "ড", "ঢ", "ণ", "ত", "থ", "দ", "ধ", "ন", "঩", "প", "ফ", "ব", "ভ", "ম", "য", "র", "঱", "ল", "঳", "঴", "঵", "শ", "ষ", "স", "হ", "঺", "঻", "়", "ঽ", "া", "ি", "ী", "ু", "ূ", "ৃ", "ৄ", "৅", "৆", "ে", "ৈ", "৉", "৊", "ো", "ৌ", "্", "ৎ", "৏", "৐", "৑", "৒", "৓", "৔", "৕", "৖", "ৗ", "৘", "৙", "৚", "৛", "ড়", "ঢ়", "৞", "য়", "ৠ", "ৡ", "ৢ", "ৣ", "৤", "৥", "০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "ৰ", "ৱ", "৲", "৳", "৴", "৵", "৶", "৷", "৸", "৹", "৺", "৻", "ৼ", "৽", "৾", "৿" ],
       "pa_IN"=>[ "ਁ", "ਂ", "ਃ", "਄", "ਅ", "ਆ", "ਇ", "ਈ", "ਉ", "ਊ", "਋", "਌", "਍", "਎", "ਏ", "ਐ", "਑", "਒", "ਓ", "ਔ", "ਕ", "ਖ", "ਗ", "ਘ", "ਙ", "ਚ", "ਛ", "ਜ", "ਝ", "ਞ", "ਟ", "ਠ", "ਡ", "ਢ", "ਣ", "ਤ", "ਥ", "ਦ", "ਧ", "ਨ", "਩", "ਪ", "ਫ", "ਬ", "ਭ", "ਮ", "ਯ", "ਰ", "਱", "ਲ", "ਲ਼", "਴", "ਵ", "ਸ਼", "਷", "ਸ", "ਹ", "਺", "਻", "਼", "਽", "ਾ", "ਿ", "ੀ", "ੁ", "ੂ", "੃", "੄", "੅", "੆", "ੇ", "ੈ", "੉", "੊", "ੋ", "ੌ", "੍", "੎", "੏", "੐", "ੑ", "੒", "੓", "੔", "੕", "੖", "੗", "੘", "ਖ਼", "ਗ਼", "ਜ਼", "ੜ", "੝", "ਫ਼", "੟", "੠", "੡", "੢", "੣", "੤", "੥", "੦", "੧", "੨", "੩", "੪", "੫", "੬", "੭", "੮", "੯", "ੰ", "ੱ", "ੲ", "ੳ", "ੴ", "ੵ", "੶", "੷", "੸", "੹", "੺", "੻", "੼", "੽", "੾", "੿" ],
       "gu_IN"=>[ "ઁ", "ં", "ઃ", "઄", "અ", "આ", "ઇ", "ઈ", "ઉ", "ઊ", "ઋ", "ઌ", "ઍ", "઎", "એ", "ઐ", "ઑ", "઒", "ઓ", "ઔ", "ક", "ખ", "ગ", "ઘ", "ઙ", "ચ", "છ", "જ", "ઝ", "ઞ", "ટ", "ઠ", "ડ", "ઢ", "ણ", "ત", "થ", "દ", "ધ", "ન", "઩", "પ", "ફ", "બ", "ભ", "મ", "ય", "ર", "઱", "લ", "ળ", "઴", "વ", "શ", "ષ", "સ", "હ", "઺", "઻", "઼", "ઽ", "ા", "િ", "ી", "ુ", "ૂ", "ૃ", "ૄ", "ૅ", "૆", "ે", "ૈ", "ૉ", "૊", "ો", "ૌ", "્", "૎", "૏", "ૐ", "૑", "૒", "૓", "૔", "૕", "૖", "૗", "૘", "૙", "૚", "૛", "૜", "૝", "૞", "૟", "ૠ", "ૡ", "ૢ", "ૣ", "૤", "૥", "૦", "૧", "૨", "૩", "૪", "૫", "૬", "૭", "૮", "૯", "૰", "૱", "૲", "૳", "૴", "૵", "૶", "૷", "૸", "ૹ", "ૺ", "ૻ", "ૼ", "૽", "૾", "૿" ],
       "or_IN"=>[ "ଁ", "ଂ", "ଃ", "଄", "ଅ", "ଆ", "ଇ", "ଈ", "ଉ", "ଊ", "ଋ", "ଌ", "଍", "଎", "ଏ", "ଐ", "଑", "଒", "ଓ", "ଔ", "କ", "ଖ", "ଗ", "ଘ", "ଙ", "ଚ", "ଛ", "ଜ", "ଝ", "ଞ", "ଟ", "ଠ", "ଡ", "ଢ", "ଣ", "ତ", "ଥ", "ଦ", "ଧ", "ନ", "଩", "ପ", "ଫ", "ବ", "ଭ", "ମ", "ଯ", "ର", "଱", "ଲ", "ଳ", "଴", "ଵ", "ଶ", "ଷ", "ସ", "ହ", "଺", "଻", "଼", "ଽ", "ା", "ି", "ୀ", "ୁ", "ୂ", "ୃ", "ୄ", "୅", "୆", "େ", "ୈ", "୉", "୊", "ୋ", "ୌ", "୍", "୎", "୏", "୐", "୑", "୒", "୓", "୔", "୕", "ୖ", "ୗ", "୘", "୙", "୚", "୛", "ଡ଼", "ଢ଼", "୞", "ୟ", "ୠ", "ୡ", "ୢ", "ୣ", "୤", "୥", "୦", "୧", "୨", "୩", "୪", "୫", "୬", "୭", "୮", "୯", "୰", "ୱ", "୲", "୳", "୴", "୵", "୶", "୷", "୸", "୹", "୺", "୻", "୼", "୽", "୾", "୿" ],
       "ta_IN"=>[ "஁", "ஂ", "ஃ", "஄", "அ", "ஆ", "இ", "ஈ", "உ", "ஊ", "஋", "஌", "஍", "எ", "ஏ", "ஐ", "஑", "ஒ", "ஓ", "ஔ", "க", "஖", "஗", "஘", "ங", "ச", "஛", "ஜ", "஝", "ஞ", "ட", "஠", "஡", "஢", "ண", "த", "஥", "஦", "஧", "ந", "ன", "ப", "஫", "஬", "஭", "ம", "ய", "ர", "ற", "ல", "ள", "ழ", "வ", "ஶ", "ஷ", "ஸ", "ஹ", "஺", "஻", "஼", "஽", "ா", "ி", "ீ", "ு", "ூ", "௃", "௄", "௅", "ெ", "ே", "ை", "௉", "ொ", "ோ", "ௌ", "்", "௎", "௏", "ௐ", "௑", "௒", "௓", "௔", "௕", "௖", "ௗ", "௘", "௙", "௚", "௛", "௜", "௝", "௞", "௟", "௠", "௡", "௢", "௣", "௤", "௥", "௦", "௧", "௨", "௩", "௪", "௫", "௬", "௭", "௮", "௯", "௰", "௱", "௲", "௳", "௴", "௵", "௶", "௷", "௸", "௹", "௺", "௻", "௼", "௽", "௾", "௿" ],
       "te_IN"=>[ "ఁ", "ం", "ః", "ఄ", "అ", "ఆ", "ఇ", "ఈ", "ఉ", "ఊ", "ఋ", "ఌ", "఍", "ఎ", "ఏ", "ఐ", "఑", "ఒ", "ఓ", "ఔ", "క", "ఖ", "గ", "ఘ", "ఙ", "చ", "ఛ", "జ", "ఝ", "ఞ", "ట", "ఠ", "డ", "ఢ", "ణ", "త", "థ", "ద", "ధ", "న", "఩", "ప", "ఫ", "బ", "భ", "మ", "య", "ర", "ఱ", "ల", "ళ", "ఴ", "వ", "శ", "ష", "స", "హ", "఺", "఻", "఼", "ఽ", "ా", "ి", "ీ", "ు", "ూ", "ృ", "ౄ", "౅", "ె", "ే", "ై", "౉", "ొ", "ో", "ౌ", "్", "౎", "౏", "౐", "౑", "౒", "౓", "౔", "ౕ", "ౖ", "౗", "ౘ", "ౙ", "ౚ", "౛", "౜", "ౝ", "౞", "౟", "ౠ", "ౡ", "ౢ", "ౣ", "౤", "౥", "౦", "౧", "౨", "౩", "౪", "౫", "౬", "౭", "౮", "౯", "౰", "౱", "౲", "౳", "౴", "౵", "౶", "౷", "౸", "౹", "౺", "౻", "౼", "౽", "౾", "౿" ],
       "kn_IN"=>[ "ಁ", "ಂ", "ಃ", "಄", "ಅ", "ಆ", "ಇ", "ಈ", "ಉ", "ಊ", "ಋ", "ಌ", "಍", "ಎ", "ಏ", "ಐ", "಑", "ಒ", "ಓ", "ಔ", "ಕ", "ಖ", "ಗ", "ಘ", "ಙ", "ಚ", "ಛ", "ಜ", "ಝ", "ಞ", "ಟ", "ಠ", "ಡ", "ಢ", "ಣ", "ತ", "ಥ", "ದ", "ಧ", "ನ", "಩", "ಪ", "ಫ", "ಬ", "ಭ", "ಮ", "ಯ", "ರ", "ಱ", "ಲ", "ಳ", "಴", "ವ", "ಶ", "ಷ", "ಸ", "ಹ", "಺", "಻", "಼", "ಽ", "ಾ", "ಿ", "ೀ", "ು", "ೂ", "ೃ", "ೄ", "೅", "ೆ", "ೇ", "ೈ", "೉", "ೊ", "ೋ", "ೌ", "್", "೎", "೏", "೐", "೑", "೒", "೓", "೔", "ೕ", "ೖ", "೗", "೘", "೙", "೚", "೛", "೜", "ೝ", "ೞ", "೟", "ೠ", "ೡ", "ೢ", "ೣ", "೤", "೥", "೦", "೧", "೨", "೩", "೪", "೫", "೬", "೭", "೮", "೯", "೰", "ೱ", "ೲ", "ೳ", "೴", "೵", "೶", "೷", "೸", "೹", "೺", "೻", "೼", "೽", "೾", "೿"],
       "ml_IN"=>[ "ഁ", "ം", "ഃ", "ഄ", "അ", "ആ", "ഇ", "ഈ", "ഉ", "ഊ", "ഋ", "ഌ", "഍", "എ", "ഏ", "ഐ", "഑", "ഒ", "ഓ", "ഔ", "ക", "ഖ", "ഗ", "ഘ", "ങ", "ച", "ഛ", "ജ", "ഝ", "ഞ", "ട", "ഠ", "ഡ", "ഢ", "ണ", "ത", "ഥ", "ദ", "ധ", "ന", "ഩ", "പ", "ഫ", "ബ", "ഭ", "മ", "യ", "ര", "റ", "ല", "ള", "ഴ", "വ", "ശ", "ഷ", "സ", "ഹ", "ഺ", "഻", "഼", "ഽ", "ാ", "ി", "ീ", "ു", "ൂ", "ൃ", "ൄ", "൅", "െ", "േ", "ൈ", "൉", "ൊ", "ോ", "ൌ", "്", "ൎ", "൏", "൐", "൑", "൒", "൓", "ൔ", "ൕ", "ൖ", "ൗ", "൘", "൙", "൚", "൛", "൜", "൝", "൞", "ൟ", "ൠ", "ൡ", "ൢ", "ൣ", "൤", "൥", "൦", "൧", "൨", "൩", "൪", "൫", "൬", "൭", "൮", "൯", "൰", "൱", "൲", "൳", "൴", "൵", "൶", "൷", "൸", "൹", "ൺ", "ൻ", "ർ", "ൽ", "ൾ", "ൿ" ],
       "en_US"=>[ "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t","u", "v", "w", "x", "y", "z" ] ,
       "soundex_en"=>["0","1","2","3","0","1","2","0","0","2","2","4","5","5","0","1","2","6","2","3","0","1","0","2","0","2"],
       "soundex"=>['0', 'N', '0', '0', 'A', 'A', 'B', 'B', 'C', 'C', 'P', 'Q', '0', 'D', 'D', 'D', 'E', 'E', 'E', 'E', 'F', 'F', 'F', 'F', 'G', 'H', 'H', 'H', 'H', 'G', 'I', 'I', 'I', 'I', 'J', 'K', 'K', 'K', 'K', 'L', 'L', 'M', 'M', 'M', 'M', 'N', 'O', 'P', 'P', 'Q', 'Q', 'Q', 'R', 'S', 'S', 'S', 'T', '0', '0', '0', '0', 'A', 'B', 'B', 'C', 'C', 'P', 'P', 'E', 'D', 'D', 'D', 'D', 'E', 'E', 'E', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'E', '0', '0', '0', '0', '0', '0', '0', '0', 'P', 'Q', 'Q', 'Q', '0', '0', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'J', 'J', 'Q', 'P', 'P', 'F'],
       "soundex_old"=>[ 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0,0, 0, 0,0,1, 1,1, 1, 5, 2, 2,2,2, 5,3, 3,3, 3,5, 4,4, 4, 4, 5, 5, 4, 4, 4, 4, 5, 6, 7, 7, 8, 8, 8, 6, 9, 9, 9, 6,  0, 0, 0, 0, 0, 0,0, 0,0,0, 0, 0,0, 0, 0,0, 0,0,0,0,0, 0,0, 0,0,0, 0, 0, 0, 0 , 0, 0 , 0,  0, 0 , 0 ,  0,  0,  0, 0, 0, 0 ,0 ,  0, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ]
   ];

    public function __construct()
    {    }

    /**
     * Splits multibyte string to an array of multi-byte characters
     *
     * @param $string mb_string
     * @return array
     */
    private function mb_str_split( $string )
    {
        # Split at all position not after the start: ^
        # and not before the end: $
        return preg_split('/(?<!^)(?!$)/u', $string );
    }

    /**
     *  Detect multi-byte string language from charmap
     * @param $char
     * @return int|null|string
     */

    private function language($char)
    {
        //TODO better way to find language from unicode character
        foreach($this->charmap as $lang => $letters){
            foreach($letters as $letter){
                if( $letter === $char)
                    return $lang;
            }
        }
        return null;
    }

    /**
     * Create soundex code for multi-byte character
     * @param $char
     * @return int
     */

    private function soundexCode($char)
    {
        $idx = 0;
        $lang = $this->language($char);
        $soundex_map = ($lang === 'en_US')? 'soundex_en':'soundex';

        if(is_null($lang))
            return 0;

        $idx = array_search($char,$this->charmap[$lang]);

        if($idx === false)
            return 0;

        if(isset($this->charmap[$soundex_map][$idx]))
            return $this->charmap[$soundex_map][$idx];

        return 0;
    }

    /**
     * Makes soundex for given multi-byte string with default length of 8 and padded with 0s
     *
     * @param $word
     * @param int $length length of soundex
     * @return string
     */

    public function soundex($word, $length = 8)
    {
        $sndx = NULL;
        $firstChar = NULL;

        $lword = mb_strtolower($word);

        $lword = $this->mb_str_split($lword); // String to array

        // Translate alpha chars in name to soundex digits

        foreach($lword as $pos => $char){

            if(is_null($firstChar))
                //Keep first character
                $firstChar = $char;

            $sound = $this->soundexCode($char);

            if($sound === '0')
                continue;

            //Duplicate consecutive soundex digits are skipped
            if(is_null($sndx) or ( $sound != mb_substr($sndx,-1)))
                $sndx .= $sound;
        }

        //Replace first character with first alpha character
        $sndx = $firstChar. mb_substr($sndx,1);

        //Return soundex code padded to len characters
        $pad = str_repeat('0',$length);

        return mb_substr($sndx.$pad,0,$length);
    }


    /**
     * Multi-byte string soundex compare
     * @param $string1
     * @param $string2
     * @return int [-1,0,1,2]
     */

    public function compare($string1, $string2)
    {
        if($string1 === $string2)
            return 0;

        $soundex1 = $this->soundex($string1);
        $soundex2 = $this->soundex($string2);

        if($soundex1 ===$soundex2)
            return 1;

        //Check whether the first letters are phonetically same from different languages
        if($this->soundexCode($string1[0]) === $this->soundexCode($string2[0])){
            if(mb_substr($soundex1,1) === mb_substr($soundex2,1))
                return 2;
        }

        //String doesn't match
        return -1;
    }

}