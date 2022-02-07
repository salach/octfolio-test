<?php
namespace Octfolio\Sarcasm;

use PHPUnit\Framework\TestCase;

class SarcasticStringModifierTest extends TestCase
{
    private SarcasticStringModifier $modifier;

    protected function setUp() : void
    {
        parent::setUp();
        $this->modifier = new SarcasticStringModifier();
    }

    public function test_convert_emptyStringProvided_returnsEmptyString()
    {
        $subject = '';

        $result = $this->modifier->convert($subject);

        $this->assertEquals('', $result);
    }

    public function test_convert_StringProvided_returnsSarcasticString(): void
    {
        $subject = 'Well Thank You';

        $result = $this->modifier->convert($subject);

        $this->assertEquals('WeLl ThAnK YoU', $result);
    }
}
