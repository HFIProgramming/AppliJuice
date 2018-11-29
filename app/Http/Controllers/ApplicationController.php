<?php

namespace App\Http\Controllers;

use App\College;
use App\Events\newCollege;
use App\HFIStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    //
    public function __construct()
    {
    }

    public function newApplicationForm()
    {
//        if(!empty(Auth::user()->applicant()))
//        {
//            return "existed";
//        }
        return view('applicantInfo.create');
    }

    public function createApplication(Request $request)
    {
//        $applicant = $request->user()->applicant()->create($request);
        $applicant = $request->user()->applicant()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'visibility' => $request->visibility == "true" ? "public" : "hfi" //@TODO ?
        ]);
        $offers = $request->offers;
        foreach($offers as $offer)
        {
            if(empty($college = College::name($offer)->first()))
            {
                event(new newCollege($offer));
            }
            $applicant->offers()->create(['college_id' => $college->id]);
        }

        return 'Success';
    }

    public function reviewApplication()
    {

    }

    public function editApplication(Request $request)
    {

    }
}
