<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/test', function () {
//     return view('client.page.profile');
// });
Route::get('/quantrivien', function () {
    return view("admin.xinchaoadmin");
});

    Route::get('/admin/register', [\App\Http\Controllers\AdminController::class, 'viewRegister']);
    Route::post('/admin/register', [\App\Http\Controllers\AdminController::class, 'Register']);
    Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'viewLogin']);
    Route::post('/admin/login', [\App\Http\Controllers\AdminController::class, 'Login']);
    Route::get('/admin/agent', [\App\Http\Controllers\AgentController::class, 'createagent'])->name('agent.Create');
    Route::post('/admin/agent', [\App\Http\Controllers\AgentController::class, 'storenagent']);
    Route::get('/admin/indexagent', [\App\Http\Controllers\AgentController::class, 'indexagent'])->name('agent.Index');
    Route::get('/admin/agent/edit/{id}', [\App\Http\Controllers\AgentController::class, 'edit']);
    Route::post('/admin/agent/capnhap/{id}', [\App\Http\Controllers\AgentController::class, 'update']);
    Route::get('/admin/agent/xoanhanvien/{id}', [\App\Http\Controllers\AgentController::class, 'delete']);
    Route::get('/admin/combo', [\App\Http\Controllers\ComboController::class, 'createcombo'])->name('combo.Create');
    Route::post('/admin/combo', [\App\Http\Controllers\ComboController::class, 'storecombo']);
    Route::get('/admin/indexcombo', [\App\Http\Controllers\ComboController::class, 'indexcombo'])->name('combo.Index');
    Route::get('/admin/combo/xoacombo/{id}', [\App\Http\Controllers\ComboController::class, 'delete']);
    Route::get('/admin/combo/edit/{id}', [\App\Http\Controllers\ComboController::class, 'edit']);
    Route::post('/admin/combo/capnhap/{id}', [\App\Http\Controllers\ComboController::class, 'update']);
    Route::get('/admin/lichcat', [\App\Http\Controllers\LichcatController::class, 'danhsachlichcat']);
    Route::get('/admin/lichcat/nhanlich/{id}', [\App\Http\Controllers\LichcatController::class, 'nhanlich']);
    Route::post('/admin/lichcat/xacnhan/{id}', [\App\Http\Controllers\LichcatController::class, 'xacnhan']);
    Route::get('/admin/lichcatdaxuly', [\App\Http\Controllers\LichcatController::class, 'lichcatdaxuly']);
    Route::get('/admin/lichcat/huylich/{id}', [\App\Http\Controllers\LichcatController::class, 'huylich']);
    Route::post('/admin/lichcat/xacnhanhuy/{id}', [\App\Http\Controllers\LichcatController::class, 'xacnhanhuy']);
    Route::post('/admin/thanhtoan', [\App\Http\Controllers\LichcatController::class, 'thanhtoan']);
    Route::get('/admin/xacnhanhangthanh/{id}', [\App\Http\Controllers\LichcatController::class, 'xacnhanhangthanh']);


Route::group(['prefix' => '' , 'middleware' => 'checkAdmin'], function(){
    Route::get('/nguoidung', [\App\Http\Controllers\ClientController::class, 'Viewprofile']);
    Route::post('/client/datlich', [\App\Http\Controllers\LichcatController::class, 'lichcat']);
});
Route::get('/logout', [\App\Http\Controllers\ClientController::class, 'logout']);
Route::post('/client/register', [\App\Http\Controllers\ClientController::class, 'register']);
Route::post('/client/login', [\App\Http\Controllers\ClientController::class, 'Login']);
Route::get('/client', [\App\Http\Controllers\ClientController::class, 'indexclient']);
Route::get('/xacminh/{hkl}', [\App\Http\Controllers\ClientController::class, 'Active']);




