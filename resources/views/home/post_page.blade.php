<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.homecss')
    <style>
        label {
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
       @include('home.header')
    
      <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form action="{{url('update_post_data',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="">Post Title</label>
            <input class="form-control" type="text" value="{{$data->title}}" name="title" id="">
            <label for="">Post Desc</label>
            <input class="form-control" type="text" value="{{$data->desc}}" name="desc" id="">
            <div>
                <img src="/postimage/{{$data->image}}" width="100" height="100" alt="">
            </div>
            <label for="">Post İmage</label>
            <input class="form-control" type="file" name="image" id="">

            <input type="submit" class=" mt-2 btn btn-transparent">
            @if(session()->has('message'))

    
 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session()->get('message')}}</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          </form>
        </div>
        <div class="col-md-4"></div>
        
      </div>
   
  
    @include('home.footer')
