<?php

class Pdf
{
    public function __construct()
    {
        include APPPATH . 'third_party/fpdf/fpdf.php';
    }
}
