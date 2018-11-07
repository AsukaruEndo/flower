<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\charge_person;
use DB;

class personController extends Controller
{
        // 事業所に応じて従業員を返す
    public function persondata(Request $request)
    {
    	$validatedData = $request->validate([
        	'office_name' => 'required|integer',
    	]);
        $sql = "SELECT cp.id, cp.charge_person_name 
                FROM charge_persons AS cp 
                INNER JOIN offices AS o ON cp.office_no=o.office_no 
                WHERE cp.office_no=:office_name ORDER BY cp.id ASC";
        $row = DB::select($sql, $validatedData);
        $ret = array();
        $ret['result'] = true;
        $ret['data'] = $row;
        $ret['error'] = array();
        return response()->json($ret);
    }
}
