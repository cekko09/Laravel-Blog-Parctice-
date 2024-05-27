<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index() {
        $post = Post::all();
        $usertype = Auth()->user()->usertype;
        if($usertype == 'user') {
            return view('home.index', compact('post'));
        }else if ($usertype == 'admin') {
            return view('admin.index');
        }else {

        }
    }
    
    public function home() {

        $post = Post::all();

        return view('home.index',compact('post'));
    }
    public function post_details($id) {

        $post = Post::find($id);

        return view('home.post_details',compact('post'));
    }

    public function create_post() {


        return view('home.create_post',);
    }
    public function user_post(Request $request) {

        $user=Auth()->user();
        $userid=$user->id;
        $usertype=$user->usertype;
        $username=$user->name;

        $post = new Post; 
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->name = $username;
        $post->usertype = $usertype;
        $post->user_id = $userid;

        $image= $request->image;

        if($image) {


            $imagename = time().'.'.$image->getClientOriginalExtension();
    
            $request->image->move('postimage',$imagename);
    
            $post->image =$imagename;
        }
    

        $post->save();

        return redirect()->back()->with('message','Post Added Successfully');

    }

    public function my_post () {

        $user=Auth::user();

        $userid = $user->id;
        $data = Post::where('user_id','=',$userid)->get();

  return  view('home.my_post',compact('data'));
    }
    public function my_post_del ($id) {


        $data = Post::find($id);

        $data->delete();
        return redirect()->back()->with('message','Post Deleted Successfully');


    }
    public function post_update_page ($id) {


        $data = Post::find($id);

        return view('home.post_page',compact('data'));


    }
    public function update_post_data(Request $request , $id) {
        $data= Post::find($id);

        
        $data->title=$request->title;
        $data->desc=$request->desc;
        $image=$request->image;
        if ($image) {
            // Eski resmi sil
            if ($data->image) {
                $oldImagePath = public_path('postimage/' . $data->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
    
            // Yeni resmi yükle
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(public_path('postimage'), $imagename);
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back()->with('message','Post Updated Successfully');

    
        
    }
}
