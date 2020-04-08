<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Storage;
 
class S3Controller extends Controller
{
    public function index()
    {
        return view('s3');
    }
    public function store(Request $request)
    {
        $this->validate($request, ['video' => 'required|file|mimetypes:video/mp4,video/mpeg,video/x-matroska']);
        if($request->hasfile('video'))
         {
            $file = $request->file('video');
            $name=time().$file->getClientOriginalName();
            $filePath = 'Media/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            return back()->with('success','Image Uploaded successfully');
         }
    }
}