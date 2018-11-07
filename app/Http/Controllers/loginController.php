<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\charge_person;
use DB;

class loginController extends Controller
{
    //
    function login(Request $request)
    {
    	// ログイン実装
    	$validatedData = $request->validate([
	        'office_name' => 'required|string',
	        'office_person' => 'required|string',
	        'pass' => 'required'
    	]);

    	unset($validatedData["office_name"]);
    	$users = DB::select("SELECT charge_person_no, 
    								charge_person_name, 
    								office_no 
    						FROM charge_persons 
    						WHERE charge_person_no=:office_person AND password=:pass", $validatedData);
    	$office = DB::select("SELECT office_name FROM offices WHERE office_name NOT IN ('管理者')");
    	if( empty($users) ){
    		return back()->with('message', '入力内容に誤りがあります。');
    	}else{
            session(['user_name' => $users[0]->charge_person_name, 'office_name'=>$request->office_name]);
        	return view('menu_system', [
        		'users' => $users,
        		'offices' => $office,
        	]);
    	}
    }
}
