@extends('layouts.main')

@section('content')
    <h1>Videos for {{ $subject->SubjectName }}</h1>

    @foreach($videos as $video)
        <div>
            <h2>{{ $video->VideoTitle }}</h2>
            <p>{{ $video->VideoURL }}</p>
            <img src="{{ $video->Thumbnail }}" alt="Video Thumbnail">
            <p>Categories:
                @foreach($video->categories as $category)
                    {{ $category->CategoryName }}
                @endforeach
            </p>
        </div>
    @endforeach
@endsection