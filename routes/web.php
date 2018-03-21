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




Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('blog/cat/{category_id}', ['uses' => 'BlogController@getCategory', 'as' => 'blog.category']);
Route::get('blog/tag/{tag_id}', ['uses' => 'BlogController@getTag', 'as' => 'blog.tag']);
Route::get('about', 'PagesController@getAbout');
Route::get('portfolio', 'PagesController@getPortfolio');
Route::get('galeriaFormacao', 'PagesController@getFormacaoGaleria');

Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');
//Route::post('contact', 'PagesController@getContact');

Route::get('admin', 'AdminPagesController@getIndex');
Route::get('/', 'PagesController@getIndex');
Route::get('eventos', 'AdminPagesController@index');
Route::get('contactsNewsletter', 'ContatcsNewsletterController@index');
Route::get('sobre', 'SobreController@getContact@index');
Route::get('slideshow', 'SlideshowController@getIndex');

Route::post('contactNewsletter', 'EmailNewsletter@create');







// Rooutes para os Posts
Route::resource('posts', 'PostController');

// Rooutes para a Formacao -Galeria
Route::resource('formacaoGaleria', 'FormacaoGaleriaController');

// Routes para as categorias excepto a create
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

// Routes para as Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Routes para os Manuais
Route::resource('manuais', 'ManuaisController');

//Routes para eventos
Route::resource('event', 'EventController');



// Routes para os ensinos excepto a create
Route::resource('ensinos', 'EnsinosController', ['except' => ['create']]);


// Routes para newsletter excepto a create
Route::resource('contactsNewsletter', 'ContactsNewsletterController');

Route::resource('contactsNewsletter', 'ContactsNewsletterController');

// Routes para email newsletter
Route::resource('emailNewsletter', 'EmailNewsletterController');


// Routes para os ensinos excepto a create
Route::resource('contactsNewsletter', 'ContactsNewsletterController', ['except' => ['create']]);

// Routes para o Sobre
Route::resource('sobre', 'SobreController');


// Routes para o Slideshow
Route::resource('slideshow', 'SlideshowController');



Auth::routes();

Route::get('/home', 'PagesController@getIndex')->name('pages.welcome');




