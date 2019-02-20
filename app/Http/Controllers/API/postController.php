<?php

namespace App\Http\Controllers\API;

use App\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new post();
        $post->title = $request->title;
        $post->body = $request->body;
        if ($post->save()){
        	return response()->json(['status' => 'success']);
		}else {
			return response()->json(['status' => 'error']);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	return post::find($id);
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
		$post = post::find($id);
		$post->title = $request->title;
		$post->body = $request->body;
		if ($post->update()){
			return response()->json(['status' => 'success']);
		}else {
			return response()->json(['status' => 'error']);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$post = post::find($id);

		if ($post == null){
			return response()->json(['status' => 'error']);
		}else if ($post->delete()){
			return response()->json(['status' => 'success']);
		}else {
			return response()->json(['status' => 'error']);
		}
    }
}
