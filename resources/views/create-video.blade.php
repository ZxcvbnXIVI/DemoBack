@extends('layouts.main')

@section('content')
<div class="card">
<div class="card-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                
                <li class="breadcrumb-item "><a href="/subjects/create">Create Subject</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Video</li>
              </ol>
            </nav>
        </div>
    <div class="card-body">
        <h1 class="card-title">Create Video</h1>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <form method="post" action="{{ route('videos.store') }}">
            @csrf

            <div class="form-group">
                <label for="SubjectID">Select a subject:</label>
                <select class="form-control" id="SubjectID" name="SubjectID" required>
                    <option value="" disabled selected>Select a subject</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->SubjectID }}">{{ $subject->SubjectName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="VideoURL">Video URL:</label>
                <input type="text" class="form-control" id="VideoURL" name="VideoURL" required>
            </div>

            <div class="form-group">
                <label for="VideoTitle">Video Title:</label>
                <input type="text" class="form-control" id="VideoTitle" name="VideoTitle" required>
            </div>

            <div class="form-group">
                <label for="Thumbnail">Thumbnail:</label>
                <input type="text" class="form-control" id="Thumbnail" name="Thumbnail" required>
            </div>

            <div class="form-group">
                <label for="VideoCode">Video Code:</label>
                <input type="text" class="form-control" id="VideoCode" name="VideoCode" required>
            </div>

            <div class="form-group">
                <label for="ChannelName">Channel Name:</label>
                <input type="text" class="form-control" id="ChannelName" name="ChannelName" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Video</button>
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
</div>
@endsection
@section('styles')
@parent
<style>
    .breadcrumb-item.active {
        text-decoration: underline;
    }
    .breadcrumb {
        background: none;
        padding: 0;
        margin-bottom: 10px;
    }
</style>
@endsection


