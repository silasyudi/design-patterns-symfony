<?php

namespace App\TemplateMethod;

abstract class PdfMaker
{

    public function makePage(): string
    {
        $pageSize = "Page " . $this->pageSize();
        $fontSize = "Font Size " . $this->fontSize();
        $backgroundColor = $this->backgroundColor() . " Bg";
        $fontFamily = "Family " . $this->fontFamily();
        return sprintf('%s; %s; %s; %s', $pageSize, $fontSize, $backgroundColor, $fontFamily);
    }

    private function pageSize(): string
    {
        return 'A4';
    }

    private function fontSize(): string
    {
        return '12';
    }

    abstract protected function backgroundColor(): string;

    private function fontFamily(): string
    {
        return 'Arial';
    }
}
