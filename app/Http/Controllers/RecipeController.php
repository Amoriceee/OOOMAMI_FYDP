<?php

namespace App\Http\Controllers;

use App\Recipe;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function indindex()
  {
    $rid = intval(request()->segment(2)); //returns postid

    return view("indrec", compact("rid"));
  }

  public function htc(Request $request)
  {
    $sData['id'] = $request->id;
    $sData['name'] = $request->name;
    $sData['image'] = $request->image; //returns postid
    $uid = Auth::id();
    $htcData = Storage::disk('public')->exists('htc_data.json') ? json_decode(Storage::disk('public')->get('htc_data.json'), true) : [];
    $newArr = [];
    $bol = false;
    $bol2 = false;
    foreach($htcData as $item) {
      if ($item['user_id'] == $uid) {
        $bol = true;
        foreach($item['htc'] as $key => $value){
          if ($value['id'] === $sData['id']) {
            $bol2 = true;
           unset($item['htc'][$key]);
          }
        }
        if($bol2 == false){
          array_push($item['htc'], $sData);
        }
      }
      array_push($newArr, $item);
    }

    if($bol == true){
      Storage::disk('public')->put('htc_data.json', json_encode($newArr));
    } else {
      if (Auth::check()){
        $inputData['user_id'] = Auth::id();
        $inputData['user_name'] = Auth::user()->name;
      }
      $inputData['htc'] = [];
      array_push($inputData['htc'], $sData);
      array_push($htcData, $inputData);
      Storage::disk('public')->put('htc_data.json', json_encode($htcData));
    }
    return redirect()->back();
  }

}
