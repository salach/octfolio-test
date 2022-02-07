<?php
namespace Octfolio\Shuffle;

use Exception;

$dir = dirname(__DIR__, 2);
echo $dir.'/vendor';

require $dir.'/vendor/autoload.php';
/**
 * Shuffles strings
 */
class StringShuffler
{
    public static function array_swap(&$array,$swap_a,$swap_b){
        list($array[$swap_a],$array[$swap_b]) = array($array[$swap_b],$array[$swap_a]);
    }

    public function shuffle(string $input): string
    {
        $output = '';
        try {
            if($input !== '') {
                $input = str_split($input);
                $cp_input = $input;

                $str_input_count = sizeof($input);
                $odd_value = array();
                $even_value = array();

                $this->array_swap($input,(int)0,(int)$str_input_count/2);

                foreach ($cp_input as $key => $value) {
                    if($key !== 0) {
                        if ((!($key % 2))) { // skip even index
                            continue;
                        }
                        array_push($odd_value,$value);
                    }
                }

                foreach ($cp_input as $key => $value) {
                    if($key !== 0) {
                        if ($key % 2) { // skip odd index
                            continue;
                        }
                        array_push($even_value,$value);
                    }
                }

                $str_odd_value = implode("", array_reverse($odd_value));
                $str_even_value = implode("", $even_value);

                $output = $str_odd_value.$input[$str_input_count/2].$str_even_value;
            }
            throw new Exception();
        }catch (Exception $e) {
            print "The input is an empty string";
        }

        return $output;
    }
}
