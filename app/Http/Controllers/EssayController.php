<?php

namespace App\Http\Controllers;

use App\College;
use App\Essay;
use App\EssayTag;
use App\Events\newCollege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EssayController extends Controller
{
    //
    public function essayForm(Request $request)
    {
        $tagTypes = EssayTag::all()->pluck('type')->unique()->values();
        $existingTags = $tagTypes->map(function ($tag_type)
        {
            return [
                'name' => $tag_type,
                'tags' => EssayTag::where('type', $tag_type)->get()->pluck('tag'),
                'nameText' => EssayTag::where('type', $tag_type)->first()->type_text
            ];
        });
        return view('application.createEssay', [
            'existingTags' => $existingTags,
            'tagTypes' => $tagTypes
        ]);
    }

    public function submitEssay(Request $request)
    {
//        return $request->user()->
        $essay = $request->user()->applicant->essays()->create([
            'prompt' => $request->prompt,
            'content' => $request->text
        ]);
        $essay->remarks()->create([
            'body' => $request->remark
        ]);
        foreach ($request->tagList as $tag_type => $tag_group)
        {
            foreach ($tag_group as $tag)
            {
                if ($tag_type == 'college' && empty(College::name($tag)->first()))
                {
                    event(new newCollege($tag));
                }
                else
                {
                    if (empty(EssayTag::where('type', $tag_type)->where('tag', $tag)->first()))
                    {
                        EssayTag::create([
                           'type' => $tag_type,
                           'type_text' => ucwords(str_replace('_',' ', $tag_type)),
                           'tag' => $tag
                        ]);
                    }
                }
                $essay->tags()->attach(EssayTag::where('type', $tag_type)->where('tag', $tag)->first()->id);
            }
        }
        return 'ok';
    }
}
