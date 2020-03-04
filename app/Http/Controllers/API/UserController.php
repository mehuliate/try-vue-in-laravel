<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Outlet;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with(['outlet'])->orderBy('created-at', 'DESC')->courier();
        if(request()->q != ''){
            $users = $users->where('name', 'LIKE', '%'. request()->q . '%');
        }

        $users = $users->paginate(10);
        return new UserCollection($users);
    }
}
