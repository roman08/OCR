<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Response;
use TesseractOCR;
use File;
class pruebasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function texto() {
        $imagen = '/imagen/scan.jpg';
        $texto = (new TesseractOCR(public_path($imagen)))->run();
        $array = explode("\n", $texto);
        $arra = array_filter($array, "strlen");
        echo $arra[0];
        
    }

    public function ajax() {
        $base = Input::get('imgcorte');
         //$base = $this->imagen;
                    list(, $base) = explode(';', $base);
                    list(, $base) = explode(',', $base);
                    $Base64Img = base64_decode($base);
                    $name = 'logo.png';
                    $result = file_put_contents('/tmp/'.$name, $Base64Img);


                     //la ruta donde se guardara la imagen
                $path = public_path() . '/imagen/';
                //movemos la imagen que esta alojada en el directorio tmp
                copy('/tmp/' . $name, $path . $name);
                //borramos el archivo temporal
                unlink('/tmp/' . $name);

                    $imagen = '/imagen/'.$name;
        $texto = (new TesseractOCR(public_path($imagen)))->run();
        $array = explode("\n", $texto);
        $arra = array_filter($array, "strlen");                 
            File::delete(public_path().$imagen);

    //$final = implode(' ', $arra);
        return Response::json($arra);
    }

    public function index()
    {
        return View('ocr.index');
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
