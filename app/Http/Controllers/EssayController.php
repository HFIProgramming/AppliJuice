<?php

namespace App\Http\Controllers;

use App\College;
use App\Essay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EssayController extends Controller
{
    //
    public function essayForm(Request $request)
    {
        return view('essay.create');
    }

    public function submitEssay(Request $request)
    {
        $essay = Essay::create($request);
        $essay->comments()->create([
            'body' => $request->remark
        ]);
        foreach ($request->tags as $tag_type => $tag_group)
        {
            foreach ($tag_group as $tag)
            {
                if ($tag_type == 'college' && empty(College::name($tag)->first()))
                {
                    event(new newCollege($tag));
                }
                $essay->tags()->create([
                    'tag' => $tag,
                    'type' => $tag_type
                ]);
            }
        }
    }
}
