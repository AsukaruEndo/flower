<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class productionController extends Controller
{
    //
    function number_of_production(Request $request){
    	// ログイン実装
    	$validatedData = $request->validate([
	        'date' => 'required',
	        'office' => 'required|string'
    	]);

    	$row = DB::select("SELECT np.id, 
                                np.flower_kind_id,
                                np.grade,
                                np.flower_number,
                                np.box_number,
                                np.summary,
                                o.office_name,
                                (fk.id) AS flower_id,
                                fk.kind_code,
                                fk.kind_name,
                                fk.kind_sort_key
    					FROM number_of_productions AS np 
    					INNER JOIN offices AS o ON np.office_no=o.office_no 
    					RIGHT JOIN flower_kinds AS fk on np.flower_kind_id=fk.id AND np.delete_flg=0 
    					AND o.office_name='".$validatedData["office"]."' ORDER BY fk.kind_sort_key ASC" 
    				);
    	// flower に複数の値があったときの処理
    	$row = json_decode(json_encode($row), true);
    	$ress = [];
    	foreach ($row as $value) {
    		foreach ($value as $key => $val) {
	    		if ( strpos($val,',') ) {
	    			$reval = str_replace(',', '&#13;', $val);
	    			$value[$key] = $reval;
	    		}
	    	}# end foreach
	    	array_push($ress, $value);
            if ( $value["id"] == NULL ) {
                for ($i=0; $i < 4; $i++) {
                    $var = ['id' =>$value["id"], 
                            'flower_kind_id' => $value["flower_kind_id"], 
                            'grade' => $value["grade"], 
                            'flower_number' => $value["flower_number"], 
                            'box_number' => $value["box_number"], 
                            'summary' => $value["summary"], 
                            'office_name' => $value["office_name"], 
                            'flower_id' => $value["flower_id"],
                            'kind_code' => $value["kind_code"], 
                            'kind_name' => $value["kind_name"], 
                            'kind_sort_key' => $value["kind_sort_key"]];
                    array_push($ress, $var);
                   }   
            }
            unset($value);
    	}
        logger($ress);
        //　キー( flower_name )だけ取得 
        $keyName = [];
        foreach ($ress as $value) {
            if ( !in_array($value["kind_name"], $keyName) ) {
                array_push($keyName, $value["kind_name"]);
            }
            unset($value);
        }
        $flower_count = count($keyName);

        $office_name = $request->session()->get('office_name', 'Nothing');
        $user_name = $request->session()->get('user_name', 'Nothing');
    	// テーブルの左側の構造に応じて
    	return view('number_of_productions', [
    			'rows'=>$ress,
                'countData' => $flower_count,
                'office_name' => $office_name, 
                'user_name' => $user_name,
                'date' => $request->date,
    		]);
    }

}