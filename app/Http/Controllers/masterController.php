<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\charge_person;
use App\flower_kind;
use App\box;
use App\market;
use App\postage;


class masterController extends Controller
{
    // 担当者　新規登録
    public function register_person(Request $request)
    {
    	$validatedData = $request ->validate([
    		'office_name_kind' => 'required|integer',
    		'charge_person_no' => 'required|integer',
    		'charge_person_name' => 'required|string',
    		'password' => 'required|string'
    	]);

    	$charge_person = new charge_person;
    	$charge_person->charge_person_no = $request->charge_person_no;
    	$charge_person->charge_person_name = $request->charge_person_name;
    	$charge_person->office_no = $request->office_name_kind;
    	$charge_person->password = $request->password;
    	$charge_person->save();
    	return redirect('master_person');
    }

    // 品種マスタ　新規登録
    public function register_kind_flower(Request $request)
    {
    	$validatedData = $request ->validate([
    		'office_no' => 'required|integer',
    		'kind_code' => 'required|integer',
    		'kind_name' => 'required|string',
    		'kind_sort_key' => 'required|string'
    	]);

    	$flower_kind = new flower_kind;
    	$flower_kind->office_no = $request->office_no;
    	$flower_kind->kind_code = $request->kind_code;
    	$flower_kind->kind_name = $request->kind_name;
    	$flower_kind->kind_sort_key = $request->kind_sort_key;
    	$flower_kind->save();
    	return redirect('master_kind');
    }

    // 箱マスタ　一覧表示
    public function boxlist()
    {
        $box = box::where('delete_flg', 0)->get();
        return view('master_box', ['box' => $box]);
    }

    // 箱マスタ　新規登録
    public function register_box(Request $request)
    {
       $validatedData = $request->validate([
            'box_no' => 'required|integer',
            'box_name' => 'required|string',
            'size' => 'nullable|integer',
            'box_cost' => 'required|integer',
            'summary' => 'nullable|string',
            'classification' => 'required|string',
        ]);

       $box = new box;
       $box->box_no = $request->box_no;
       $box->box_name = $request->box_name;
       $box->size = $request->size;
       $box->box_cost = $request->box_cost;
       $box->summary = $request->summary;
       $box->classification = $request->classification;
       $box->save();
       return redirect('master_box');
    }


    // 市場マスタ　一覧表示
    public function master_market()
    {
        $market = market::where('delete_flg', 0)->get();
        $box = box::where('delete_flg', 0)->get(['id', 'box_name']);
        // $postage = DB::table('postages AS p')->join('boxes AS b', 'p.box_id', '=', 'b.id')->get(['p.postage', 'b.box_name']);
        return view('master_market', ['market' => $market, 'box' => $box]);
    }

    // 市場マスタ　新規登録
    public function register_market(Request $request)
    {
        $validatedData = $request->validate([
            'market_no' => 'required|integer',
            'market_name' => 'required|string',
            'amount' => 'nullable|numeric',
            'communication_cost' => 'nullable|numeric',
            'post_no' => 'nullable|numeric|size:7',
            'adress' => 'nullable|string',
            'tel' => 'nullable|string|between:9,13',
            'fax' => 'nullable|string|between:9,13',
        ]);

        $market = new market;
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

    // 送料　登録
    public function insert_postage(Request $request)
    {
        $validatedData = $request->validate([
            'market_id' => 'required|integer',
            'all_val' => 'required|string',
        ]);
        $val = explode('&', $validatedData["all_val"]);
        // 登録処理
        foreach ($val as $value) {
            $postage = new postage;
            $arr = array_map('intval', explode("=", $value));
            $postage->market_id=$request->market_id;
            $postage->box_id = $arr[0];
            $postage->postage = $arr[1];
            $postage->save();
        }
        return redirect('master_market');
    }

}
