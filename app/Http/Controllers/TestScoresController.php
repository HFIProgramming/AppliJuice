<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestScoresController extends Controller
{
    //
    public function testScoresForm()
    {

    }

    public function submitScores(Request $request)
    {
        $scores = $request->input('scores');
        foreach($scores as $score)
        {
            $test_id = $score['test_id'];
            $test = Test::find($test_id);
            $section_scores = $score['section_scores'];
            //TODO: date and remark
            foreach($section_scores as $section_name => $section_score)
            {
                if(in_array($section_name, $test->required_sections) && empty($section_score))
                {
                    return "Redo";
                }
            }
            $test->scores()->create([
                'test_name' => $test->name,
                'applicant_id' => Auth::user()->applicant->id,
                'section_scores' => $section_scores
            ]);
        }
        return 'Success';
    }
}
