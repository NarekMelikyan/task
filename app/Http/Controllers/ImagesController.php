<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ImagesController extends Controller
{
    public function upload(){
        if(Input::hasFile('image')){
            $images = Input::all()['image'];

            foreach ($images as $image) {
                $image_name = time().$image->getClientOriginalName();
                $image->move('uploads',$image_name);
                Images::create([
                    'image'=>$image_name,
                    'user'=>Auth::user()->name
                ]);
            }
            return redirect()->back();

        }else{
            return redirect()->back()->with('msg','Please select files before click on Submit ! ');
        }
    }
}
