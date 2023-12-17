<!-- resources/views/pages/subjects-and-videos.blade.php -->
@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Subjects</h2>
                @include('components.subject-list', ['subjects' => $subjects])
            </div>
            <div class="col-md-6">
                <h2>Videos</h2>
                @include('components.video-list', ['videos' => $videos])
            </div>
        </div>
    </div>
@endsection
