<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.homecss')

    <style>
        h4 {
            font-size: 2rem !important;
        }
        .posts_container {
            background-color: black
        }
    </style>
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
       @include('home.header')
       
       <div class="d-flex posts_container">
        
   
      @foreach ($data as $data )

      <div class="d-flex flex-column container">
        <img width="300" src="/postimage/{{$data->image}}" alt="">
        <h4 class="text-white">{{$data->title}}</h4>
        <p class="text-white">{{$data->desc}}</p>
      <div>
        <a href="{{url('my_post_del',$data->id)}}" class="btn btn-danger">Delete</a>
        <a href="{{url('post_update_page',$data->id)}}" class="btn btn-primary">Update</a>
      </div>
    </div>
          
      @endforeach
      
      @if(session()->has('message'))

    
 
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session()->get('message')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    </div>
    </div>
    <!-- header section end -->


  
  
    @include('home.footer')
