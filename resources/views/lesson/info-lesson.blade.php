  <div class="lesson-info">
      <div class="course-info-detail">
          <img src="{{ asset('images/img-course.png') }}">
          <span>Course :</span>
          <span>{{ $course->title }}</span>
      </div>


      <div class="course-info-detail">
          <img src="{{ asset('images/img-learners.png') }}">
          <span>Learns :</span>
          <span>{{ $course->number_user_student }}</span>
      </div>

      <div class="course-info-detail">
          <img src="{{ asset('images/img-times.png') }}">
          <span>Times :</span>
          <span>{{ $course->course_time }} Hourse</span>
      </div>

      <div class="course-info-detail">
          <img src="{{ asset('images/img-tags.png') }}">
          <span>Tags :</span>
          <span>
              @foreach ($tags as $tag)
                  {{ $tag->content }}
              @endforeach
          </span>
      </div>

      <div class="course-info-detail">
          <img src="{{ asset('images/img-price.png') }}">
          <span>Price :</span>
          <span>{{ $course->price }}$</span>
      </div>

      <button type="submit" class="btn btn-primary
                            view-all">Lessons end</button>

  </div>
