<?php

Route::get('/', function () {
    return redirect('/signin');
});

Route::get('home','HomeController@home')->name('home');
Route::get('/pageAksesKhusus', function(){
    return view('pageAksesKhusus');
});

Route::get('/MyProfile','users\ProfilController@show')->name('MyProfile');
Route::patch('/updateprof','users\ProfilController@update')->name('updateprof');

/** Auth */
Route::get('daftar', 'users\RegistrationController@create');
Route::post('add', [
    'uses'=> 'users\RegistrationController@registrationPost',
    'as' => 'add']);
 
Route::get('signin', 'LoginController@getLogin')->name('signin');
Route::post('postLogin', 'LoginController@postLogin')->name('postLogin');
Route::get('signout', function(){
    Auth::logout();
    return redirect('/');
})->name('signout');

route::get('dasboard','DasboardController@index')->name('dasboard');
route::get('dasboard2/{data}','DasboardController@index2')->name('dasboard2');

/****** ADMIN**/
/*User Approval*/
Route::get('userapproval', 'admin\ApprovalController@index')->name('userapproval');
Route::get('userapproval/{id}/update', [
    'uses'=>'admin\ApprovalController@update',
    'as' =>'ua.update']);
Route::get('userapproval/{id}/destroy', [
    'uses'=>'admin\ApprovalController@destroy',
    'as' =>'ua.destroy']);
Route::get('listuser','users\UserController@List')->name('listuser');
Route::get('ProfileUser/{id}','users\UserController@ProfileUser')->name('ProfileUser');
Route::post('update/{id}','users\UserController@update')->name('update');

Route::get('listProduk/{id}','admin\ProdukController@listProduk')->name('listProduk');
Route::get('editproduk/{id}','admin\ProdukController@editproduk')->name('editproduk');
Route::post('editdataproduk/{id}','admin\ProdukController@editdataproduk')->name('editdataproduk');
Route::get('showproduk/{id}','admin\ProdukController@showproduk')->name('showproduk');
Route::get('addproduk/{id}','admin\ProdukController@addproduk')->name('addproduk');
Route::get('detailproduk/{id}','admin\ProdukController@detailproduk')->name('detailproduk');
Route::post('newproduk','admin\ProdukController@newproduk')->name('newproduk');
Route::get('kategori/{id}','admin\ProdukController@kategori')->name('kategori');
Route::get('produk/{id}','admin\ProdukController@produk')->name('produk');

// Supplier
Route::get('order/{id}','supplier\OrderController@order')->name('order');
Route::get('detailOrder/{id}/{data}','supplier\OrderController@detailOrder')->name('detailOrder');
Route::get('kirimOrder/{id}','supplier\OrderController@kirimOrder')->name('kirimOrder');
Route::get('terimaOrder/{id}','supplier\OrderController@terimaOrder')->name('terimaOrder');
Route::get('profile/{id}','supplier\ProfileController@profile')->name('profile');
Route::post('addToko/{id}','supplier\ProfileController@addToko')->name('addToko');