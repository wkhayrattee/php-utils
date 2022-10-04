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
    public static function truncateSentence(string $sentence, int $maxCharacter=60, string $appendedString="&hellip;")
    {
        $sentence = trim($sentence);

        if (strlen($sentence) > $maxCharacter) {
            $sentence = wordwrap($sentence, $maxCharacter);
            $explodedSentence = explode("\n", $sentence, 2);
            $sentence = $explodedSentence[0] . $appendedString;
        }

        return $sentence;
    }
}
