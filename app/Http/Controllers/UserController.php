<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function HFIVerifyForm()
    {

    }

    public function HFIVerify(Request $request)
    {
        $student_id = $request->student_id;
        $powerschool_name = $request->powerschool_name;
        if(!empty(HFIStudent::where('student_id',$student_id)->where('powerschool_name', $powerschool_name)->get()))
        {
            $user = $request->user();
            $user->hfi_student = "true";
            $user->save();
            return "Success";
        }
    }
}
