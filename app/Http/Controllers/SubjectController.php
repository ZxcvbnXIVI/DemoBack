<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SubjectResource;

class SubjectController extends Controller
{
    public function index()
    {
        // ดึง UserID ที่ล็อกอิน
        $userId = Auth::id();

        // ดึงรายการวิชาที่เกี่ยวข้องกับ UserID
        $subjects = Subject::where('UserID', $userId)->get();

        return view('subjects.index', compact('subjects'));
    }
    public function create()
{
    $subjects = Subject::all();
    return view('create-subject', compact('subjects'));
}

    public function store(Request $request)
{
    try {
        $request->validate([
            'SubjectName' => 'required|string',
            'Description' => 'required|string',
            'PlaylistLink' => 'required|string',
        ]);

        $subject = new Subject;
$subject->SubjectName = $request->input('SubjectName');
$subject->Description = $request->input('Description');
$subject->PlaylistLink = $request->input('PlaylistLink');
$subject->UserID = auth()->user()->UserID; // Get current userId
$subject->save();

        return response()->json([
            'success' => true,
            'message' => 'Subject created successfully.',
            'data' => new SubjectResource($subject),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error creating subject: ' . $e->getMessage(),
        ]);
    }
}
}
