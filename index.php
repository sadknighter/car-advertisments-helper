<?php

use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

echo "Hello, world!<br>";
require 'vendor/autoload.php';

$filePath  = "./cherry.xlsx";
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
$sheet = $spreadsheet->getActiveSheet();
$cellsData = $sheet->toArray();
$carsData = [];

if (count($cellsData) > 1) {
    foreach ($cellsData as $key=>$row) {
        if ($key > 0 && !IsGrouppedDataRow($row)) {

            $carsDataItem = array(
                "NAME" => $row[0],
                "MODEL" => $row[1],
                "COMPLECTATION" => $row[2],
                "OPTIONS" => $row[3],
                "YEAR" => $row[4],
                "COLOR" => $row[5],
                "VIN" => $row[6],
                "PTC" => $row[7],
                "DIRECT" => $row[8],
                "CREDIT" => $row[9],
                "TRADE-IN" => $row[10],
                "DISCOUNT" => $row[11],
                "SUM_WITH_DISCOUNT" => $row[12]
            );

            $carsData[] = $carsDataItem;
            
            echo "Row data: [";
            echo var_dump($carsDataItem);
            echo "]<br>";
        }
    }
}

/**
 * Check that row has grouped cells
 *
 * @param array $row row from xlsx spreadsheet
 * @return bool Returns is row groupped
 */
function IsGrouppedDataRow($row) : bool {
    $result = $row[0] != null;
    $rowLength = count($row);

    for ($i = 1; $i < $rowLength; $i++) {
        $result = $result && $row[$i];
    }

    return $result;
}