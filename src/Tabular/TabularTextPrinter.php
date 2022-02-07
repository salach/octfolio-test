<?php
namespace Octfolio\Tabular;

use Exception;
/**
 * Handles the tabular-fication of data
 */
class TabularTextPrinter
{
    /**
     * Converts the given array of arrays into a multi-line string with columns formatted with spaces
     *
     * @param array $dataset An array of two-element arrays representing the dataset to print
     * @return string The formatting tabular text
     */
    public function printTabular(array $dataset): string
    {
        $return='';
        $mask = "%-15s %s\n";
        try {
            if ($dataset !== []) {
                foreach ($dataset as $animal => $desert) {
                    if ($desert === '') {
                        $mask = "%s%s\n";
                    }
                    $return .= sprintf($mask, $animal, $desert);
                }
            }
            throw new Exception();
        } catch (Exception $e) {
            print "The dataset is empty";
        }
        return $return;
    }
}
