<?php

namespace App\Http\Controllers;


use App\Images;
use App\Towns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //ini_set("upload_max_filesize", "400M");
        //ini_set("post_max_size","1000M");
        $this->middleware('auth');
    }

    public function index()
    {
        //
        ini_set("upload_max_filesize", "400M");
        ini_set("post_max_size","1000M");
        //die(ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir());
        return view('uploads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        ini_set("upload_max_filesize", "400M");
        ini_set("post_max_size","1000M");
        //return $request->all();
        $town=Towns::whereId($request->town_id)->first();
        if($town->images)
            $town->images()->delete();
        Validator::make($request->all(), [
            'file' => ' required | max:1000'
        ])->validate();
        if($request->hasFile('file')){
         //   return 'yes';
            foreach ($request->file('file') as $f){
                $img=new Images();
                $img->slug=str_slug(str_random(20));
                $img->path=$f->store('images');
                $img->town_id=$request->town_id;
                $img->save();

            }
           return back();
        }else return back()->withInput($request->all())->with('messages','Something Went Wrong');
        return back()->with('messages','Successfully Uploaded');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
