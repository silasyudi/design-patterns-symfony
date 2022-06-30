<?php

namespace App\Tests\TemplateMethod;

use App\TemplateMethod\BluePdfTemplate;
use App\TemplateMethod\RedPdfTemplate;
use PHPUnit\Framework\TestCase;

class PdfMakerTest extends TestCase
{

    public function testBluePdfTemplate(): void
    {
        $rawString = (new BluePdfTemplate())->makePage();
        $this->assertEquals("Page A4; Font Size 12; Blue Bg; Family Arial", $rawString);
    }

    public function testRedPdfTemplate(): void
    {
        $rawString = (new RedPdfTemplate())->makePage();
        $this->assertEquals("Page A4; Font Size 12; Red Bg; Family Arial", $rawString);
    }
}
