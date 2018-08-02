<?php

namespace App\Http\Controllers;

use App\College;
use App\Events\newCollege;
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

    }

    public function createApplication(Request $request)
    {
        $applicant = Auth::user()->applicant()->create($request);
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
