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


///////////////////////
// Training section. //
///////////////////////

	Route::get('/', function () {
	    return view('welcome');
	});

	Route::get('/reqHeaders', function () {
		return getallheaders();
	});
///////////////////////
// Initial Sections  //
///////////////////////

	// This route will work with gets.
	// The first parameter shows us to where we need to point.
	Route::get('/part1', function () {
	    return "Hello";
	});
	// param indicates the parameter, it'll be in the url.
	// We can use it in the function.
	// We can access it with the name, but remember it is assigned in order.
	// At the end the where is used to use a regex expression for the param.
	Route::get('/part2/{param}', function ($param) {
	    return "This is the part " . $param;
	})->where('param', '[0-9]+');

	// This is an example of how you pass multiple params.
	// Note that the parameters are assigned in order, not by name.
	// In here postNum has ? indicating that it is an optional variable. And the
	// fallback, in case no value is provided will be used.
	// We also can use the where method with multiple variables.
	Route::get('/part3/{name}/post/{postNum?}', function ($name, $postNum = '0') {
	    return "Hi " . $name . " this is your post #" . $postNum;
	})->where(['name' => '[A-Za-z]+', 'postNum' => '[0-9]']);

	// Here you can name the route so that you don't have to use everything.
	// The given route will have the name that we provide in the array.
	// You can check the above running the following command in terminal.
	// 		php artisan route:list

	Route::group(['prefix' => 'admin/post'], function(){
		Route::get('example', array('as' => 'admin.index', function(){
			// With route we access the given route.
			$url = route('admin.index');

			return "This url is " . $url;
		}));

		// Another way to name a route is the following. Way easier aint it?
		Route::get('example2', function(){
			// With route we access the given route.
			$url = route('admins.home');

			return "This url is " . $url;
		})->name('admins.home');
	});

	// How to use controllers with routes.
	Route::get('post', 'PostController@index');

	// How to use controllers with routes and passing parameters.
	Route::get('postx/{id}', 'PostController@indexWithParams');

	// Creates special routes that we can use in the controllers.
	// The example shows us sending a request for all methods in the controller.
	Route::resource('posts', 'PostController');
	// Lo de arriba henera la siguiente estructura de rutas.
	// Donde se matcheara la url que se da en la segunda colmna y dependiendo de como se defina,
	// en el controller se usara el metodo adecuado.
	// Como podemos ver despues de POST todos llevan el una variable. Dependiendo si esta la variable
	// y el metodo enviado se usara el metodo adecuado.
	// |GET|HEAD | posts        | posts.index     | App\Http\Controllers\PostController@index  | web |
	// |POST     | posts        | posts.store     | App\Http\Controllers\PostController@store  | web |
	// |GET|HEAD | posts/create | posts.create    | App\Http\Controllers\PostController@create | web |
	// |GET|HEAD | posts/{post} | posts.show      | App\Http\Controllers\PostController@show   | web |
	// |PUT|PATCH| posts/{post} | posts.update    | App\Http\Controllers\PostController@update | web |
	// |DELETE   | posts/{post} | posts.destroy   | App\Http\Controllers\PostController@destroy| web |
	// |GET|HEAD | posts/{post}/edit | posts.edit | App\Http\Controllers\PostController@edit   | web |

	Route::get('/contact', 'PostController@showCustomView1');

	Route::get('/postData/ToView/{id}', 'PostController@dataToView');

	Route::get('/postData/ToView2/{id}/{old}/{new}', 'PostController@dataToView2');


///////////////////////////////////
//Database and managing sections //
///////////////////////////////////

	////////////////////
	//Raw SQL QUERIES //
	////////////////////
	Route::group(['prefix' => 'raw/sql'], function(){

		Route::group(['prefix' => '/insert'], function(){
			Route::get('/area/{name}/{desc}/{admin?}','DatabaseController@insertAreaRaw');

			Route::get('/users/{name}/{lastName}/{email}/{pwd}','DatabaseController@insertUserRaw');

			Route::get('/proyect/{name}/{client}','DatabaseController@insertProyRaw');

			Route::get('/backlog/{idProy}/{idArea}/{actividad}/{descripcion}', 'DatabaseController@insertBacklogRaw');

			Route::get('/relacion/{proy}/{empleado}', 'DatabaseController@insertRelationRaw');
		});

		Route::group(['prefix' => '/read'], function() {
			Route::group(['prefix' => '/area'],function(){
				Route::get('/name/{name}/id/{id}','DatabaseController@getAreaRaw')->where(['name' => '[A-Za-z]+', 'id' => '[0-9]+']);
				Route::get('/id/{id}','DatabaseController@getAreaRawId')->where('id', '[0-9]+');
				Route::get('/name/{name}','DatabaseController@getAreaRawName')->where('name', '[A-Za-z]+');
			});
			
			Route::group(['prefix' => '/users'], function(){
				Route::get('/id/{id}/name/{name}/lastname/{lastname}/email/{email}','DatabaseController@getUserRaw')->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+', 'lastname' => '[A-Za-z]+', 'email' => '[A-Za-z]+']);
				Route::get('/id/{id}/','DatabaseController@getUserRawId')->where('id', '[0-9]+');
				Route::get('{name/{name}/','DatabaseController@getUserRawName')->where('name', '[A-Za-z]+');
				Route::get('/lastname/{lastname}','DatabaseController@getUserRawLastname')->where('lastname', '[A-Za-z]+');
				Route::get('/email/{email}','DatabaseController@getUserRawEmail')->where('email', '[A-Za-z]+');
			});
			
			Route::group(['prefix' => 'proyect'], function (){
				Route::get('/id/{id}/name/{name}/client/{client}/success/{exito}','DatabaseController@getProyRaw')->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+', 'client' => '[A-Za-z]+', 'exito' => '[01]']);
				Route::get('/id/{id}','DatabaseController@getProyRawId')->where('id', '[0-9]+');
				Route::get('/name/{name}','DatabaseController@getProyRawName')->where('name', '[A-Za-z]+');
				Route::get('/client/{client}','DatabaseController@getProyRawClient')->where('client', '[A-Za-z]+');
				Route::get('/success/{exito}','DatabaseController@getProyRawSuccess')->where('exito', '[01]');
			});

			Route::group(['prefix' => 'backlog'], function (){
				Route::get('/id/{id}/name/{name}/idProyect/{idProy}/idArea/{idArea}/completed/{comp}/accepted/{accept}', 'DatabaseController@getBacklogRaw')->where(['name' => '[A-Za-z]+', 'idProy' => '[0-9]+', 'idArea' => '[0-9]+']);
				Route::get('/id/{id}', 'DatabaseController@getBacklogRawId')->where('id', '[0-9]+');
				Route::get('/name/{name}', 'DatabaseController@getBacklogRawName')->where('name', '[A-Za-z]+');;
				Route::get('idProyect/{idProy}', 'DatabaseController@getBacklogRawIdProy')->where('idProy', '[0-9]+');
				Route::get('/idArea/{idArea}', 'DatabaseController@getBacklogRawIdArea')->where('idArea', '[0-9]+');
				Route::get('/completed/{comp}', 'DatabaseController@getBacklogRawCompleted')->where('comp', '[01]');
				Route::get('/accepted/{accept}', 'DatabaseController@getBacklogRawAccepted')->where('accept', '[01]');
			});
			
			Route::group(['prefix' => 'relacion'], function () {
				Route::get('/proyect/{proy}/user/{user}', 'DatabaseController@getRelationRaw')->where(['name' => '[A-Za-z]+', 'id' => '[0-9]+']);
				Route::get('/proyect/{proy}', 'DatabaseController@getRelationRawProyect')->where('proy', '[0-9]+');
				Route::get('/user/{user}', 'DatabaseController@getRelationRawUser')->where('user', '[0-9]+');
			});
		});

		Route::group(['prefix' => '/update'], function () {
			Route::get('/area/name/{name}/id/{id}', 'DatabaseController@updateAreaRawName');
			Route::group(['prefix' => '/user'], function () {
				Route::get('/name/{name}/id/{id}', 'DatabaseController@updateUserRawName');
				Route::get('/lastname/{lastname}/id/{id}', 'DatabaseController@updateUserRawLastname');
				Route::get('/email/{email}/id/{id}', 'DatabaseController@updateUserRawEmail');
			});
			Route::group(['prefix' => '/proyect'], function () {
				Route::get('/name/{name}/id/{id}','DatabaseController@updateProyRawName');
				Route::get('/client/{client}/id/{id}', 'DatabaseController@updateProyRawClient');
				Route::get('/succes/{succes}/id/{id}', 'DatabaseController@updateProyRawSuccess');
			});
			Route::group(['prefix' => '/backlog'], function () {
				Route::get('/name/{name}/id/{id}','DatabaseController@updateBacklogRawName');
				Route::get('/area/{idArea}/id/{id}','DatabaseController@updateBacklogRawIdArea');
				Route::get('/completed/{comp}/id/{id}','DatabaseController@updateBacklogRawCompleted');
				Route::get('accepted/{accept}/id/{id}','DatabaseController@updateBacklogRawAccepted');
			});
			Route::group(['prefix' => 'relacion'], function () {
				Route::get('/proy/{proyid}/id/{id}','DatabaseController@updateRelationRawProyect');
				Route::get('/employee/{employee_id}/id/{id}','DatabaseController@updateRelationRawUser');
			});
		});
	});


	/////////////////////////
	//Eloquent SQL QUERIES //
	/////////////////////////
	Route::group(['prefix' => 'eloquent/orm'], function () {
		Route::get('/read', function (App\Backlog $backlog){
			$backlog = Backlog::all();
				foreach ($backlog as $element) {
					return $element['descripcion'];
				}
		});
		Route::get('/find', function (App\Backlog $backlog){
			$backlog1 = $backlog->find(1);
			return $backlog1['id'];
		});
		Route::get('/where', function (App\Backlog $backlog){
			$backlog1 = $backlog -> where('id', 1)->get();
			return $backlog1;
		});
		Route::get('/ins', function (App\Backlog $backlog){
			$backlog1 = new $backlog;
			$backlog1['actividad'] = "Esta es la actividad";
			$backlog1['descripcion'] = "Esta es la descripcion";
			$backlog1['area_id'] = 1;
			$backlog1['proyecto_id'] = 1;
			$backlog1->save();
		});
		Route::get('/update', function (App\Backlog $backlog){
			$backlog1 = $backlog->where('actividad', "Esta es la actividad")->first();
			$backlog1['actividad'] = "Esta es la actividad actualizada";
			$backlog1->save();
		});
		Route::get('/create', function (App\Backlog $backlog){
			$backlog->create(['actividad' => 'actividad de create', 'descripcion' => 'Aqui ponemos la descripcion', 'area_id' => 1, 'proyecto_id' => 2]);
		});
		Route::get('/del', function (App\Backlog $backlog) {
			$toDelete = $backlog -> find(4);
			$toDelete->delete();
		});
	});





	Route::group(['prefix'=>'/fill'], function (){
		Route::get('/all-tables', function (App\Area $area, App\Backlog $backlog, App\Proyecto $proyecto, App\AreaProyecto $areaProy, App\Usuario $usuario) {
			$area['nombre_area'] = 'Area0001';
			$area['lider_id'] = 1;
			$area['descripcion'] = 'DescripcionArea0001';
			$area -> save();
			$usuario['nombre'] = 'Usuario0001';
			$usuario['apellido'] = 'ApellidoUsuario0001';
			$usuario['correo'] = 'CorreoUsuario0001';
			$usuario['contrasenia'] = 'ContraseniaUsuario0001';
			$usuario['area_id'] = 1;
			$usuario['validado'] = 1;
			$usuario -> save();
			$proyecto['nombre_proyecto'] = 'NombreProyecto0001';
			$proyecto['nombre_cliente'] = 'NombreCliente0001';
			$proyecto['descripcion'] = 'DescripcionDeProyecto0001';
			$proyecto -> save();
			// Debes cambiar uno de los dos de esta tabla junto con los ids
			$areaProy['proyecto_id'] = 1;
			$areaProy['area_id'] = 1;
			$areaProy -> save();
			$backlog['actividad'] = "ElementoDeBacklog0001";
			$backlog['descripcion'] = "DescripcionDeElemento0001";
			$backlog['area_id'] = 1;
			$backlog['proyecto_id'] = 1;
			$backlog->save();
		});
		Route::get('/backlog', function(App\Backlog $backlog) {
			$backlog['actividad'] = "ElementoDeBacklog0001";
			$backlog['descripcion'] = "DescripcionDeElemento0001";
			$backlog['area_id'] = 1;
			$backlog['proyecto_id'] = 1;
			$backlog->save();
		});

		Route::get('/area', function(App\Area $area) {
			$area['nombre_area'] = 'Area0001';
			$area['lider_id'] = 1;
			$area['descripcion'] = 'DescripcionArea0001';
			$area->save();
		});

		Route::get('/proy', function(App\Proyecto  $proy) {
			$proy['nombre_proyecto'] = 'NombreProyecto0001';
			$proy['nombre_cliente'] = 'NombreCliente0001';
			$proy['descripcion'] = 'DescripcionDeProyecto0001';
			$proy->save();
		});

		Route::get('/usuario', function(App\Usuario $usuario) {
			$usuario['nombre'] = 'Usuario0001';
			$usuario['apellido'] = 'ApellidoUsuario0001';
			$usuario['correo'] = 'CorreoUsuario0001';
			$usuario['contrasenia'] = 'ContraseniaUsuario0001';
			$usuario['area_id'] = 1;
			$usuario['validado'] = 1;
			$usuario -> save();
		});
		// Debes cambiar uno de los dos de esta tabla junto con los ids
		Route::get('/areaProy', function(App\ProyectoEmpleado $areaProy) {
			$areaProy['proyecto_id'] = 1;
			$areaProy['area_id'] = 1;
			$areaProy -> save();
		});
	});

	Route::group(['prefix'=>'/elo/get/from'], function () {
		Route::group(['prefix' => '/area/{id}'], function () {
			Route::get('/lider', function ($id, App\Area $helper) {
				return $helper->find($id)->getLeader['nombre'];
			});
			Route::get('/backlog', function ($id, App\Area $helper) {
				$temporal = $helper->find($id)->getBacklog;
				foreach ($temporal as $elemen) {
					echo $elemen['actividad'] . "<br>";
				}
			});
		});
	});

//////////////////////////
// End training section //
//////////////////////////
