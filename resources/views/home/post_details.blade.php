<!DOCTYPE html>
<html lang="en">

<head>
  <base href="/public">

    @include('home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
       @include('home.header')
        <!-- banner section start -->
        <!-- banner section end -->
    </div>
    <div class="row d-flex justify-content-center ">
        <div class="col-md-4 mt-5" > 
        <div><img src="/postimage/{{$post->image}}" class="services_img"></div>
        <h3 style="font-size: 2rem; font-weight:bold;"> {{$post->title}} </h3>
        <h4> {{$post->desc}} </h4>
        <p>Post by <b>{{$post->name}}</b></p>
    </div>
    </div>

    

  
  
    @include('home.footer')
