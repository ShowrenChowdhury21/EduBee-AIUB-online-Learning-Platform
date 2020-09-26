<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use App\Login;
use App\Post;
use App\reply;
use App\commentsreply;


class forumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = DB::table('moderators')->get();
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('forumposts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forumposts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'title'=>'required',
          'body'=>'required',
          'cover_image'=>'image|nullable|max:1999'

        ]);

        if($request -> hasFile('cover_image')){
          // Get filename with the extension
           $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
           // Get just filename
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           // Get just ext
           $extension = $request->file('cover_image')->getClientOriginalExtension();
           // Filename to store
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
           // Upload Image
           $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
          $fileNameToStore = 'noimage.jpeg';
        }


        $post= new Post;
        $post->title =$request->input('title');
        $post->body =$request->input('body');
        $post->userid = $request->input('userid');
        $post->username = $request->input('username');
        $post->cover_image =$fileNameToStore;
        $post->save();

        return redirect('/forumposts')->with('success','Posted Successfully');
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

        $rel = reply::where('postid', $id)
               ->orderBy('created_at','asc')->get();

        return view('forumposts.show')->with(['post'=>$post,'reply'=>$rel]);


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
      return view('forumposts.edit')->with('post',$post);
    }

    public function reply($id)
    {
      $post = Post::find($id);
      return view('forumposts.reply')->with('post',$post);
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
      $this->validate($request,[
        'title'=>'required',
        'body'=>'required'
      ]);

      if($request -> hasFile('cover_image')){
        // Get filename with the extension
         $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
         // Get just filename
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         // Get just ext
         $extension = $request->file('cover_image')->getClientOriginalExtension();
         // Filename to store
         $fileNameToStore = $filename.'_'.time().'.'.$extension;
         // Upload Image
         $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
      }

      $post= Post::find($id);
      $post->title =$request->input('title');
      $post->body =$request->input('body');
      if($request -> hasFile('cover_image')){
        $post->cover_image=$fileNameToStore;
      }
      $post->save();

      return redirect('/forumposts')->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);

        if($post->cover_image != 'noimage.jpeg'){
          Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/forumposts')->with('success','Post removed');

    }
    public function dashboard(Request $request)
    {

      if($request->session()->get('type') == "superadmin"){
          return redirect()->route('Superadmin.index');
      }
      elseif($request->session()->get('type')  == "admin"){
          return redirect()->route('Admin.index');
      }
      elseif($request->session()->get('type') == "moderator"){
          return redirect()->route('Moderator.index');
      }
      elseif($request->session()->get('type')  == "instructor"){
          return redirect()->route('Instructor.index');
      }
      elseif($request->session()->get('type') == "student"){
          return redirect()->route('Student.index');
      }
    }

    function search(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('posts')
         ->where('title', 'like', '%'.$query.'%')
         ->orderBy('created_at', 'desc')
         ->get();

      }
      else
      {
       $data=" ";
      }

      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->title.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <a>
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       </a>
       <hr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

}
