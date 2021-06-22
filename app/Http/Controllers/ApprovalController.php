<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
     public function memberindex()
    {
        $member=User::latest()->get();
         return view('backend.member.approvalwait',compact('member'));
    }

    public function memberinactive($status){

DB::table('users')->where('id',$status)->update(['approved'=>0]);

return Redirect()->back();

}
public function memberactive($status){

DB::table('users')->where('id',$status)->update(['approved'=>1]);

return Redirect()->back();

}
}
