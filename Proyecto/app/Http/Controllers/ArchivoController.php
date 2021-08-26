<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol.admin');
    }
    
    public function index()
    {
        $archivos = Archivo::all();
        return view("dashboard.archivo.index", compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.archivo.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('archivo') && $request->file('archivo')->isValid()){
            $ruta = $request->archivo->store('public');
            $archivo = new Archivo();
            $archivo->ruta = $ruta;
            $archivo->nombre_original = $request->archivo->getClientOriginalName();
            $archivo->mime = $request->archivo->getMimeType();
            $archivo->post_id = $request->post_id;
            $archivo->save();
        }
        return back()->with('status','Archivo creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function download(Archivo $archivo)
    {
        return Storage::download($archivo->ruta, $archivo->nombre_original, ['Content-Type' => $archivo->mime]);
    }

    public function post(Post $post)
    {
        //dd($post);
        $posts = Post::all();
        $archivos = Archivo::orderBy('created_at','desc')->where('post_id','=',$post->id)->paginate(4);
        //dd($archivos);
        return view("dashboard.archivo.post",['archivos'=> $archivos,'posts'=> $posts, 'post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        Storage::delete($archivo->ruta);
        $archivo->delete();
        return back()->with('status','File deleted successfully');
    }
}
