<?php

Route::get('/', function () {
    return redirect('/signin');
});

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
    return redirect('/home');
})->name('signout');

route::get('dasboard','DasboardController@index')->name('dasboard');
/**** PESAN Antar User */
Route::post('send','PesanController@send')->name('send.email');

/****** ADMIN**/

/*User Approval*/
Route::get('userapproval', 'admin\ApprovalController@index')->name('userapproval');
Route::get('userapproval/{id}/update', [
    'uses'=>'admin\ApprovalController@update',
    'as' =>'ua.update']);
Route::get('userapproval/{id}/destroy', [
    'uses'=>'admin\ApprovalController@destroy',
    'as' =>'ua.destroy']);

Route::get('listProduk','admin\ProdukController@listProduk')->name('listProduk');

Route::get('tambahruang','admin\ApprovalController@ruangan')->name('tambahruang');
Route::get('laporan','admin\ApprovalController@lapor')->name('laporan');
Route::post('adruang','admin\ApprovalController@addruang')->name('addruang');
Route::get('deleteruang/{id_ruang}','admin\ApprovalController@deleteruang')->name('deleteruang');
Route::get('inventaris','admin\UserListController@inventaris')->name('inventaris');
Route::get('deletebarang/{id_inven}','admin\ApprovalController@deletebarang')->name('deletebarang');
Route::post('insert','admin\UserListController@insertdata')->name('insert');
Route::post('list/{id_peminjaman}','admin\ApprovalController@approve')->name('list');
Route::post('tolak/{id_peminjaman}','admin\ApprovalController@tolak')->name('tolak');
Route::get('approve','admin\ApprovalController@list')->name('approve');
Route::post('editruang/{id_ruang}','admin\ApprovalController@editruang')->name('editruang');
Route::post('editbarang/{id_inven}','admin\ApprovalController@editbarang')->name('editbarang');
Route::get('pinjamadmin','admin\ApprovalController@pinjamadmin')->name('pinjamadmin');
Route::get('ruang', 'admin\ApprovalController@ruang')->name('ruang');
Route::get('kembali', 'admin\ApprovalController@kembali')->name('kembali');
Route::post('pinjamya/{id_inven}','admin\ApprovalController@pinjamya')->name('pinjamya');
Route::post('kembaliin/{id_inven}','admin\ApprovalController@kembaliin')->name('kembaliin');
Route::post('delinven/{id_inventaris}','datamaster\DepartementController@delinven')->name('delinven');
    
/*User Management*/
Route::get('usermanagement','admin\UserListController@index')->name('usermanagement');
Route::get('showuser/{id}','admin\UserListController@show')->name('showuser');
Route::get('userblok/{id}','admin\UserListController@blok')->name('userblok');
Route::get('openblok/{id}','admin\UserListController@open')->name('openblok');
Route::patch('userupdate/{id}','admin\UserListController@update')->name('userupdate');
Route::get('DataDepartement','datamaster\DepartementController@dept')->name('dept');
Route::get('seluruh','datamaster\DepartementController@seluruh')->name('seluruh');
Route::get('print','admin\ApprovalController@prin')->name('print');
// operator
Route::get('operator','operator\operetorController@operator')->name('operator');
Route::get('dataoperator','operator\operetorController@data')->name('dataoperator');
Route::post('pinjamop/{id_inven}','operator\operetorController@pinjamya')->name('pinjamop');
Route::post('kembaliinop/{id_inven}','operator\operetorController@kembaliin')->name('kembaliinop');
Route::get('operatorkembali','operator\operetorController@kembali')->name('operatorkembali');
Route::get('pinjamoperator','operator\operetorController@pinjam')->name('pinjamoperator');
Route::get('lapor','operator\operetorController@lapor')->name('lapor');
Route::post('listop/{id_peminjaman}/{id_inventaris}','operator\operetorController@approve')->name('listop');
Route::post('tolakop/{id_peminjaman}','operator\operetorController@tolak')->name('tolakop');
Route::get('approveop','operator\operetorController@list')->name('approveop');
Route::get('pdf','operator\operetorController@pdf')->name('pdf');

Route::get('cetak','operator\operetorController@cetak')->name('cetak');

Route::get('dow/{id_inven}','operator\operetorController@download')->name('dow');
// peminjam
Route::get('peminjam','peminjam\peminjamController@peminjam')->name('peminjam');
Route::get('pinjampeminjam','peminjam\peminjamController@pinjam')->name('pinjampeminjam');
Route::get('getbarang/{id}','ajax\getGet@getbarang');
Route::post('pinjampin/{id_inven}','peminjam\peminjamController@pinjamya')->name('pinjampin');
Route::get('pdfnya','peminjam\peminjamController@pdf')->name('pdfnya');
Route::get('laporr','peminjam\peminjamController@lapor')->name('laporr');


Route::get('down/{id_inven}','peminjam\peminjamController@download')->name('down');
