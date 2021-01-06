<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();


    if (!$user || !Hash::check($request->password, $user->password)) {
        return response([
            'message' => ['These credentials do not match our records.']
        ], 404);
    }

    $token = $user->createToken('my-app-token')->plainTextToken;
    $user->load('roles');
    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);
});

Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'name'=>'required',
        'email' => 'required|email',
        'password' => 'required'
    ]);


    if ($request->password != $request->confirmPassword) {
        return response([
            'message' => ['Passwords do not match.']
        ], 404);
    }

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    $user->roles()->attach(1);
    $user->load('roles');


    if (!$user || !Hash::check($request->password, $user->password)) {
        return response([
            'message' => ['These credentials do not match our records.']
        ], 404);
    }

    $token = $user->createToken('my-app-token')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);
});


$resources = [
    'categories' => 'CategoryController',
    'themes' => 'ThemeController',
    'posts' => 'PostController',
    'comments' => 'CommentController',
    'users' => 'UserController',
    'roles'=>'RoleController'
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
