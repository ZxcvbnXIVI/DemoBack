<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    // ... โค้ดอื่น ๆ ใน Controller

    public function store(Request $request)
    {
        // ตรวจสอบข้อมูลที่ส่งมา
        $request->validate([
            'UserName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            // เพิ่มกฎการตรวจสอบอื่น ๆ ตามต้องการ
        ]);

        // สร้าง User ใหม่
        $user = new User();
        $user->UserName = $request->input('UserName');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        // เพิ่มข้อมูลอื่น ๆ ตามต้องการ

        // บันทึก User ลงในฐานข้อมูล
        $user->save();

        // ส่งกลับไปยังหน้าที่เหมาะสม
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }
    public function getUser($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }
}
