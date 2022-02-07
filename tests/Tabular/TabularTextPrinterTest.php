<?php
namespace Octfolio\Tabular;

use PHPUnit\Framework\TestCase;

class TabularTextPrinterTest extends TestCase
{
    private TabularTextPrinter $tabularText;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tabularText = new TabularTextPrinter();
    }

    public function test_print_emptyArrayProvided_returnsEmptyString()
    {
        $dataset = [];

        $result = $this->tabularText->printTabular($dataset);

        $this->assertEquals('', $result);
    }

    public function test_print_ArrayProvided_returnsTabularString()
    {
        $dataset = [
            'Giraffe' => 'Ice-cream',
            'Elephant' => 'Tiramisu',
            'Lion' => 'Golden Gaytime',
            'Mosquito' => 'Banana Split',
            'Yellow Jacket' => 'Jelly'
        ];

        $result = $this->tabularText->printTabular($dataset);

        $string1 = "Giraffe         Ice-cream".PHP_EOL;
        $string2 = "Elephant        Tiramisu".PHP_EOL;
        $string3 = "Lion            Golden Gaytime".PHP_EOL;
        $string4 = "Mosquito        Banana Split".PHP_EOL;
        $string5 = "Yellow Jacket   Jelly".PHP_EOL;
        $value = $string1.=$string2.=$string3.=$string4.=$string5;


        $this->assertEquals($value, $result);
    }

    public function test_print_ArrayProvidedWithEmptyFirstColumn_returnsTabularStringWithSpace()
    {
        $dataset = [
            'Giraffe' => 'Ice-cream',
            'Elephant' => 'Tiramisu',
            'Lion' => 'Golden Gaytime',
            'Mosquito' => 'Banana Split',
            '' => 'Jelly'
        ];

        $result = $this->tabularText->printTabular($dataset);

        $string1 = "Giraffe         Ice-cream".PHP_EOL;
        $string2 = "Elephant        Tiramisu".PHP_EOL;
        $string3 = "Lion            Golden Gaytime".PHP_EOL;
        $string4 = "Mosquito        Banana Split".PHP_EOL;
        $string5 = "                Jelly".PHP_EOL;
        $value = $string1.=$string2.=$string3.=$string4.=$string5;


        $this->assertEquals($value, $result);
    }

    public function test_print_ArrayProvidedWithEmptySecondColumn_returnsTabularStringWithCellExcluded()
    {
        $dataset = [
            'Giraffe' => 'Ice-cream',
            'Elephant' => 'Tiramisu',
            'Lion' => 'Golden Gaytime',
            'Mosquito' => 'Banana Split',
            'Yellow Jacket' => ''
        ];

        $result = $this->tabularText->printTabular($dataset);

        $string1 = "Giraffe         Ice-cream".PHP_EOL;
        $string2 = "Elephant        Tiramisu".PHP_EOL;
        $string3 = "Lion            Golden Gaytime".PHP_EOL;
        $string4 = "Mosquito        Banana Split".PHP_EOL;
        $string5 = "Yellow Jacket".PHP_EOL;
        $value = $string1.=$string2.=$string3.=$string4.=$string5;
        $this->assertEquals($value, $result);
    }
}
