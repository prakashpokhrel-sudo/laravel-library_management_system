<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{
  public function AdminProfile()
  {
      $admin = Admin::find(1);
      return view('admin.profile.admin_profile', compact('admin'));
  }
}
