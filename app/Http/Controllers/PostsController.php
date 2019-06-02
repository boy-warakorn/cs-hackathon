<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all()->toArray();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['schoolname' => 'required', 'description' => 'required', 'phonenumber' => 'required']);

        $posts = new Posts(
            [
                'schoolname' => $request->get('schoolname'),
                'description' => $request->get('description'),
                'phonenumber' => $request->get('phonenumber'),
                'check' => $request->get('check'),
                'difficult' => $request->get('difficult'),
                'success' => $request->get('success'),
            ]
        );
        $posts->save();
        return redirect()->route('posts.index')->with('success', 'Save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Posts::find($id);
        return view('posts.edit', compact('posts', 'id'));
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
        $this->validate(
            $request,
            [
                'schoolname' => 'required',
                'description' => 'required',
                'phonenumber' => 'required',
                'check' => 'required',
                'difficult' => 'required',
                'success' => 'required',
            ]
        );
        $posts = Posts::find($id);
        $posts->schoolname = $request->get('schoolname');
        $posts->description = $request->get('description');
        $posts->phonenumber = $request->get('phonenumber');
        $posts->check = $request->get('check');
        $posts->difficult = $request->get('difficult');
        $posts->success = $request->get('success');
        $posts->save();
        return redirect()->route('posts.index')->with('success', 'update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::find($id);
        $posts->delete();
        return redirect()->route('posts.index')->with('success', 'finish delete');
        return 0;
    }
}
