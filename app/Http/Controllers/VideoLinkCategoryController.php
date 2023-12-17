<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoLinkCategory; // Import model ของคุณ

class VideoLinkCategoryController extends Controller
{
    public function create()
    {
        // ดึงข้อมูลที่จำเป็นในกรณีที่ต้องการให้ผู้ใช้เลือก
        $videos = \App\Models\Video::all(); // แทน Video ด้วย Model ของคุณ
        $categories = \App\Models\Category::all(); // แทน Category ด้วย Model ของคุณ

        return view('videoLinkCategory.create', compact('videos', 'categories'));
    }

    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลที่รับมาจากฟอร์ม
        $request->validate([
            'VideoID' => 'required|exists:videos,VideoID',
            'CategoryID' => 'required|exists:categories,CategoryID',
        ]);

        // บันทึกข้อมูลในฐานข้อมูล
        VideoLinkCategory::create([
            'VideoID' => $request->VideoID,
            'CategoryID' => $request->CategoryID,
        ]);

        return redirect()->route('videoLinkCategory.create')->with('success', 'บันทึกข้อมูลสำเร็จ');
    }
}
