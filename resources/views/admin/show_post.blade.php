<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }
        table {
            width: 100%;
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
            <h1 class="title_deg">All Posts</h1>
          <div class="container table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Post Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Post by</th>
                        <th scope="col">Post Status</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Image</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($post as $post )
                  <tr>
                    <td> {{$post->title}} </td>
                    <td>{{$post->desc}} </td>
                    <td>{{$post->name}} </td>
                    <td>{{$post->post_status}} </td>
                    <td>{{$post->usertype}} </td>
                    <td>
                        <img width="100px"  src="postimage/{{$post->image}}" alt="">
                    </td>
                    <td> <a href="{{url('delete_post',$post->id)}}" class="btn btn-danger">Delete</a> </td>
                    <td> <a href="{{url('update_page',$post->id)}}" class="btn btn-success">update</a> </td>

                </tr>
                  @endforeach


                </tbody>
            </table>
          </div>


        </div>

        @include('admin.footer')
