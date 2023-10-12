<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;


class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('approved', true)->get();
        return view('notice_board', ['stories' => $stories]);
    }

    public function getApprovedStories()
    {
        return Story::where('approved', true)->get();
    }


    public function create()
    {
        return view('create_story');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $story = new Story;
        $story->title = $validatedData['title'];
        $story->description = $validatedData['description'];
        $story->admin_approval_token = md5(Hash::make(date('y-m-d h:i:s') . $story->title . $story->description));
        $story->save();

        Artisan::call('email:send-new-story-notification', ['story' => $story]);

        return redirect()->route('notice-board.index')->with('success', 'Story submitted and pending approval.');
    }

    public static function link_click($id)
    {
        Story::where('id', $id)->update(['approved' => true]);

        return response()->json(['message' => 'Story approved successfully']);
    }
}
