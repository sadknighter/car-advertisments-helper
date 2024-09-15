<?php
echo "Hello, world!";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$filePath  = "./cherry.xlsx";
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
$sheet = $spreadsheet->getActiveSheet();
$cellsData = $sheet->toArray();

if (count($cellsData) > 1) {
    foreach ($cellsData as $key=>$cellRow) {
        echo "Row data: [";
        echo var_dump($cellRow);
        echo "]<br>";
    }
}