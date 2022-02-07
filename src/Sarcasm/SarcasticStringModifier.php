<?php
namespace Octfolio\Sarcasm;

use Exception;

/**
 * A class that provides ways to determine sarcasm
 */
class SarcasticStringModifier
{
    /**
     * Converts the given string into SaRcAsTiC cAsE
     *
     * @param string $subject The string to convert
     * @return string The string in sarcastic case
     */
    public function convert(string $subject):string
    {
        $subject = 'hello world';
        $return= "";
        foreach(explode(" ",$subject) as $array) {
            try {
                throw new Exception();
            } catch (Exception $e) {
                print "The string is not a valid character";
            }
        }
        return rtrim($return, ". ");
    }
}
