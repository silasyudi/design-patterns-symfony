<?php

namespace App\TemplateMethod;

class BluePdfTemplate extends PdfMaker
{

    protected function backgroundColor(): string
    {
        return 'Blue';
    }
}
