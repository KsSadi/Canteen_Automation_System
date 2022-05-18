<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        //
        //Check and guard the permission
        if (is_null($this->user) ) {
            abort(403, 'Unauthorized Access!');
        }


        return view('backend.pages.admins.profile');
    }
}
