<?php

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
    return view('front.index');
});
Route::get('/tes', function () {
     $data = \App\Model\Soal::where('topik_id',7)->get();
     $soal = [];
     foreach ($data as $key) {
             foreach ($key->option as $keys) {
                # code...
            }
     }
     return $data;
});
Route::get('/topik', function () {
    $data['topik'] = \App\Model\Topik::all();
    return view('front.topik',$data);
});

Route::group(['middleware' => 'auth'],function(){
    Route::get('/materi/{id}', function ($id) {
        $data['materi'] = \App\Model\Materi::where('topik_id',$id)->get();
        if (count($data['materi']) > 0) {
            # code...
            return view('front.materi',$data);
        }else{
            return abort(404);
        }
        
    });
    Route::get('/question/{id}','FrontController@question');
});

Route::get('/benar', function () {
    return view('front.benar');
});
Route::get('/salah', function () {
    return view('front.salah');
});
Route::get('/daftar', function () {
    return view('front.register');
});
Route::get('/masuk', function () {
    return view('front.login');
});
Route::get('/selesai', function () {
    return view('front.selesai');
});

Route::group(['middleware' => 'auth','role:Administrator'], function(){
    Route::get('/adashboard',function(){
        $data['users'] = \DB::table('users')->count();
        $data['topik'] = \DB::table('topik')->count();
        $data['soal'] = \DB::table('soal')->count();
        $data['opsi'] = \DB::table('option')->count();
        return view('admin.dashboard.index',$data);
    });
    Route::get('/atopik',function(){
        return view('admin.topik.index');
    });
    Route::get('/aopsi',function(){
        $data['soal'] = \App\Model\Soal::all();
        return view('admin.opsi.index',$data);
    });
    Route::get('/asoal',function(){
        $data['topik'] = \App\Model\Topik::all();
        return view('admin.soal.index',$data);
    });
    Route::get('/amateri',function(){
        $data['topik'] = DB::select(DB::raw('SELECT * FROM topik WHERE id NOT IN (SELECT topik_id FROM materi) '));
        return view('admin.materi.index',$data);
    });
    Route::get('/auser',function(){
        $data['role'] = \App\Model\Role::all();
        return view('admin.user.user',$data);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'backend'], function () {
    Route::name('admin.')->middleware(["auth",'role:Administrator'])->group(function() { 
        Route::group(['prefix'=>"user"],function(){
            Route::get('/',"userController@index")->name('user.index');
            Route::post('/simpan',"userController@store")->name('user.store');
            Route::post('/update',"userController@update")->name('user.update');
            Route::post('delete',"userController@delete")->name('user.delete');

        });

        Route::group(['prefix'=>"topik"],function(){
            Route::get('/',"topikController@index")->name('topik.index');
            Route::post('/simpan',"topikController@store")->name('topik.store');
            Route::post('/update',"topikController@update")->name('topik.update');
            Route::post('delete',"topikController@delete")->name('topik.delete');
        });

        Route::group(['prefix'=>"soal"],function(){
            Route::get('/',"soalController@index")->name('soal.index');
            Route::post('/simpan',"soalController@store")->name('soal.store');
            Route::post('/update',"soalController@update")->name('soal.update');
            Route::post('delete',"soalController@delete")->name('soal.delete');
        });
        Route::group(['prefix'=>"opsi"],function(){
            Route::get('/',"opsiController@index")->name('opsi.index');
            Route::post('/simpan',"opsiController@store")->name('opsi.store');
            Route::post('/update',"opsiController@update")->name('opsi.update');
            Route::post('delete',"opsiController@delete")->name('opsi.delete');
        });

        Route::group(['prefix'=>"materi"],function(){
            Route::get('/',"materiController@index")->name('materi.index');
            Route::post('/simpan',"materiController@store")->name('materi.store');
            Route::post('/update',"materiController@update")->name('materi.update');
            Route::post('delete',"materiController@delete")->name('materi.delete');

        });


    });
});
Route::group(["auth",'role:Administrator'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});