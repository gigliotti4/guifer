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
Auth::routes(['register' => false, 'verify' => false, 'reset' => false]);

Route::group(['middleware' => 'auth', 'prefix' => 'adm'], function() {
    Route::get('/', 'Auth\AdmController@index')->name('adm');
    Route::get('logout', ['uses' => 'Auth\LoginController@logout' , 'as' => 'adm.logout']);
    Route::get('empresa/imagen', ['uses' => 'Auth\AdmController@imagen', 'as' => 'imagen']);
    Route::delete('imagen/delete', ['uses' => 'Auth\AdmController@imagenDestroy', 'as' => 'imagen.delete']);
    Route::post('imagen', ['uses' => 'Auth\AdmController@imagenStore', 'as' => 'imagen.create']);
    Route::post('edit', ['uses' => 'Auth\AdmController@edit', 'as' => 'adm.edit']);
    Route::match(['get', 'post'], 'url',['as' => '.url','uses' => 'Auth\EmpresaController@url' ]);
    
    Route::match(['get', 'post'], 'newsletter',['as' => 'newsletter.index','uses' => 'Auth\EmpresaController@newsletter' ]);
    Route::delete('newsletter/delete', ['uses' => 'Auth\EmpresaController@newsletterDestroy', 'as' => 'newsletter.delete']);
    /**
     * SLIDERS
     */
     Route::resource('slider', 'Auth\SliderController')->except(['index', 'update','show']);
     Route::get('slider/{seccion}', ['uses' => 'Auth\SliderController@index', 'as' => 'slider.index']);
     Route::post('slider/update/{id}', ['uses' => 'Auth\SliderController@update', 'as' => 'slider.update']);
    
    /**
     * CONTENIDO
     */
    Route::group(['prefix' => 'contenido', 'as' => 'contenido'], function() {
        Route::get('{seccion}/edit', ['uses' => 'Auth\ContenidoController@edit', 'as' => '.edit']);
        Route::post('{seccion}/update', ['uses' => 'Auth\ContenidoController@update', 'as' => 'update']);
    });
    /**
     * PRODUCTOS
     */
    Route::resource('productos', 'Auth\ProductoController')->except(['update']);
    Route::post('productos/update/{id}', ['uses' => 'Auth\ProductoController@update', 'as' => 'productos.update']);
    Route::post('productos/all', ['uses' => 'Auth\ProductoController@all', 'as' => 'productos.all']);

    Route::resource('categorias', 'Auth\CategoriaController')->except(['update','index']);
    Route::post('categorias/update/{id}', ['uses' => 'Auth\CategoriaController@update', 'as' => 'categorias.update']);
    Route::get('producto/categorias', ['uses' => 'Auth\CategoriaController@index', 'as' => 'categorias.index']);
    /**
     * CLIENTES
     */
    Route::resource('clientes', 'Auth\ClienteController')->except(['update']);
    Route::post('clientes/update/{id}', ['uses' => 'Auth\ClienteController@update', 'as' => 'clientes.update']);
    /**
     * MARCAS
     */
    Route::resource('marcas', 'Auth\MarcaController')->except(['update']);
    Route::post('marcas/update/{id}', ['uses' => 'Auth\MarcaController@update', 'as' => 'marcas.update']);
    /**
     * GALERIA
     */
    Route::resource('galeria', 'Auth\GaleriaController')->except(['update']);
    Route::post('galeria/update/{id}', ['uses' => 'Auth\GaleriaController@update', 'as' => 'galeria.update']);
    /**
     * BLOG
     */
    Route::resource('blogs', 'Auth\BlogController')->except(['update']);
    Route::post('blogs/update/{id}', ['uses' => 'Auth\BlogController@update', 'as' => 'blogs.update']);

    Route::resource('blogcategorias', 'Auth\BlogCategoriaController')->except(['update','index']);
    Route::get('blog/categorias', ['uses' => 'Auth\BlogCategoriaController@index', 'as' => '.blogcategorias.index']);
    Route::post('blogcategorias/update/{id}', ['uses' => 'Auth\BlogCategoriaController@update', 'as' => 'blogcategorias.update']);

    /**********************************
            DATOS DE LA EMPRESA
     ********************************** */
    Route::resource('usuarios', 'Auth\UserController')->except(['update']);
    Route::post('usuarios/update/{id}', ['uses' => 'Auth\UserController@update', 'as' => 'usuarios.update']);
    Route::get('usuario/datos', ['uses' => 'Auth\UserController@datos', 'as' => 'usuarios.datos']);

    Route::get('empresa/metadatos', ['uses' => 'Auth\MetadatosController@index', 'as' => 'metadatos.index']);
    Route::post('metadatos/update/{page}', ['uses' => 'Auth\MetadatosController@update', 'as' => 'metadatos.update']);

    //Route::resource('redes', 'Auth\EmpresaController')->except(['index','update']);
    Route::get('empresa/redes', ['uses' => 'Auth\EmpresaController@redes', 'as' => 'empresa.redes']);
    Route::post('redes', ['uses' => 'Auth\EmpresaController@redesStore', 'as' => 'redes.create']);
    Route::get('redes/{id}/edit', ['uses' => 'Auth\EmpresaController@redesEdit', 'as' => 'empresa.edit']);
    Route::post('redes/update/{id}', ['uses' => 'Auth\EmpresaController@redesUpdate', 'as' => 'redes.update']);
    Route::delete('redes/delete', ['uses' => 'Auth\EmpresaController@redesDestroy', 'as' => 'redes.delete']);

    Route::group(['prefix' => 'empresa', 'as' => 'empresa'], function() {
        Route::get('datos', ['uses' => 'Auth\EmpresaController@datos', 'as' => '.datos']);
        Route::match(['get', 'post'], 'terminos',['as' => '.terminos','uses' => 'Auth\EmpresaController@terminos' ]);
        Route::match(['get', 'post'], 'form',['as' => '.form','uses' => 'Auth\EmpresaController@form' ]);
        Route::post('update', ['uses' => 'Auth\EmpresaController@update', 'as' => '.update']);
    });
});


Route::post('newsletter', ['uses' => 'Page\FormController@newsletter' , 'as' => 'newsletter']);

Route::get( '{link?}' ,
    [ 'uses' => 'Page\GeneralController@index' , 'as' => 'index' ]
)->where( 'link' , "index|solicitud-de-presupuesto|empresa|productos|servicio-tecnico|galeria|novedades|clientes|contacto" );

Route::get('search', ['uses' => 'Page\GeneralController@search' , 'as' => 'search']);

Route::post('solicitud-de-presupuesto', ['uses' => 'Page\FormController@presupuesto' , 'as' => 'presupuesto']);
Route::post('contacto', ['uses' => 'Page\FormController@contacto' , 'as' => 'contacto']);
Route::post('servicio-tecnico', ['uses' => 'Page\FormController@contacto' , 'as' => 'servicios']);

Route::get('productos/categoria/{title}/{id}', ['uses' => 'Page\GeneralController@categoria' , 'as' => 'categoria']);
Route::get('productos/producto/{title}/{id}', ['uses' => 'Page\GeneralController@producto' , 'as' => 'producto']);

Route::get('novedad/{title}/{id}', ['uses' => 'Page\GeneralController@blog' , 'as' => 'blog']);
Route::get('novedades/{slug_category}/{id}', ['uses' => 'Page\GeneralController@blog_category' , 'as' => 'blog_category']);