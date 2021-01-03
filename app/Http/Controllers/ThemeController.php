<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class ThemeController extends Controller
{
    use DisableAuthorization;
    protected $model = Theme::class;

    protected function afterIndex(\Orion\Http\Requests\Request $request, Paginator $entities)
    {
        foreach ($entities as $theme) {
            $theme->post_count = $theme->posts()->count();
        }
    }
}
