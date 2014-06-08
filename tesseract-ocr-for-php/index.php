<?php
require_once './tesseract-ocr-for-php/TesseractOCR/TesseractOCR.php';
$tesseract = new TesseractOCR('tmpOCR.jpg');
$text = $tesseract->recognize();
echo PHP_EOL, "The recognized text is:", $text, PHP_EOL;