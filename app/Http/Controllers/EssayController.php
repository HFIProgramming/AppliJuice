<?php

namespace App\Http\Controllers;

use App\College;
use App\Essay;
use App\EssayTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EssayController extends Controller
{
    //
    public function essayForm(Request $request)
    {
        $tag_types = EssayTag::all()->pluck('type')->unique()->values();
        $existingTags = $tag_types->map(function ($tag_type) {
           return [
               'name' => $tag_type,
               'tags' => EssayTag::where('type', $tag_type)->get()->pluck('tag')
           ];
        });
        return $existingTags;
        return view('essay.create', [
            'existingTags'
        ]);
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
