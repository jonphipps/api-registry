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

Route::get('/generate/models', '\\Jimbolino\\Laravel\\ModelBuilder\\ModelGenerator5@start');

//$api = app('Dingo\Api\Routing\Router');
//$api->version('v1', function ($api) {
//    $api->get('vocabs/{id}', 'App\Api\Controllers\VocabController@show');
//include_once __DIR__ . '/api_routes.php';
//
//});


///*
//|--------------------------------------------------------------------------
//| API routes
//|--------------------------------------------------------------------------
//*/
//
//Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
//{
//    Route::group(['prefix' => 'v1'], function ()
//    {
//        require Config::get('generator.path_api_routes');
//    });
//});

/*
|--------------------------------------------------------------------------
| dingo/api and mitulgolakiya/laravel-api-generator api routes
|--------------------------------------------------------------------------
*/

$api = app('api.router');

$api->version('v1', function ($api)
{
    include_once __DIR__ . '/api_routes.php';

    $api->get('errors/{id}', function ($id)
    {
        return \Casa\Generator\Errors::getErrors([$id]);
    });

    $api->get('errors', function ()
    {
        return \Casa\Generator\Errors::getErrors([], [], true);
    });

    $api->get('/', function ()
    {
        $links = [];

        return ['links' => $links];
    });
});


Route::resource('agents', 'AgentController');

Route::get('agents/{id}/delete', [
    'as' => 'agents.delete',
    'uses' => 'AgentController@destroy',
]);


Route::resource('concepts', 'ConceptController');

Route::get('concepts/{id}/delete', [
    'as' => 'concepts.delete',
    'uses' => 'ConceptController@destroy',
]);


Route::resource('conceptproperties', 'ConceptPropertyController');

Route::get('conceptproperties/{id}/delete', [
    'as' => 'conceptproperties.delete',
    'uses' => 'ConceptPropertyController@destroy',
]);


Route::resource('conceptpropertyhistory', 'ConceptPropertyHistoryController');

Route::get('conceptpropertyhistory/{id}/delete', [
    'as' => 'conceptpropertyhistory.delete',
    'uses' => 'ConceptPropertyHistoryController@destroy',
]);


Route::resource('elementsets', 'ElementSetController');

Route::get('elementsets/{id}/delete', [
    'as' => 'elementsets.delete',
    'uses' => 'ElementSetController@destroy',
]);


Route::resource('elements', 'ElementController');

Route::get('elements/{id}/delete', [
    'as' => 'elements.delete',
    'uses' => 'ElementController@destroy',
]);


Route::resource('elementproperties', 'ElementPropertyController');

Route::get('elementproperties/{id}/delete', [
    'as' => 'elementproperties.delete',
    'uses' => 'ElementPropertyController@destroy',
]);


Route::resource('elementpropertyhistory', 'ElementPropertyHistoryController');

Route::get('elementpropertyhistory/{id}/delete', [
    'as' => 'elementpropertyhistory.delete',
    'uses' => 'ElementPropertyHistoryController@destroy',
]);


Route::resource('fileimporthistory', 'FileImportHistoryController');

Route::get('fileimporthistory/{id}/delete', [
    'as' => 'fileimporthistory.delete',
    'uses' => 'FileImportHistoryController@destroy',
]);


Route::resource('profiles', 'ProfileController');

Route::get('profiles/{id}/delete', [
    'as' => 'profiles.delete',
    'uses' => 'ProfileController@destroy',
]);


Route::resource('profileproperties', 'ProfilePropertyController');

Route::get('profileproperties/{id}/delete', [
    'as' => 'profileproperties.delete',
    'uses' => 'ProfilePropertyController@destroy',
]);


Route::resource('prefixes', 'PrefixController');

Route::get('prefixes/{id}/delete', [
    'as' => 'prefixes.delete',
    'uses' => 'PrefixController@destroy',
]);


Route::resource('statuses', 'StatusController');

Route::get('statuses/{id}/delete', [
    'as' => 'statuses.delete',
    'uses' => 'StatusController@destroy',
]);


Route::resource('users', 'UserController');

Route::get('users/{id}/delete', [
    'as' => 'users.delete',
    'uses' => 'UserController@destroy',
]);


Route::resource('vocabularies', 'VocabularyController');

Route::get('vocabularies/{id}/delete', [
    'as' => 'vocabularies.delete',
    'uses' => 'VocabularyController@destroy',
]);


