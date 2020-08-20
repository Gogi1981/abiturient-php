<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set("memory_limit","1024M");
ini_set('max_execution_time', 1800);
require_once('../vendor/autoload.php');
//use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
DB::table('users')->delete();
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load("img/abiturient.xlsx");

//$cells = $spreadsheet->getActiveSheet()->getCellCollection();
$worksheet = $spreadsheet->getActiveSheet();
echo '<pre>';
print_r($worksheet->toArray());
echo '</pre>';

die;
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("img/abiturient.xlsx");
$sheet = $spreadsheet->getActiveSheet();



?>