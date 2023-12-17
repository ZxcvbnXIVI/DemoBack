<!-- resources/views/pages/create-video.blade.php -->
@extends('layouts.main')

@section('content')
<div class="custom-card">
        <h1 class="card-title">Create Subject</h1>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <form method="post" action="{{ route('videos.store') }}" class="card-form">
    @csrf

    <div class="form-group">
        <label for="SubjectID">Select a subject:</label>
        <select id="SubjectID" name="SubjectID" required>
            <option value="" disabled selected>Select a subject</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->SubjectID }}">{{ $subject->SubjectName }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="VideoURL">Video URL:</label>
        <input type="text" id="VideoURL" name="VideoURL" required>
    </div>
    <div class="form-group">
    <label for="VideoTitle">Video Title:</label>
        <input type="text" id="VideoTitle" name="VideoTitle" required>
    </div>

    <div class="form-group">
        <label for="Thumbnail">Thumbnail:</label>
        <input type="text" id="Thumbnail" name="Thumbnail" required>
    </div>

    <div class="form-group">
        <label for="VideoCode">Video Code:</label>
        <input type="text" id="VideoCode" name="VideoCode" required>
    </div>

    <div class="form-group">
        <label for="ChannelName">Channel Name:</label>
        <input type="text" id="ChannelName" name="ChannelName" required>
    </div>

    <button type="submit">Create Video</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // เพิ่ม event listener สำหรับ input ของ VideoURL
        document.getElementById('VideoURL').addEventListener('input', function () {
            // เรียกฟังก์ชันที่ตรวจสอบ URL และอัพเดท Thumbnail และ VideoCode
            updateThumbnailAndCode(this.value);
        });
    });

    function updateThumbnailAndCode(url) {
        // ตรวจสอบว่า URL เป็น URL ของ YouTube หรือไม่
        const youtubePattern = /^(https?:\/\/)?(www\.)?(youtube\.com\/(watch\?v=|embed\/|v\/)|youtu\.be\/)/;
        if (youtubePattern.test(url)) {
            // หา Video Code จาก URL
            const videoCode = url.match(/(watch\?v=|embed\/|v\/|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
            const thumbnailUrl = `https://img.youtube.com/vi/${videoCode[2]}/0.jpg`;

            // อัพเดท input ของ Thumbnail และ VideoCode
            document.getElementById('Thumbnail').value = thumbnailUrl;
            document.getElementById('VideoCode').value = videoCode[2];
        } else {
            // ถ้าไม่ใช่ URL ของ YouTube ให้ล้างค่า
            document.getElementById('Thumbnail').value = '';
            document.getElementById('VideoCode').value = '';
        }
    }
</script>
    </div>
@endsection
@section('styles')
    @parent
    <style>
        .custom-card {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    background-color: #e6e6fa;
}

.card-title {
    text-align: center;
}

.card-form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input,
select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 3px;
    margin-bottom: 10px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
    </style>
@endsection
