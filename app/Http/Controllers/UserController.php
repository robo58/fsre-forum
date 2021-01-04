<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class UserController extends Controller
{
    use DisableAuthorization;
    protected $model = User::class;


    /**
     * The relations that are allowed to be included together with a resource.
     *
     * @return array
     */
    protected function includes() : array
    {
        return ['posts'];
    }

    protected function afterShow(\Orion\Http\Requests\Request $request, Model $entity)
    {
        $entity->post_count = $entity->posts()->count();
        $entity->comment_count = $entity->comments()->count();
        foreach ($entity->posts as $post){
            $post->load('theme');
        }
    }
}
