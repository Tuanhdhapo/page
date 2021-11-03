<div class="container-fluid descriptions-container">
  <div>
    <div class="col-lg-12 title-container">
      <p class="title">Descriptions lesson</p>
    </div>
    <div class="col-lg-12 content-container">
      <p class="content float-left">{{$lesson->description}}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 title-container">
      <p class="title">Requirements</p>
    </div>
    <div class="col-lg-12 content-container">
      <p class="content float-left">{{$lesson->requirement}}</p>
    </div>
  </div>
  <div class="row align-items-center">
    <div class="col-lg-1 title-container">
      <p class="title">Tags</p>
    </div>
    @foreach ($course->tags as $tag)
    <div class="col-lg-1 pl-0 content-container">
      <p class="content tags"> #{{ $tag->content }} </p>
    </div>
    @endforeach
  </div>
</div>
