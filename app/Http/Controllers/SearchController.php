<?php

namespace App\Http\Controllers;

use App\Spreadsheet;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $user = [];
        $message = '';
        if($request->get('seriya', null) && $request->get('nomer', null))
        {
            $user = Spreadsheet::where('seriya', '=',$request->get('seriya', null))
                ->where( 'nomer', '=',$request->get('nomer', null))
                ->first();

            if(!$user){
                $message = 'Вас нет в списке, возможно вы неправильно ввели свои данные!
Если Ваш балл (сумма вступительных испытаний и среднего балла документа об образовании) равен или выше проходного балла на ту специальность, на которую Вы подавали документы, и Вас нет в статусе зачисленных, просьба позвонить по телефонам.';
            }
        }
        return view('search.index', compact('user', 'message'));
    }
}
