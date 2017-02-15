<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Admin;
use App\Http\Requests;
use App\admin_rebate_tracker_db;
use App\File;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;


class AdminController extends Controller
{
  public function _construct(){
    $this->middleware('admin');
  }

  public function index(){
      $rebate_forms =  admin_rebate_tracker_db::all();
      $files = File::all();
      return view('admin.index', ['rebate_forms' => $rebate_forms], ['files' => $files] );
  }

  public function changeApprovedStatus($id){
        $UpdateStatus = admin_rebate_tracker_db::where('id', '=', $id);
        $UpdateStatus->approved = 1;
        $UpdateDetails->save();
        return view('admin.index');
    }
}
