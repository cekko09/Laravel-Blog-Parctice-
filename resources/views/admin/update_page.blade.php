<!DOCTYPE html>
<html>
  <head> 
@include('admin.css')

<style>
    .post_title {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
        color: #fff;
    }


</style>
  </head>
  <body>
   @include('admin.header')
   <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')

<div class="page-content">

    @if(session()->has('message'))

    
 
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session()->get('message')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <h1 class="post_title">Update Post</h1>

    <div class="container">

        <form action="{{url('update_post',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="">Post Title</label>
                    <input class="form-control" value="{{$post->title}}" type="text" name="title">
                </div>
                <div class="form-group">
                    <label for="">Post Description</label>
                    <input class="form-control" value="{{$post->desc}}" type="textarea" name="desc">
                </div>
                <div>
                    <img width="150px" height="100px"  src="/postimage/{{$post->image}}" alt="">

                </div>
                <div class="form-group">
                    <label for="">Post İmage</label>
                    <input class="form-control" value="{{$post->image}}" type="file" name="image">
                </div>

                <div class="form-group">
                    <input class="form-control" type="submit"  class="btn btn-primary">
                </div>

        </form>


    </div>


</div>
      @include('admin.footer')
    