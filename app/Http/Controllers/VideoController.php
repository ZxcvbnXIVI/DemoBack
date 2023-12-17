<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Subject;

class VideoController extends Controller
{
    public function create()
    {
        $subjects = Subject::all();
        return view('create-video', compact('subjects'));
    }
    public function getall()
    {
        $videos = Video::all();
        return view('videoLinkCategory.create', compact('videos'));
    }
    public function showVideosBySubject($subjectID)
    {
        $videos = Video::where('SubjectID', $subjectID)->with('categories')->get();
        $subject = Subject::find($subjectID);

        return view('videos.show', compact('videos', 'subject'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'SubjectID' => 'required|exists:subjects,SubjectID',
                'VideoTitle' => 'required|string',
                'VideoURL' => 'required|string',
                'Thumbnail' => 'required|string',
                'VideoCode' => 'required|string',
                'ChannelName' => 'required|string',
            ]);

            $video = new Video;
            $video->SubjectID = $request->input('SubjectID');
            $video->VideoTitle = $request->input('VideoTitle');
            $video->VideoURL = $request->input('VideoURL');
            $video->Thumbnail = $request->input('Thumbnail');
            $video->VideoCode = $request->input('VideoCode');
            $video->ChannelName = $request->input('ChannelName');
            $video->save();

            return redirect()->route('videos.create')->with('success', 'Video created successfully.');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating video: ' . $e->getMessage(),
            ]);
        }
    }
}
