<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function post_page() {
        return view('admin.post_page');
    }

    public function add_post(Request $request) {

        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post();

        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->post_status = 'active';
        $post->user_id = $user_id;
        $post->name = $name;
        $post->usertype = $usertype;
        $image= $request->image;

        if($image) {


            $imagename = time().'.'.$image->getClientOriginalExtension();
    
            $request->image->move('postimage',$imagename);
    
            $post->image =$imagename;
        }
    

        $post->save();

        return redirect()->back()->with('message','Post Added Successfully');
    }

    public function show_post() {

        $post = Post::all();


        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id) {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message','Post Deleted Succesfully');
    }

    public function update_page($id) {

        $post = Post::find($id);


        return view('admin.update_page', compact('post'));
    }
    public function update_post(Request $request , $id) {

        $post = Post::find($id);

        $post->title=$request->title;
        $post->desc=$request->desc;
        $image=$request->image;
        if ($image) {
            // Eski resmi sil
            if ($post->image) {
                $oldImagePath = public_path('postimage/' . $post->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
    
            // Yeni resmi yükle
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(public_path('postimage'), $imagename);
            $post->image = $imagename;
        }
    

        $post->save();

        return redirect()->back()->with('message','Post Updated Successfully');
    }
}
