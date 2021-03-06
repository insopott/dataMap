<?php

namespace App\Http\Controllers;


use App\Images;
use App\Towns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $types=array('1'=>'Earthquake Hazard','2'=>'Flood Hazard','3'=>'Rain-Induced Hazard','4'=>'Tusnami Hazard');
    public function __construct()
    {
        //ini_set("upload_max_filesize", "400M");
        //ini_set("post_max_size","1000M");
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $types=$this->types;
        ini_set("upload_max_filesize", "400M");
        ini_set("post_max_size","1000M");
        //die(ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir());
        return view('uploads.index',compact('types'));
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
        $id=$request->town_id;
       // $town=Towns::whereId($id)->with('images')->first();

        Validator::make($request->all(), [
            'town_id'=>'required',
            'file' => 'required|max:10000',

        ],[
           // 'earth.required'=>'Select Image for Earthquake hazard',
            'earth.max'=>'Earthquake hazard image too large',

            //'flood.required'=>'Select Image for Flood hazard',
            'flood.max'=>'Flood hazard image too large',

            //'rain.required'=>'Select Image for Rain hazard',
            'rain.max'=>'Rain hazard image too large',

            'tsu.max'=>'Tsunami hazard image too large',

            'town_id.required'=>'Please Select Town',
        ])->validate();
        try{
            DB::beginTransaction();
                //for earth
                if($request->hasFile('file')){
                    $earth=Images::where('town_id',$id)->where('type',$request->type);
                    if($earth->count()){
                        $earth=$earth->first();
                        $earth->path=$request->file('file')->store('images');
                        $earth->save();
                    }else{
                        $earth=new Images();
                        $earth->slug=str_slug(str_random(20));
                        $earth->type=$request->type;
                        $earth->description=$this->types[$request->type];
                        $earth->path=$request->file('file')->store('images');
                        $earth->town_id=$id;
                        $earth->save();
                    }
                }//end for request earth;



            DB::commit();
        }catch (\Exception $exception){
            DB::rollback();
            return back()->with('messages','Something Went Wrong');
        }

        /*if($request->hasFile('file')){
         //   return 'yes';
            foreach ($request->file('file') as $f){
                $img=new Images();
                $img->slug=str_slug(str_random(20));
                $img->path=$f->store('images');
                $img->town_id=$request->town_id;
                $img->save();

            }*/
           //return back();
        //}else return back()->withInput($request->all())->with('messages','Something Went Wrong');
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
