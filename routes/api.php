<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$resources = [
    'categories' => 'CategoryController',
    'themes' => 'ThemeController',
    'posts' => 'PostController',
    'comments' => 'CommentController',
    'users' => 'UserController',
];

Route::group(['as' => 'api.'], function () use ($resources) {
    foreach ($resources as $resource => $controller) {
        Orion::resource($resource, $controller);
    }

    Orion::belongsToResource('comments', 'author', CommentAuthorController::class);
    Orion::belongsToResource('comments', 'post', CommentPostController::class);
    Orion::belongsToResource('posts', 'author', PostAuthorController::class);
    Orion::belongsToResource('posts', 'theme', PostThemeController::class);
    Orion::belongsToResource('themes', 'category', ThemeCategoryController::class);

    Orion::hasManyResource('categories', 'themes', CategoryThemesController::class);
    Orion::hasManyResource('posts', 'comments', PostCommentsController::class);
    Orion::hasManyResource('themes', 'posts', ThemePostsController::class);
    Orion::hasManyResource('users', 'posts', UserPostsController::class);
    Orion::hasManyResource('users', 'comments', UserCommentsController::class);

    Orion::belongsToManyResource('users', 'roles', UserRolesController::class);

});
