<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class ThemePostsController extends RelationController
{
    use DisableAuthorization;

    protected $model = Theme::class;

    protected $relation = 'posts';

    /**
     * The relations that are loaded by default together with a resource.
     *
     * @return array
     */
    protected function alwaysIncludes() : array
    {
        return ['author'];
    }
}
