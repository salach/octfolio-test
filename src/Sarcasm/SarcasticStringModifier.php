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
        $return= "";

            try {
                foreach(explode(" ",$subject) as $array){
                    foreach(str_split($array) as $key=>$value) {
                        $return .= ($key+1)%2!=0  ? mb_strtoupper($value) : $value;
                    }
                    $return .= " ";
                }
            } catch (Exception $e) {

            }

        return rtrim($return, ". ");
    }
}
