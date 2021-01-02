<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class ThemeController extends Controller
{
    use DisableAuthorization;
    protected $model = Theme::class;

}
