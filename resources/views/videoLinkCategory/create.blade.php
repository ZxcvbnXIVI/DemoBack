@extends('layouts.main')
@section('content')
    <div class="container">
        <form action="{{ route('videoLinkCategory.store') }}" method="POST">
            @csrf
            <label for="VideoID">เลือก Video:</label>
            <select name="VideoID">
                @foreach($videos as $video)
                    <option value="{{ $video->VideoID }}">{{ $video->name }}</option>
                @endforeach
            </select>

            <label for="CategoryID">เลือก Category:</label>
            <select name="CategoryID">
                @foreach($categories as $category)
                    <option value="{{ $category->CategoryID }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button type="submit">บันทึก</button>
        </form>
    </div>
@endsection