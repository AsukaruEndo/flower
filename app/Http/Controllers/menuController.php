<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\flower_kind;

class menuController extends Controller
{
    // menu_page
    function menu_controller(Request $request){

    	return response()->json(
            [
                'data' => $collections
            ],
            200,[],
            JSON_UNESCAPED_UNICODE
        );


    }

}
