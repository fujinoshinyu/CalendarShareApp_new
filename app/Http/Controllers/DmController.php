<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cloudinary;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dm()
    {
        $comments = Comment::get();
        return view('dm', ['comments' => $comments]);
    }
    
    public function add(Request $request)
{
    $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        //dd($uploadedFileUrl);
        
    $user = Auth::user();
    $comment = $request->input('comment');
    Comment::create([
        'login_id' => $user->id,
        'name' => $user->name,
        'comment' => $comment,
        'image' => $uploadedFileUrl

        
    ]);
    return redirect()->route('dm');
}
    public function getData()
{
    $comments = Comment::orderBy('created_at', 'desc')->get();
    $json = ["comments" => $comments];
    return response()->json($json);
}
}