<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// モデル入れるの忘れない
use App\Upload;



class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $uploads = Upload::all();
            return view('upload.index',['uploads'=>$uploads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload.create');
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
            'title' => 'required',
            'content'=> 'required',
            // イメーぞだけ
            'image'=> 'required|image',
        ]);

        // 画像を入れる時には必要
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/post',$image_new_name);

        // バリデーションをつけたものをどこから取ってくるかをつける
        $uploads = Upload::create([
            'title' => $request->title,
            'content'=> $request->content,
            'image'=> 'uploads/post/'.$image_new_name
            // 画像を表示するためには最後のスラッシュが必要
        ]);

        return redirect('upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
   {
        $upload= Upload::find($id);
        return view('upload.show',['upload'=>$upload]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upload=Upload::find($id);
        return view('upload.edit',['upload'=>$upload]);
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
        $upload= Upload::find($id);
        $upload->title=$request->title;
        $upload->content=$request->content;
        $upload->update();
        return redirect()->route('upload',['upload'=>$upload]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $upload=Upload::find($id);
        $upload->delete();
        return redirect()->route('upload');
    }
}
