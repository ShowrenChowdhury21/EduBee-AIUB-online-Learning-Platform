<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Login;
use App\Post;
use App\reply;
use App\commentsreply;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post = Post::find($id);
        return view('forumposts.reply')->with('post',$post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $post = Post::find($request->input('postid'));

      $this->validate($request,[
        'reply'=>'required'
      ]);

      $re = new reply;
      $re->reply = $request->input('reply');
      $re->replyUid = $request->input('replyUid');
      $re->replyUname = $request->input('replyUname');
      $re->postid = $request->input('postid');

      $re->save();

      $re=reply::where('postid', $request->input('postid'))
             ->orderBy('created_at','asc')->get();

      return view('forumposts.show')->with(['post'=>$post,'reply'=>$re]);
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
      $rel = reply::find($id);
      return view('forumposts.editreply')->with('reply',$rel);

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
      $post = Post::find($request->input('postid'));

      $this->validate($request,[
        'reply'=>'required'
      ]);

      $re = reply::find($id);
      $re->reply = $request->input('reply');;
      $re->save();

      $re=reply::where('postid', $request->input('postid'))
             ->orderBy('created_at','asc')->get();

      return view('forumposts.show')->with(['post'=>$post,'reply'=>$re]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $rel= reply::find($id);
      $rel->delete();
      return redirect('/forumposts')->with('success','reply removed');

    }
}
