<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;


class CategoryThemesController extends RelationController
{
    use DisableAuthorization;

    protected $model = Category::class;

    protected $relation = 'themes';

}
