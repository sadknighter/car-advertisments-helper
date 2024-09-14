<?php
echo "Hello, world!";
require 'vendor/autoload.php';
use ZipArchive;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$objPHPExcel = new Spreadsheet();
$filePath  = "./cherry.xlsx";
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
$sheet = $result = $spreadsheet->getActiveSheet();
$cellsData = $result->toArray();

if (count($cellsData) > 1) {
    foreach ($cellsData as $key=>$cellRow) {
        echo "Row data: [";
        echo var_dump($cellRow);
        echo "]<br>";
    }
}