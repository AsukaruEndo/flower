<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\box;
use App\market;

class master extends Controller
{
    //品種マスタ
    function master_kind(Request $request)
    {
    	$validatedData = $request->validate([
        	'office_name' => 'required|integer',
    	]);
        $sql = "SELECT id, kind_code, kind_name, kind_sort_key
                FROM flower_kinds AS f 
                WHERE f.office_no=:office_name AND delete_flg=0 ORDER BY f.kind_code ASC";
        $row = DB::select($sql, $validatedData);

        // データーがないときの処理
        if ( empty($row) ) {
        	$row = [[
        		'id' => 'nothing',
        		'kind_code' => 'データーがありません', 
        		'kind_name' => 'データーがありません', 
        		'kind_sort_key' => 'データーがありません',
        	]];
        }

        $ret = array();
        $ret['result'] = true;
        $ret['data'] = $row;
        $ret['error'] = array();
        return response()->json($ret);
    }


    // 品種マスタ　削除
    function master_kind_delete(Request $request)
    {
    	$validatedData = $request->validate([
        	'delete_id' => 'required|integer',
    	]);
    	// 削除はフラグの更新
    	$sql = "UPDATE  flower_kinds 
                SET  delete_flg = 1 
                WHERE id=:delete_id";
        $row = DB::select($sql, $validatedData);
    }


    // 品種マスタ　アップデート
    function master_kind_update(Request $request)
    {
    	$validatedData = $request ->validate([
    		'id' => 'required|integer',
    		'kind_code' => 'nullable|integer',
    		'kind_name' => 'nullable|string',
    	]);

    	if ( !empty($validatedData['kind_code']) && !empty($validatedData['kind_name']) ) {
    		$response = $validatedData;
    		$sql = "UPDATE  flower_kinds 
                SET  kind_code = :kind_code, kind_name = :kind_name  
                WHERE id=:id";
    	} else if ( !empty($validatedData['kind_code']) && empty($validatedData['kind_name']) ) {
    		$response = array_filter( $validatedData, "strlen" ) ;
    		$sql = "UPDATE  flower_kinds 
                SET  kind_code = :kind_code  
                WHERE id=:id";
    	} else if ( empty($validatedData['kind_code']) && !empty($validatedData['kind_name']) ) {
    		$response = array_filter( $validatedData, "strlen" ) ;
    		$sql = "UPDATE  flower_kinds 
                SET  kind_name = :kind_name  
                WHERE id=:id";
    	} // end if
        $row = DB::select($sql, $response);
    }

    //担当者マスタ
    function master_person(Request $request)
    {
    	$validatedData = $request->validate([
        	'office_no' => 'required|integer',
    	]);
        $sql = "SELECT id, charge_person_no, charge_person_name, password
                FROM charge_persons AS cp 
                WHERE cp.office_no=:office_no AND delete_flg=0 ORDER BY cp.id ASC";
        $row = DB::select($sql, $validatedData);
        // データーがないときの処理
        if ( empty($row) ) {
        	$row = [[
        		'id' => 'nothing',
        		'charge_person_no' => 'データーがありません', 
        		'charge_person_name' => 'データーがありません', 
        		'password' => 'データーがありません',
        	]];
        }

        $ret = array();
        $ret['result'] = true;
        $ret['data'] = $row;
        $ret['error'] = array();
        return response()->json($ret);
    }

       // 担当者マスタ　削除
    function master_person_delete(Request $request)
    {
    	$validatedData = $request->validate([
        	'delete_id' => 'required|integer',
    	]);
    	// 削除はフラグの更新
    	$sql = "UPDATE  charge_persons 
                SET  delete_flg = 1 
                WHERE id=:delete_id";
        $row = DB::select($sql, $validatedData);
    }

        // 担当者マスタ　アップデート
    function master_person_update(Request $request)
    {
    	$validatedData = $request ->validate([
    		'id' => 'required|integer',
    		'charge_person_no' => 'nullable|integer',
    		'charge_person_name' => 'nullable|string',
    		'password' => 'nullable|string'
    	]);
    	if ( empty($validatedData['password']) ){
	    	if ( !empty($validatedData['charge_person_no']) && !empty($validatedData['charge_person_name']) ) {
	    		$response = array_filter( $validatedData, "strlen" ) ;
	    		$sql = "UPDATE  charge_persons 
	                SET  charge_person_no = :charge_person_no, charge_person_name = :charge_person_name  
	                WHERE id=:id";
	    	} else if ( !empty($validatedData['charge_person_no']) && empty($validatedData['charge_person_name']) ) {
	    		$response = array_filter( $validatedData, "strlen" ) ;
	    		$sql = "UPDATE  charge_persons 
	                SET  charge_person_no = :charge_person_no  
	                WHERE id=:id";
	    	} elseif ( empty($validatedData['charge_person_no']) && !empty($validatedData['charge_person_name']) ) {
	    		$response = array_filter( $validatedData, "strlen" ) ;
	    		$sql = "UPDATE  charge_persons 
	                SET  charge_person_name = :charge_person_name  
	                WHERE id=:id";
	    	}
    	} else {
    		if ( !empty($validatedData['charge_person_no']) && !empty($validatedData['charge_person_name']) ) {
	    		$response = $validatedData;
	    		$sql = "UPDATE  charge_persons 
	                SET  charge_person_no = :charge_person_no, charge_person_name = :charge_person_name, password=:password  
	                WHERE id=:id";
	    	} else if ( !empty($validatedData['charge_person_no']) && empty($validatedData['charge_person_name']) ) {
	    		$response = array_filter( $validatedData, "strlen" ) ;
	    		$sql = "UPDATE  charge_persons 
	                SET  charge_person_no = :charge_person_no, password=:password  
	                WHERE id=:id";
	    	} elseif ( empty($validatedData['charge_person_no']) && !empty($validatedData['charge_person_name']) ) {
	    		$response = array_filter( $validatedData, "strlen" ) ;
	    		$sql = "UPDATE  charge_persons 
	                SET  charge_person_name = :charge_person_name, password=:password 
	                WHERE id=:id";
	    	} else {
	    		$response = array_filter( $validatedData, "strlen" ) ;
	    		$sql = "UPDATE  charge_persons 
	                SET password=:password 
	                WHERE id=:id";
	    	}
    	}// end if
        $row = DB::select($sql, $response);
    }

    // 箱マスタ　削除
    public function master_box_delete(Request $request)
    {
    	$validatedData = $request->validate([
        	'delete_id' => 'required|integer',
    	]);
    	// 削除はフラグの更新
    	$sql = "UPDATE  boxes 
                SET  delete_flg = 1 
                WHERE id=:delete_id";
        $row = DB::select($sql, $validatedData);
    }

    // 箱マスタ　アップデート
    public function master_box_update(Request $request)
    {
    	$validatedData = $request->validate([
        	'id' => 'required|integer',
        	'box_no' => 'nullable|integer',
        	'box_name' => 'nullable|string',
        	'size' => 'nullable|integer',
        	'box_cost' => 'nullable|integer',
        	'summary' => 'nullable|string',
        	'classification' => 'nullable|string',
    	]);

    	$box = box::firstOrNew(['id' => $request->id]);
    	$box->box_no = $request->box_no;
    	$box->box_name = $request->box_name;
    	$box->size = $request->size;
    	$box->box_cost = $request->box_cost;
    	$box->summary = $request->summary;
    	$box->classification = $request->classification;
    	$box->save();
    	return redirect('master_box');
    }

    // 市場マスタ　削除
    public function master_market_delete(Request $request)
    {
    	$validatedData = $request->validate([
        	'delete_id' => 'required|integer',
    	]);
    	// 削除はフラグの更新
    	$sql = "UPDATE  markets 
                SET  delete_flg = 1 
                WHERE id=:delete_id";
        $row = DB::select($sql, $validatedData);
    }   

    // 市場マスタ　更新
    public function master_market_update(Request $request)
    {
    	$validatedData = $request->validate([
    		'id' => 'required|integer',
            'market_no' => 'required|integer',
            'market_name' => 'required|string',
            'amount' => 'nullable|numeric',
            'communication_cost' => 'nullable|numeric',
            'post_no' => 'nullable|numeric',
            'adress' => 'nullable|string',
            'tel' => 'nullable|string|between:5,13',
            'fax' => 'nullable|string|between:5,13',
        ]);

        $market = market::firstOrNew(['id' => $request->id]);
    	$market->market_no = $request->market_no;
    	$market->market_name = $request->market_name;
    	$market->amount = $request->amount;
    	$market->communication_cost = $request->communication_cost;
    	$market->post_no = $request->post_no;
    	$market->adress = $request->adress;
    	$market->tel = $request->tel;
    	$market->fax = $request->fax;
    	$market->save();
    	return redirect('master_market');
    }
}
