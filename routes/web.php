<?php
use Illuminate\Http\Request;
use App\office;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login
#Route::get('/', 'loginController@login');
Route::get('/', function()
{
	return view('login');
});


// login
Route::post('login', 'loginController@login');
// error 
Route::get('login', function(Request $request){
		// $offices = DB::select("SELECT office_name FROM offices WHERE office_name NOT IN ('管理者')");
		$offices = office::whereNotIn('office_name', ['管理者'])->get();
        $user_name = $request->session()->get('user_name', 'Nothing');
		return view('menu_system', ['offices' => $offices, 'users' => $user_name]);
	});

// 生産数入力
Route::post('number_of_production', 'productionController@number_of_production');

// 市場毎分配
Route::post('sharing', 'sharingController@sharing');



/*　品種マスタ関係　*/
// 品種マスタ
Route::get('master_kind', function (){ return view( 'master_kind' ); });

// 品種マスタ　新規登録画面
Route::get('register_kind_flower', function (){ return view( 'register_kind_flower' ); });

// 品種マスタ　新規登録
Route::post('register_kind_flower', 'masterController@register_kind_flower');



/*　担当者マスタ関係　*/
// 担当者マスタ
Route::get('master_person', function (){ return view( 'master_person' ); });

// 担当者マスタ　担当者登録画面
Route::get('register_person', function (){ return view( 'register_person' ); });

//　担当者マスタ　新規登録
Route::post('register_person', 'masterController@register_person');



/*　箱マスタ関係　*/
// 箱マスタ
Route::get('master_box','masterController@boxlist');

// 箱マスタ　箱登録画面
Route::get('register_box', function (){ return view( 'register_box' ); });

//　箱マスタ　新規登録
Route::post('register_box', 'masterController@register_box');


/* 市場マスタ */
//　市場マスタ
Route::get('master_market', 'masterController@master_market');

// 市場　登録画面
Route::get('register_market', function (){ return view( 'register_market' ); });

// 市場　新規登録
Route::post('register_market', 'masterController@register_market');

// 送料　登録
Route::post('insert_postage', 'masterController@insert_postage');

/* CSV */
// CSV
Route::get('master_csv', function (){ return view( 'master_csv' ); });

// CSV upload
Route::post('csv_upload', 'csvController@upload_csv');

// CSV dawnload
Route::post('csv_dawnload', 'csvController@dawnload_csv');



/*      API          */
// login select
Route::get('api/person_data', 'Api\personController@persondata');

/*　品種マスタ関係　*/
// 品種マスタ　
Route::get('master_kind_flowers',  'API\master@master_kind');

// 品種マスタ削除
Route::get('master_kind_flowers_delete', 'API\master@master_kind_delete');

//　品種マスタデータ アップデート
Route::post('update_master_kind_flower', 'API\master@master_kind_update');

/*　担当者マスタ関係　*/
// 担当者マスタ
Route::get('master_person_serch', 'API\master@master_person');

// 担当者マスタ　削除
Route::get('master_person_delete', 'API\master@master_person_delete');

// 担当者マスタ　アップデート
Route::post('update_master_person', 'API\master@master_person_update');

/* 箱マスタ関係 */
// 箱マスタ　削除
Route::get('master_box_delete', 'API\master@master_box_delete');

// 箱マスタ　アップデート
Route::post('update_master_box', 'API\master@master_box_update');

/**/
// 市場マスタ　削除
Route::get('master_master_delete', 'API\master@master_market_delete');

// 市場マスタ　更新
Route::post('update_master_market', 'API\master@master_market_update');
