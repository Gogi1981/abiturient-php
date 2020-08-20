<?php

namespace App\Http\Controllers;

use App\Spreadsheet;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SpreadsheetController extends Controller
{
    public function index(Request $request)
    {


        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load("img/abiturient.xlsx");

//$cells = $spreadsheet->getActiveSheet()->getCellCollection();
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();
        $keys = array_shift($data);
        DB::table('spreadsheets')->delete();
        foreach($data as $row)
        {

            $row =array_combine($keys, $row);
            if(count(array_filter($row))< count($row)){
                continue;
            }

            $model = new Spreadsheet($row);
            $model->save();

        }
        return view('excel.index');
    }


}
