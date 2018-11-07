<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\market;
use App\number_of_production;
use App\box;

class sharingController extends Controller
{
    //
    public function sharing(Request $request){
    	$validatedData = $request->validate([
	        'date' => 'required|date',
	        'office' => 'required|string'
    	]);

    	// 市場情報の取得
    	$market = market::get(['id', 'market_no', 'market_name']);

    	// 品種・箱数の取得
    	$flowers = number_of_production::select()->join('flower_kinds AS fk', 'fk.id', '=', 'number_of_productions.flower_kind_id')->where('number_of_productions.delete_flg', 0)->orderBy('fk.kind_sort_key', 'asc')->get(['number_of_productions.id', 'fk.kind_name', 'number_of_productions.grade', 'number_of_productions.flower_number', 'number_of_productions.box_number']);
        $fl = json_decode(json_encode($flowers), true);
        logger($fl);
        $arr = [];
        foreach ($fl as $value) {
            $res = [$value['kind_name'], $value['grade'], $value['flower_number'], $value['box_number']];
            array_push($arr, $res);
        }
        // 箱数の合計数
        $countBox = number_of_production::sum('box_number');

        //　箱の種類の取得
        $boxes = box::where('delete_flg', 0)->get(['id', 'box_name']);

    	$office_name = $request->session()->get('office_name', 'Nothing');
        $user_name = $request->session()->get('user_name', 'Nothing');
        return view('sharing', [
        	'market' => $market,
            'countBox' => $countBox,
        	'date' => $request->date,
            'flower_numbers' => $flowers,
        	'office_name' => $office_name,
        	'user_name' => $user_name,
            'boxes' => $boxes,
            'json' => $arr,
        ]);
    }
}
