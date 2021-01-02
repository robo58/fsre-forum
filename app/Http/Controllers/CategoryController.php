<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class CategoryController extends Controller
{
    use DisableAuthorization;
    protected $model = Category::class;

}
