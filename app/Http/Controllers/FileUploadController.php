<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fileupload;
use Illuminate\Support\Facades\Auth;

class FileuploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $request = request();
        if(Auth::user()->admin==1) {
        $fileuploads = Fileupload::latest()->paginate(5);
        return view('fileupload.index',compact('fileuploads'))
               ->with('i',(request()->input('page',1)-1)*5);
        } else {
            $fileuploads = Fileupload::where('user_id', '=',Auth::user()->id )->paginate(5);
        return view('fileupload.index',compact('fileuploads'))
               ->with('i',(request()->input('page',1)-1)*5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fileupload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_file' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,xlx,csv|max:2048', 
        ]);
        $user_file = $request->file('user_file');
        $user_fileSaveAsName = time()."-doc." . 
                                  $user_file->getClientOriginalExtension(); 

        $upload_path = 'docs';
        $user_file_url = $user_fileSaveAsName;
        $success = $user_file->move($upload_path, $user_fileSaveAsName);

        Fileupload::create([
            'user_name' => Auth::user()->name,
            'user_id' => Auth::user()->id,
            'doc' => $user_file_url
        ]);
        return redirect()->route('fileupload.index')
                         ->with('success','uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $fileupload = Fileupload::find($id);
        return view('fileupload.details',compact('fileupload'));
        
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $fileupload = Fileupload::find($id);
        $file_path = 'docs/'. $fileupload->doc;
        unlink($file_path);
        $fileupload->delete();
        return redirect()->route('fileupload.index')
                         ->with('success','deleted successfully');
    }
}
