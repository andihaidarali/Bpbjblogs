<?php
Route::get('/', 'FrontController@index')->name('halamandepan');

// Route Untuk Halaman Statik
Route::prefix('/profil')->group(function(){
    Route::get('/visimisi', function(){ return view('statik.visimisi'); });
    Route::get('/tugasfungsi', function(){ return view('statik.tugas'); });
    Route::get('/struktur', function(){ return view('statik.struktur'); });
});
Route::prefix('/SDM')->group(function(){
    Route::get('/struktur-pegawai', function(){ return view('statik.struk_pegawai'); });
    Route::get('/pengembangan-kompetensi', function(){ return view('statik.peng_kompetensi'); });
});
Route::prefix('/sop')->group(function(){
    Route::get('/Standar-operasional', 'FrontController@Sop')->name('home.sop');
    Route::get('/Standar-dokumen', 'FrontController@Sopdoc')->name('home.sopdoc');
    Route::get('/standarisasi-lpse', 'FrontController@Soplpse')->name('home.soplpse');
});
Route::get('/regulasi', function () { return view('statik.regulasi'); });

Route::get('direktori/{slug}', 'FrontController@Sopdir')->name('home.dir');
Route::get('berita', 'FrontController@beritaindex')->name('berita.index');
Route::get('berita/{slug}', 'FrontController@show')->name('berita.show');
Route::get('cari', 'FrontController@cari')->name('berita.cari');
Route::get('foto', 'FrontController@foto')->name('foto.index');
Route::get('foto/{foto}', 'FrontController@fotoshow')->name('foto.show');
Route::get('video', 'FrontController@video')->name('video.index');
Route::get('video/{video}', 'FrontController@videoshow')->name('video.show');
Route::get('tutor', 'FrontController@tutor')->name('tutor.index');
Route::get('tutor/{tutor}', 'FrontController@tutorshow')->name('tutor.show');
Route::get('produk', 'FrontController@produk')->name('produk.index');
Route::get('produk/{produk}', 'FrontController@produkshow')->name('produk.show');

// authentikasi
Auth::routes();

// Route backend
Route::prefix('/backend')->group(function (){
    Route::get('/', 'HomeController@index')->name('backend');
    Route::resource('Produk', 'ProdukController');
    Route::resource('Video-galeri', 'VideogaleriController');
    Route::resource('Sop', 'SopController');
    Route::get('doc', 'SopController@doc')->name('Sop.standoc');
    Route::get('lpse', 'SopController@lpse')->name('Sop.stanlpse');
    Route::get('doc/{doc}/edit', 'SopController@doc_edit')->name('Sop.doc_edit');
    Route::get('lpse/{lpse}/edit', 'SopController@lpse_edit')->name('Sop.lpse_edit');
    Route::post('Sop/uploadfiles', 'SopController@uploadfiles')->name('Sop.upfiles');
    Route::post('Sop/deletefiles', 'SopController@deletefiles')->name('Sop.del_files');
    Route::post('Video-galeri/uploadvideo', 'VideogaleriController@uploadvideo')->name('Video-galeri.uploadvideo');
    Route::post('Video-galeri/deletevideos', 'VideogaleriController@deletevideos')->name('Video-galeri.deletevideos');
    Route::get('Tutorial', 'VideogaleriController@tutor')->name('Video-galeri.tutor');
    Route::get('Tutorial/{Video_galeri}/edit', 'VideogaleriController@tutoredit')->name('Video-galeri.tutoredit');
    Route::resource("Blog", "BlogController");
    Route::get("Kilasinfo", "BlogController@kilas")->name('kilas.create');
    Route::get("Kilasinfo/{Blog}/edit", "BlogController@kilasedit")->name("kilas.edit");
    Route::resource('Agenda', 'AgendaController');
    Route::patch('Agenda/setstatus/{Agenda}', 'AgendaController@setstatus')->name('Agenda.setstatus');
    Route::get('Galeri', 'GaleriController@backend')->name('Galeri.indexb');
    Route::post('Galeri/create', 'GaleriController@create')->name('Galeri.create');
    Route::get('Galeri/show/{Galeri}', 'GaleriController@show')->name('Galeri.show');
    Route::post('Galeri/show/uploadimage', 'GaleriController@uploadimg')->name('Galeri.uploadimg');
    Route::delete('Galeri/deletgaleri/{Galeri}', 'GaleriController@destroy')->name('Galeri.delgaleri');
    Route::post('Galeri/show/delimage', 'GaleriController@delimg')->name('Galeri.delimg');
    Route::patch('Galeri/edit/{Galeri}', 'GaleriController@update')->name('Galeri.update');
    Route::get('users/{user}',  'UserController@edit')->name('user.edit');
    Route::patch('users/{user}/update',  'UserController@update')->name('user.update');
    Route::patch('users/{user}/updatepass', 'UserController@cgpass')->name('user.password');
});