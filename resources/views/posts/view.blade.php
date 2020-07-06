@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          @if(session('response'))
            <div class="alert alert-success">
              {{session('response')}}
            </div>
          @endif

            <div class="card">
                <div class="card-header">View Post</div>

                <div class="card-body">
                  <div class="row">

                    <div class="col-md-4">
                      <ul class="list-group">
                        @if(count($categories) > 0)
                          @foreach($categories->all() as $category)
                            <li class="list-group-item"> <a href='{{url("category/{$category->id}")}}'>{{$category->category}}</a> </li>
                          @endforeach
                        @else
                          <p>No category found</p>
                        @endif
                      </ul>
                    </div>

                    <div class="col-md-8">

                        @if(count($posts) > 0)
                          @foreach($posts->all() as $post)
                          <h2>{{$post->post_title}}</h2>
                          <img src="{{$post->post_image}}" alt="">
                          <p>{{$post->post_body}}</p>

                          <ul class="nav nav-pills">

                            <li role="presentation" >
                              <a href='{{url("/like/{$post->id}")}}'>
                                <span class="fa fa-thumbs-up pr-3">Like ({{$likeCtr}})</span>
                              </a>
                            </li>

                            <li role="presentation" >
                              <a href='{{url("/dislike/{$post->id}")}}'>
                                <span class="fa fa-thumbs-down pr-3"> Dislike ({{$dislikeCtr}})</span>
                              </a>
                            </li>

                            <li role="presentation" >
                              <a href='{{url("/comment/{$post->id}")}}'>
                                <span class="fa fa-comment"> Comment</span>
                              </a>
                            </li>

                          </ul>


                          @endforeach
                        @else
                          <p>No Avalable Post</p>
                        @endif

                        <form method="POST" action='{{ url("/comment/{$post->id}") }}' enctype="multipart/form-data">
                            @csrf

                            <div class="form-group ">
                                  <textarea id="comment" rows="6" class="form-control"  name="comment" required autofocus> </textarea>
                              </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block">POST COMMENT</button>
                            </div>
                        </form>
                        <h3>Comment</h3>
                        @if(count($comment) > 0)
                          @foreach($comment->all() as $commentt)
                            <p>{{$commentt->comment}}</p>
                            <p>Posted by: {{$commentt->name}}</p>
                            <hr/>
                          @endforeach
                        @else
                          <p>No Avalable Post</p>
                        @endif


                    </div>

                  </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
