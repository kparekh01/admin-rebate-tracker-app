<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\admin_rebate_tracker_db;
use Auth;

class AdminAuthController extends Controller
{
  use AuthenticatesAndRegistersUsers, ThrottlesLogins;
  protected $redirectTo = '/admin/index';
  protected $guard = 'admin';

  public function showLoginForm(){
    if(Auth::guard('admin')->check()){
      return redirect('');
    }
    return view("admin.login");
  }
  public function __construct()
  {
      $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }
}
