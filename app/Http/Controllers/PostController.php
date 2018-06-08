<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	    $posts = Post::orderBy('id','DESC')->paginate(5);

	    //$username = Auth::user()->id;
	    return view('posts.index',compact('posts'))
		    ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$userid = Auth::user()->id;
    	$categories = Category::all();
        return view('posts.create',compact('userid','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $this->validate($request, [
		    'post_title' => 'required',
		    'post_body' => 'required',
		    'category_id' => 'required',
	    ]);
	    //Post::create($request->all());
	    $post = new Post();
	    $post->post_title = $request->input('post_title');
	    $post->user_id = Auth::user()->id;
	    $post->category_id = $request->input('category_id');
	    $post->post_body = $request->input('post_body');

	    $post->save();


	    return redirect()->route('posts.index')
	                     ->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $post = Post::find($id);
	    return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $post = Post::find($id);
	    $category_post=Post::find($id)->category_id;
	    $categories=Category::all();
	    $category=Category::find($category_post);
	    return view('posts.edit',compact('post','categories','category'));
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
	    $this->validate($request, [
		    'post_title' => 'required',
		    'post_body' => 'required',
		    'category_id' => 'required',
	    ]);


	    Post::find($id)->update($request->all());
	   /* $post = Post::find($id);
        $post->category()->dissociate();
	    $category = $request->input('category_id');
	    $post->category()->associate($category);*/
	    return redirect()->route('posts.index')
	                     ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    Post::find($id)->delete();
	    return redirect()->route('posts.index')
	                     ->with('success','Post deleted successfully');
    }
}
