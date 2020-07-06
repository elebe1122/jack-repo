@extends('layouts.app')
<style type="text/css">
 .default_img{
   border-radius: 100%;
   max-width: 100px;
 }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(count($errors) > 0)
            @foreach($errors->all() as $error)
              <div class="alert alert-danger">
                {{$error}}
              </div>
            @endforeach
          @endif

          @if(session('response'))
            <div class="alert alert-success">
              {{session('response')}}
            </div>
          @endif
            <div class="card">
                <div class="card-header">

                  <div class="row">
                    <div class="col-md-4">Dashboard</div>
                      <div class="col-md-8">
                        <form class="" action='{{url("/search")}}' method="post">
                          {{csrf_field()}}
                            <div class="input-group">
                              <input type="text" name="search" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default" name="button">GO!</button>
                                </span>

                            </div>

                        </form>
                      </div>

                  </div>

                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">

                      @if(!empty($profile1))
                      <img src="{{ $profile1->profile_pic }}" class="default_img" alt="">
                      @else
                      <img src="{{ url('images/e.png') }}" class="default_img" alt="">
                      @endif

                      @if(!empty($profile1))
                    <p class="lead">{{ $profile1->name }}</p>
                      @else
                      <p> No Profile Name</p>
                      @endif

                      @if(!empty($profile1))
                      <p class="lead">{{ $profile1->designation }}</p>
                       @else
                       <p>No Profile designation</p>
                      @endif

                    </div>

                    <div class="col-md-8">


                      @if(count($posts) > 0)
                        @foreach($posts->all() as $post)
                        <h2>{{$post->post_title}}</h2>
                        <img src="{{$post->post_image}}" alt="">
                        <p>{{substr($post->post_body, 0, 150)}}</p>

                        <ul class="nav nav-pills">
                          <li role="presentation" >
                            <a href='{{url("/view/{$post->id}")}}'>
                              <span class="fa fa-eye pr-3">VIEW</span>
                            </a>
                          </li>

                          <li role="presentation" >
                            <a href='{{url("/edit/{$post->id}")}}'>
                              <span class="fa fa-outdent pr-3"> EDIT</span>
                            </a>
                          </li>

                          <li role="presentation" >
                            <a href='{{url("/delete/{$post->id}")}}'>
                              <span class="fa fa-trash"> DELETE</span>
                            </a>
                          </li>


                        </ul>
                        <cite style="" >Posted on: {{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                        <hr>

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
