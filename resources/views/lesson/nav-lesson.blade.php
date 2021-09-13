<div class="lesson-link d-flex">
    <a href="{{ route('lesson.detail', $lesson->id) }}">Descriptions</a>
    <a href="{{ route('lesson.teacher', $lesson->id) }}">Teachers</a>
    <a href="{{ route('lesson.program', $lesson->id) }}">Program</a>
    <a href="{{ route('lesson.review', $lesson->id) }}">Reviews</a>
</div>
