<!-- index.blade.php -->
@extends('layouts.main')

@section('content')
    <h1>Subject List</h1>

    <div class="subject-cards">
        @foreach ($subjects as $subject)
            <div class="card">
                <h2>{{ $subject->SubjectName }}</h2>
                <p><strong>ID:</strong> {{ $subject->SubjectID }}</p>
                <p><strong>Description:</strong> {{ $subject->Description }}</p>
                <p><strong>Playlist Link:</strong> {{ $subject->PlaylistLink }}</p>
                <a href="{{ route('subject.videos', ['subjectID' => $subject->SubjectID]) }}">View Videos</a>
            </div>
            <style>
        .subject-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
        }
        h2 {
            margin-bottom: 10px;
        }

        /* btn-a {
            display: block;
            text-align: center;
            margin-top: 10px;
            background-color: #4caf50;
            color: white;
            padding: 8px;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        a:hover {
            background-color: #45a049;
        } */
    </style>
        @endforeach
    </div>
@endsection