<div class="video-list">
    <ul>
        @foreach($videos as $video)
            <li>{{ $video->title }}</li>
        @endforeach
    </ul>
</div>
