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
        $id=$request->town_id;
       // $town=Towns::whereId($id)->with('images')->first();

        Validator::make($request->all(), [
            'town_id'=>'required',
            'earth' => 'max:10000',
            'flood' => 'max:10000',
            'rain' => 'max:10000',
            'tsu' => 'max:10000',
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
                if($request->hasFile('earth')){
                    $earth=Images::where('town_id',$id)->where('type',1);
                    if($earth->count()){
                        $earth=$earth->first();
                        $earth->path=$request->file('earth')->store('images');
                        $earth->save();
                    }else{
                        $earth=new Images();
                        $earth->slug=str_slug(str_random(20));
                        $earth->type=1;
                        $earth->description='Earthquake Hazard';
                        $earth->path=$request->file('earth')->store('images');
                        $earth->town_id=$id;
                        $earth->save();
                    }
                }//end for request earth;

                //for flood
                if($request->hasFile('flood')){
                    $flood=Images::where('town_id',$id)->where('type',2);
                    if($flood->count()){
                        $flood=$earth->first();
                        $flood->path=$request->file('flood')->store('images');
                        $flood->save();
                    }else{
                        $flood=new Images();
                        $flood->slug=str_slug(str_random(20));
                        $flood->type=2;
                        $flood->description='Flood Hazard';
                        $flood->path=$request->file('flood')->store('images');
                        $flood->town_id=$id;
                        $flood->save();
                    }
                }//end for request flood;

                //for rain
                if($request->hasFile('rain')){
                    $rain=Images::where('town_id',$id)->where('type',3);
                    if($rain->count()){
                        $rain=$earth->first();
                        $rain->path=$request->file('rain')->store('images');
                        $rain->save();
                    }else{
                        $rain=new Images();
                        $rain->slug=str_slug(str_random(20));
                        $rain->type=3;
                        $rain->description='Rain-induced Hazard';
                        $rain->path=$request->file('rain')->store('images');
                        $rain->town_id=$id;
                        $rain->save();
                    }
                }//end for request rain;

                //for tsunami
                if($request->hasFile('tsu')){
                    $tsu=Images::where('town_id',$id)->where('type',4);
                    if($tsu->count()){
                        $tsu=$earth->first();
                        $tsu->path=$request->file('tsu')->store('images');
                        $tsu->save();
                    }else{
                        $tsu=new Images();
                        $tsu->slug=str_slug(str_random(20));
                        $tsu->type=4;
                        $tsu->description='Tsunami Hazard';
                        $tsu->path=$request->file('tsu')->store('images');
                        $tsu->town_id=$id;
                        $tsu->save();
                    }
                }//end for request rain;


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
