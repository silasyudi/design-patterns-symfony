<?php

namespace App\TemplateMethod;

class RedPdfTemplate extends PdfMaker
{

    protected function backgroundColor(): string
    {
        return 'Red';
    }
}
