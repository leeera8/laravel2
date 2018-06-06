<?php
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/reg', function(Request $req){
	header("Access-Control-Allow-Origin:*");
	$user_id=DB::table('users')->insertGetId(['name' => $req->login, 'password' => $req->password, 'mail' => $req->mmail]);
	
	return $user_id;
});
Route::get('/ajax',function(){
	header("Access-Control-Allow-Origin:*");
});
Route::get('/avt', function(Request $req){
	header("Access-Control-Allow-Origin:*");
	$users = DB::table('users')->where([
    ['name', '=', $req->login],
    ['password', '=', $req->password],
])->get();
	return $users;
});
Route::get('/regisvol', function(Request $req){
	header("Access-Control-Allow-Origin:*");
	$vol=DB::table('volunteers')->insert(['user_id' => $req->userid, 'fio' => $req->fio, 'passport' => $req->passport, 'number' => $req->number]);
});