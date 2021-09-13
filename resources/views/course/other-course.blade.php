 <div class="other-course">
     <p class="title-other-course">Other Courses</p>
     <div class="content-other-course">
         <span>
             @foreach ($otherCourses as $key => $item)
                 <div class="show-other-courses">
                     <p href="{{ route('courses.detail', $item->id) }}">{{ $key + 1 }}.
                         {{ $item->title }}</p>
                 </div>
             @endforeach
         </span>
     </div>
     <a href="/allcourse">
         <button type="submit" class="btn btn-primary view-all">View all ours
             courses</button>
     </a>
 </div>
