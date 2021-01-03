<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;


class CategoryThemesController extends RelationController
{
    use DisableAuthorization;

    protected $model = Category::class;

    protected $relation = 'themes';

    protected function afterIndex(\Orion\Http\Requests\Request $request, Paginator $entities)
    {
        foreach ($entities as $theme) {
            $theme->post_count = $theme->posts()->count();
        }
    }

}
