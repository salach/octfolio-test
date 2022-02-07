<?php
namespace Octfolio\Shuffle;

use PHPUnit\Framework\TestCase;

class StringShufflerTest extends TestCase
{
    private StringShuffler $shuffler;

    protected function setUp(): void
    {
        parent::setUp();
        $this->shuffler = new StringShuffler();
    }

    public function test_shuffle_emptyStringProvided_ReturnsEmptyString()
    {
        $input = '';

        $output = $this->shuffler->shuffle($input);

        $this->assertEquals('', $output);
    }

    public function test_shuffle_StringProvided_returnsShuffledString()
    {
        $input = 'abcdefgh';

        $output = $this->shuffler->shuffle($input);

        $this->assertEquals('hfdbaceg', $output);

    }

    public function test_shuffle_StringProvidedWithSpace_returnsShuffledString()
    {
        $input = 'hotdog stand';

        $output = $this->shuffler->shuffle($input);

        $this->assertEquals('dasgdohto tn', $output);

    }

    public function test_shuffle_StringProvidedFirstString_becomesCentreString()
    {
        $input = 'abcdefgh';
        $new_input = $this->shuffler->shuffle($input);
        $new_input = str_split($new_input);

        $output = $new_input[sizeof($new_input)/2];

        $this->assertEquals('a', $output);

    }

}
