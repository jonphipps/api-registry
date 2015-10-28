<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/

$api->resource("agents", 'App\Http\Controllers\API\AgentAPIController');

$api->resource("concepts", 'App\Http\Controllers\API\ConceptAPIController');

$api->resource("conceptproperties", 'App\Http\Controllers\API\ConceptPropertyAPIController');

$api->resource("conceptpropertyhistory", 'App\Http\Controllers\API\ConceptPropertyHistoryAPIController');

$api->resource("elementsets", 'App\Http\Controllers\API\ElementSetAPIController');

$api->resource("elements", 'App\Http\Controllers\API\ElementAPIController');

$api->resource("elementproperties", 'App\Http\Controllers\API\ElementPropertyAPIController');

$api->resource("elementpropertyhistory", 'App\Http\Controllers\API\ElementPropertyHistoryAPIController');

$api->resource("fileimporthistory", 'App\Http\Controllers\API\FileImportHistoryAPIController');

$api->resource("prefixes", 'App\Http\Controllers\API\PrefixAPIController');

$api->resource("profiles", 'App\Http\Controllers\API\ProfileAPIController');

$api->resource("profileproperties", 'App\Http\Controllers\API\ProfilePropertyAPIController');

$api->resource("statuses", 'App\Http\Controllers\API\StatusAPIController');

$api->resource("users", 'App\Http\Controllers\API\UserAPIController');

$api->resource("vocabularies", 'App\Http\Controllers\API\VocabularyAPIController');
