@extends('layouts.main')
@section('content')
    <div class="card">
    <div class="card-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Create Subject</li>
                <li class="breadcrumb-item"><a href="/videos/create">Create Video</a></li>
              </ol>
            </nav>
        </div>
        <div class="card-body">
            <h1 class="card-title">Create Subject</h1>
            @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
            <form method="post" action="{{ route('subjects.store') }}">
                @csrf

                <div class="form-group">
                    <label for="SubjectName">Subject Name:</label>
                    <input type="text" class="form-control" id="SubjectName" name="SubjectName" required>
                </div>

                <div class="form-group">
                    <label for="Description">Description:</label>
                    <textarea class="form-control" id="Description" name="Description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="PlaylistLink">Playlist Link:</label>
                    <input type="text" class="form-control" id="PlaylistLink" name="PlaylistLink" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Subject</button>
            </form>

          
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
