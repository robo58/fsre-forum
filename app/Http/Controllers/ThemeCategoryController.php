<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class ThemeCategoryController extends RelationController
{
    use DisableAuthorization;

    protected $model = Theme::class;

    protected $relation = 'category';


}
