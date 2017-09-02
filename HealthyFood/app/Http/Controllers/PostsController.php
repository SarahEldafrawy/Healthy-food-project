<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use Session ;

class PostsController extends Controller
{     public function __construct()
   {
         $this->middleware('auth')->except(['index','show']);
   }
      public function index()
      {

         $posts = Post::latest()->get();
         return view('posts.index',compact('posts'));
      }


         public function show(Post $post)
      {
         
         return view('posts.show',compact('post'));
      }

      public function create()
      {
$tags = Tag::all();
         return view('posts.create')->withTags($tags);
      }

      public function store(Request $request)
      {
         $this->validate(request(),[

            'title'=>'required',
            'numberofcalories'=>'required',
            'ingredients' => 'required',
            'body' =>'required'

            ]);
         $posts= new Post(request(['title','numberofcalories','ingredients','body']));
        auth()->user()->publish($posts);
        $posts->gettags()->sync($request->tags,false);//add not over write
         return redirect('/posts');
      }
     
     public function edit(Post $post){
      $tags = Tag::all();
          return view('posts.edit')->withPost($post)->withTags($tags);
     }
     public function update(Request $request , $id){
      //validate 
        $this->validate(request(),[

            'title'=>'required',
            'numberofcalories'=>'required',
            'ingredients' => 'required',
            'body' =>'required'

            ]);

         // save the updated data
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->numberofcalories = $request->input('numberofcalories');
        $post->ingredients = $request->input('ingredients');
             $post->gettags()->detach();

        $post->gettags()->sync($request->tags,false);
        $post->save();
        return redirect()->route('posts.show', $post);
     }
     public function destroy($id)
     {
     $post = Post::find($id);
     $post->gettags()->detach();
          $post->delete();

     Session::flash('success','The post was successfully deleted');
     return redirect()->route('posts.index');
     }
}
