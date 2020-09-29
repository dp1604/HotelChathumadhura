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

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('userLogin');
});

Route::get('/orders', function () {
    return view('order_managment');
});

Route::get('/register', function(){
    return view('add-employee');
});

Route::get('/profile', function(){
    return view('add-employee');
});

Route::get('/register', function(){
    return view('add-employee');
});

//Banquet hall reservations
Route::get('/banquet-hall-reservations', function(){
    return view('banquet_hall_reservations');
});


Route::get('/addOrders', 'orderController@goToAdd');
Route::get('/orderList', 'orderController@goToOrder');
Route::get('/viewOrderDetails/{id}', 'orderController@viewDetails');

Route::post('/addNewOrder','orderController@store');
Route::post('/updateOrderStatus','orderController@updateStatus');
Route::post('/deleteOrder','orderController@deleteOrder');
Route::post('/getOrder','orderController@findOrder');
Route::post('/updateOrder','orderController@updateOrder');
Route::post('/goToFoodBill','orderController@bill');

//Banquet Hall Reservations
Route::get('/addBanquetHallReservation', 'banquetHallsController@goToReserve');
Route::post('/saveBanquetHallReservation', 'banquetHallsController@store');
Route::get('/viewBanquetHallReservations', 'banquetHallsController@getReservationList');
Route::post('/deleteBanquetHallReservation', 'banquetHallsController@deleteReservation');
Route::post('/updateBanquetHallReservation', 'banquetHallsController@viewReservation');
Route::post('/saveUpdatedBanquetHallReservation', 'banquetHallsController@updateReservation');

Route::post('/addFoodItem','foodPriceController@store');

Route::get('/priceList', function(){
    return view('viewprice');
});

Route::get('/addPrice', function(){
    return view('addprice');
});

Route::get('/addFoodItem', function(){
    return view('foodsPriceForm');
});

Route::get('/priceInter', function(){
    return view('priceinterface');
});

Route::get('/viewFoodList', 'foodPriceController@viewAll');
Route::post('/deleteFood', 'foodPriceController@delete');
Route::post('/viewFood', 'foodPriceController@view');
Route::post('/updateFoodItem', 'foodPriceController@update');

Route::get('/staffIndex', function(){
    return view('staffindex');
});

Route::get('/addEmployee', function(){
    return view('add-employee');
});

Route::post('/storeEmployee', 'employeeContoller@store');
Route::post('/uLogin', 'employeeContoller@login');

Route::get('/uLogout','employeeContoller@logout');
Route::get('/getUser','employeeContoller@getUserDetails');
Route::post('/updateUser','employeeContoller@updateUser');
Route::post('/deleteUser','employeeContoller@deleteUser');

//=========================================================
//===Tharika routes====///
Route::get('/tablecreate', function () {
    return view('CreateTableReservations');
});

Route::get('/tablesearch', function() {
    return view('SearchID');
});

Route::get('/tableMyHome', function() {
    return view('TableReservationManagement');
});

Route::post('/tablesave', 'InsertController@tableInsert');

Route::get('/tabledisplay', function() {

    $data=App\Insert::all();

    return view('ReservationDisplay')->with('display', $data);
});

Route::get('/tableupdateRes/{id}','InsertController@tableUpdate');

Route::post('/tableDBupdate', 'InsertController@tableDBUpdate');

Route::get('/tabledelete/{id}','InsertController@tableDeleteData');
//=====================================================================

//===================gaya3 routes=======================================

Route::get('/poolticIssue', 'poolpagescontroller@indexticketissue');

Route::get('/swimpool', function () {
    return view('swimmingpool');
});

Route::get('/poolreg', function () {
    return view('poolmemberReg');
});

Route::get('/poolprof', function () {
    $data=App\Task::all();
    return view('poolmemberProf')->with('show',$data);
});

Route::post('/savemem','poolpagescontroller@Insert');

Route::get('/updatepool/{id}','poolpagescontroller@UpdateRec');

Route::post('/updatemember','poolpagescontroller@updatemember');

Route::get('/pooldelete/{id}','poolpagescontroller@pooldeleteDB');
//======================================================================
