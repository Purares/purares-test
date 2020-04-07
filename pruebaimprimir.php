<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;


$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('template-op-v52.xlsx');

$worksheet = $spreadsheet->getActiveSheet();

$worksheet->getCell('H10')->setValue('Esto es una prueba');


$spreadsheet->getActiveSheet()->setShowGridLines(false);

$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);

$spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);

$spreadsheet->getActiveSheet()->getPageMargins()->setTop(0.1);

$spreadsheet->getActiveSheet()->getPageMargins()->setRight(0.1);

$spreadsheet->getActiveSheet()->getPageMargins()->setLeft(0.25);

$spreadsheet->getActiveSheet()->getPageMargins()->setBottom(0.1);


$writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf($spreadsheet);

$writer->save("Op N°.pdf");