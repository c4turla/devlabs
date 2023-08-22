<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{ 

    Route::group(['middleware' => ['guest']], function() {
        Route::get('/', 'HomeController@index')->name('home.index');
        Route::get('/about', 'HomeController@about')->name('home.about');
        Route::get('/contact', 'HomeController@contact')->name('home.contact');
        Route::get('/course', 'HomeController@category')->name('home.course');
        Route::get('/blog', 'HomeController@blog')->name('home.blog');
        Route::get('artikel/{artikel}/detail', 'HomeController@showartikel')->name('home.blogshow');
        Route::get('privacy', 'HomeController@privacy')->name('home.privacy');
        Route::get('register', 'AuthController@register')->name('auth.register');
        Route::post('registeraction', 'AuthController@registeraction')->name('registeraction');
        Route::get('login', 'AuthController@login')->name('auth.login');
        Route::post('loginaction', 'AuthController@loginaction')->name('loginaction');
    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::get('admin/category', 'CategoryController@index')->name('admin.category');
        Route::get('admin/tambahkategori', 'CategoryController@add')->name('admin.tambahkategori');
        Route::post('admin/storecategory', 'CategoryController@store')->name('admin.savekategori');
        Route::delete('admin/delcategory/{id}', 'CategoryController@destroy')->name('admin.hapuskategori');
        //Kelas
        Route::get('admin/kelas', 'KelasController@index')->name('admin.kelas');
        Route::get('admin/tambahkelas', 'KelasController@create')->name('admin.tambahkelas');
        Route::post('admin/storekelas', 'KelasController@store')->name('admin.savekelas');
        Route::get('admin/{kelas}/editkelas', 'KelasController@edit')->name('admin.editkelas');
        Route::patch('admin/{kelas}/updatekelas', 'KelasController@update')->name('admin.updatekelas');
        Route::delete('admin/{kelas}/destroy', 'KelasController@destroy')->name('admin.deletekelas');
       // Route::resource('admin/kelass', KelasController::class);
      //  Route::get('kelas/list', [KelasController::class, 'getKelas'])->name('kelas.list');
        Route::get('admin/pengguna', 'UserController@index')->name('admin.pengguna');
        //Materi
        Route::get('admin/materi', 'MateriController@index')->name('admin.materi');
        Route::get('admin/tambahmateri', 'MateriController@create')->name('admin.tambahmateri');
        Route::post('admin/savemateri', 'MateriController@store')->name('admin.savemateri');
        Route::get('admin/{materi}/lihatmateri', 'MateriController@show')->name('admin.lihatmateri');
        Route::get('admin/{materi}/editmateri', 'MateriController@edit')->name('admin.editmateri');
        Route::patch('admin/{materi}/updatemateri', 'MateriController@update')->name('admin.updatemateri');
        Route::delete('admin/{materi}/hapusmateri', 'MateriController@destroy')->name('admin.hapusmateri');
        //Artikel
        Route::get('admin/artikel', 'ArtikelController@index')->name('admin.artikel');
        Route::get('admin/tambahartikel', 'ArtikelController@addartikel')->name('admin.tambahartikel');
        Route::post('admin/storeartikel', 'ArtikelController@storeartikel')->name('admin.simpanartikel');
        Route::get('admin/{artikel}/lihatartikel', 'ArtikelController@show')->name('admin.lihatartikel');
        Route::get('admin/{artikel}/editartikel', 'ArtikelController@edit')->name('admin.editartikel');
        Route::patch('admin/{artikel}/updateartikel', 'ArtikelController@update')->name('admin.updateartikel');
        Route::post('admin/storekategori', 'ArtikelController@storekategori')->name('admin.simpankategori');
        Route::delete('admin/{post}/delartikel', 'ArtikelController@destroy')->name('admin.hapusartikel');
        //Siswa
        Route::get('siswa/dashboard', 'DashboardController@siswa')->name('siswa.dashboard');
        Route::get('siswa/profile', 'DashboardController@siswaprofile')->name('siswa.profile');
        Route::get('siswa/course', 'DashboardController@course')->name('siswa.course');
        Route::get('profile', 'DashboardController@profile')->name('profile');
    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});