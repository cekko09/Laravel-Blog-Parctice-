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
    <h1 class="post_title">Post Title</h1>

    <div class="container">

        <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="">Post Title</label>
                    <input class="form-control" type="text" name="title">
                </div>
                <div class="form-group">
                    <label for="">Post Description</label>
                    <input class="form-control" type="textarea" name="desc">
                </div>
                <div class="form-group">
                    <label for="">Post İmage</label>
                    <input class="form-control" type="file" name="image">
                </div>

                <div class="form-group">
                    <input class="form-control" type="submit"  class="btn btn-primary">
                </div>

        </form>


    </div>


</div>
      @include('admin.footer')
    