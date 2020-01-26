<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;

class SerieController extends Controller
{
  public function createSerie(Request $request){
    $serie = new Series;
    $serie->name =$request->name;
    $serie->sinopse =$request->sinopse;
    $serie->genero =$request->genero;
    $serie->likes =$request->likes;
    $serie->user_id =$request->user_id;
    $serie->save();

    return response()->json([$serie]);
  }
  public function listSerie(){
    $serie = Series::all();
    return response()->json($serie);

  }
  public function showSerie($id){
    $serie = Series::findOrFail($id);
    return response()->json([$serie]);
  }
  public function updateSerie(Request $request, $id){
    $serie = Series::find($id);

    if($serie){
      if($request->name){
        $series->name =$request->name;
      }
      if($request->sinopse){
        $serie->sinopse =$request->sinopse;
      }
      if($request->genero){
        $serie->genero =$request->genero;
      }
      if($request->likes){
        $serie->likes =$request->likes;
      }
      if($request->user_id){
        $serie->user_id =$request->user_id;
      }

      $serie-> save();
      return response()->json([$serie]);
    }
    else{
        return response()->json(['Serie nao existe.']);
    }
  }
  public function deleteSerie($id){
        Series::destroy($id);
        return response()->json(['Serie deletada.']);
      }
}
