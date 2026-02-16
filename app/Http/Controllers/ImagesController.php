<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Imagess;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\View;

class ImagesController extends Controller
{

  public function fetch_image()
  {
    $data = Imagess::all();
    return view('welcome', compact('data'));
  }

  public function image_create(ImageRequest $request)
  {

    $data = $request->validated();

    $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
    $path = $request->file('image')->storeAs('image', $fileName, 'public');

    if ($path) {
      Imagess::create([
        'url' => $path
      ]);
      return redirect()->route('image')->with('status', 'The iamge uploaded successfully');
    }

    return redirect()->route('image')->with('status', 'There were error');
  }

  public function edit($id)
  {
    $image = Imagess::findOrFail($id);
    return view('update', compact('image'));
  }

  public function update(ImageRequest $request, string $id)
  {
    $request->validated();

    $exist_img = Imagess::find($id);


   if($request->hasFile('image')){
    $file = public_path("storage/" . $exist_img->url);

    if (file_exists($file)) {
      @unlink($file);
    }
   }

    $fileName = time() . $request->file('image')->getClientOriginalName();

    $path = $request->file('image')->storeAs('image', $fileName, 'public');
    $exist_img->update([
      'url'=>$path
    ]);

    return redirect()->route('image')->with(['status' => 'successfully Updated', 'path' => $path]);
  }

  // dlete image
   public function delete( string $id)
  {
    $data = Imagess::find($id);
    if(!empty($data)){

      $file = public_path('storage/'.$data->url);

      if(file_exists($file)){
        @unlink($file);
      }

      $data->delete();

      return redirect()->back()->with('status','successfully deleted');
    }
  }
}
