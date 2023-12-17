<div class="subject-list">
    <ul>
        @foreach($subjects as $subject)
            <li><a href="{{ route('subjects.show', $subject->id) }}">{{ $subject->name }}</a></li>
        @endforeach
    </ul>
</div>
