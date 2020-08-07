<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function reg(){
        return view('admin.user.reg');
    }
    public function regs(){
        
    }
}
