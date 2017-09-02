<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Tag;
Use Session;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        
$tags = Tag::all();
return view ('tags.index')->withTags($tags);

            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array('name'=>'required|max:255'));
        $tag = new Tag;
        $tag->name=$request->name;
        $tag->save();
        session::flash('sucsee','New Tag was successfully created!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request){
         $tag = Tag::where('id',$request->tag)->get();

       return view('tags.show')->withTag($tag);
        
    }
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
         $this->validate($request,array('name'=>'required|max:255'));
         $tag->name = $request->name;
         $tag->save();
         return redirect()->route('tags.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->getposts()->detach();
        $tag->delete();
        Session::flash('success','the tag was successfully deleted');
        return redirect()->route('tags.index');
    }
}
