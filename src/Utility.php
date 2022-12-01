<?php
/**
 * A list of handy general purpose functions
 *
 * @author Wasseem Khayrattee <wasseemk@ringier.co.za>
 * @github wkhayrattee
 */
namespace WkUtils;

class Utility
{
    /**
     * To truncate a sentence without trimming in the middle of a word
     *
     * @param string $sentence
     * @param int $maxCharacter
     * @param string $appendedString
     * @return string
     */
    public static function truncateSentence(string $sentence, int $maxCharacter=60, string $appendedString="&hellip;"): string
    {
        $sentence = trim($sentence);

        if (strlen($sentence) > $maxCharacter) {
            $sentence = wordwrap($sentence, $maxCharacter);
            $explodedSentence = explode("\n", $sentence, 2);
            $sentence = $explodedSentence[0] . $appendedString;
        }

        return $sentence;
    }

    /**
     * To validate a name input field, (for example when used on a subscription form), against the following:
     * - does it contain emoji
     * - does it contain any kind of symbol or misc charactors
     * - does it contain any dinbats characters
     * - does it contain a url
     * - does it contain a question mark ?
     * - does it contain suspicious url specific patterns like: .ru, .php, www.
     *
     * NOTE: See Test case for scenarios
     *
     * @param $dirty_string
     * @param false $char_length
     * @return bool
     */
    public static function isValidTextField($dirty_string, $char_length=false)
    {
//        //Check for any emojis / maps / Dingbats / misc symbols characters
//        $dirty_string_to_uft8 = mb_convert_encoding($dirty_string, "UTF-8");
//        $isMatched = preg_match('/[\x00-\x1F\x80-\xFF]/', $dirty_string_to_uft8);
//
//        if ($isMatched == 1) {
//            return false;
//        }

        $pattern = '/[\x{1F600}-\x{1F64F}]/u';
        $isMatched = preg_match($pattern, $dirty_string);
        if ($isMatched == 1) {
            return false;
        }
        //Symbols & Pictographs
        $pattern = '/[\x{1F300}-\x{1F5FF}]/u';
        $isMatched = preg_match($pattern, $dirty_string);
        if ($isMatched == 1) {
            return false;
        }
        //Transport & Map Symbols
        $pattern = '/[\x{1F680}-\x{1F6FF}]/u';
        $isMatched = preg_match($pattern, $dirty_string);
        if ($isMatched == 1) {
            return false;
        }
        //More Miscellaneous Symbols and Pictographs
        $pattern = '/[\x{1F300}-\x{1F5FF}]/u';
        $isMatched = preg_match($pattern, $dirty_string);
        if ($isMatched == 1) {
            return false;
        }
        //Misc Symbols
        $pattern = '/[\x{2600}-\x{26FF}]/u';
        $isMatched = preg_match($pattern, $dirty_string);
        if ($isMatched == 1) {
            return false;
        }
        $pattern = '/[\x{2600}-\x{26FF}]/u';
        $isMatched = preg_match($pattern, $dirty_string);
        if ($isMatched == 1) {
            return false;
        }
        //Dingbats Symbols
        $pattern = '/[\x{2700}-\x{27BF}]/u';
        $isMatched = preg_match($pattern, $dirty_string);
        if ($isMatched == 1) {
            return false;
        }

        //check for any urls
        $isMatched = preg_match('/(http|https|ftp|mailto)/', $dirty_string);
        if ($isMatched == 1) {
            return false;
        }

        // if matches any of the following
        $dirty_pattern = [
            '.ru',
            '.php',
            'www.',
            '?'
        ];
        foreach ($dirty_pattern as $pattern) {
            if (str_contains($dirty_string, $pattern)) {
                return false;
            }
        }

        //if length of string is too long
        if (($char_length !== false) && strlen($dirty_string) >= $char_length) {
            return false;
        }

        return true;
    }
}
