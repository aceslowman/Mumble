<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Carousel;
use App\Photo;
use App\User;
use App\Tag;
use Auth;
use Imagick;

use Image;
use Log;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nick)
    {
        $data['user']     = User::with('photos','profile')->where('nick',$nick)->first(); 
        $data['carousel'] = Carousel::with('photos')->where('profile_id',$data['user']->profile->id)->first();   
        $data['title']    = $data['user']->name;
        $data['navTitle'] = $data['user']->name;

        return view('photos.photos', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($request->hasFile('file')){   
            $photo     = new Photo;
            $file      = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename  = md5($file).".".$extension;
           
            $photo->filename       = $filename;

            if($photo->save()){
                Image::make($file)->fit(50)->save(public_path('img/user_photos/thumb_'.$filename));
                
                Image::make($file)->resize(150, null, function($constraint){
                    $constraint->aspectRatio();
                })->save(public_path('img/user_photos/small_'.$filename));

                Image::make($file)->resize(400, null, function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save(public_path('img/user_photos/medium_'.$filename));

                Image::make($file)->resize(1000, null, function($constraint){
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save(public_path('img/user_photos/large_'.$filename));

                // Creates gaussian blurred index images
                // -------------------------------------
                Image::make($file)->fit(2400,614)->save(public_path('img/user_photos/index_'.$filename));        

                $imagick = new Imagick();
                $imagick->readImage(public_path('img/user_photos/index_'.$filename));
                $imagick->blurImage(40,40);    
                $imagick->writeImage('img/user_photos/index_'.$filename);
                // -------------------------------------

                $file->move('img/user_photos/',$filename);                             
                $user->photos()->attach($photo->id);
            }
        }
    }

    public function addtoCarousel()
    {
        $user     = User::find(Auth::user()->id);
        $carousel = Carousel::where('profile_id',$user->id)->first();  
        $photo    = Photo::find($_POST['img_id']);

        $carousel->photos()->save($photo);
        $user->photos()->detach($photo);

        $photos = array();
        $photos['user']     = $user->photos()->get();
        $photos['carousel'] = $carousel->photos()->get();

        return $photos;
    }

    public function removefromCarousel()
    {
        $user = User::find(Auth::user()->id);
        $carousel = Carousel::where('profile_id',$user->id)->first();  
        $photo = Photo::find($_POST['img_id']);
        $user->photos()->attach($photo->id);
        $carousel->photos()->detach($_POST['img_id']);

        $photos = array();
        $photos['user']     = $user->photos()->get();
        $photos['carousel'] = $carousel->photos()->get();

        return $photos;
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
