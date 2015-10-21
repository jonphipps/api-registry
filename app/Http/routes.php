<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/langfix', function () {
    $en = unserialize(Storage::disk('local')->get('en_old.dat'));
    //Symfony\Component\VarDumper\VarDumper::dump($en['Languages']);
    //ini_set("auto_detect_line_endings", true);
    $languages = Storage::disk('local')->get('languages.csv');
    $LangArray = [];
    $Data = str_getcsv($languages, "\n"); //parse the rows
    foreach ($Data as $Row) {
        $foo = str_getcsv($Row, ",");
        $LangArray[$foo[0]] = [$foo[1]];
    } //parse the items in rows
    $en['Languages'] = array_merge($en['Languages'],$LangArray);
    asort($en['Languages']);
    Storage::disk('local')->put('en.dat', serialize($en));
    //dd($en);
    return view('welcome');
});

Route::get('/langs', function () {
    $en = unserialize(Storage::disk('local')->get('en.dat'));
    //Symfony\Component\VarDumper\VarDumper::dump($en['Languages']);
    //ini_set("auto_detect_line_endings", true);
    $languages = Storage::disk('local')->get('languages.csv');
    $LangArray = [];
    $Data = str_getcsv($languages, "\n"); //parse the rows
    foreach ($Data as $Row) {
        $foo = str_getcsv($Row, ",");
        $LangArray[$foo[0]] = [$foo[1]];
    } //parse the items in rows
    $en['Languages'] = array_merge($en['Languages'],$LangArray);
    asort($en['Languages']);
    Storage::disk('local')->put('en.dat', serialize($en));
    //dd($en);
    return view('welcome');
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    //$api->get('vocabs/{id}', 'App\Api\Controllers\VocabController@show');
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
        require Config::get('generator.path_api_routes');
	});
});

/*
|--------------------------------------------------------------------------
| dingo/api and mitulgolakiya/laravel-api-generator api routes
|--------------------------------------------------------------------------
*/

$api = app('api.router');

$api->group([
    'version'   => '$API_VERSION$',
    'prefix'    => '$API_PREFIX$',
    'namespace' => '$API_CONTROLLER_NAMESPACE$',
], function ($api)
{
    include_once __DIR__ . '/api_routes.php';

    $api->get('errors/{id}', function ($id)
    {
        return \Mitul\Generator\Errors::getErrors([$id]);
    });

    $api->get('errors', function ()
    {
        return \Mitul\Generator\Errors::getErrors([], [], true);
    });

    $api->get('/', function ()
    {
        $links = [];

        return ['links' => $links];
    });
});
