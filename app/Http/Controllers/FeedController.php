<?php

namespace App\Http\Controllers;

use App\Feed;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class FeedController extends Controller
{
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Request $request)
  {
    try {
      $request->validate([
        'feed-image' => 'required|image',
      ]);
      //Data Storage
      $feedInfo = Storage::disk('public')->exists('data.json') ? json_decode(Storage::disk('public')->get('data.json')) : [];
      //Save image
      $file = $request->file('feed-image');
      $fileName = $file->getClientOriginalName();
      $inputData['id'] = str_random(2).rand().str_random(2);
      $inputData['name'] = date('Y-m-d H:i:s').".".$fileName;
      $inputData['dp'] = Auth::user()->dp_path;
      $storeFile = Storage::disk('public')->put("/feed", $file);
      $inputData['path'] =  "../uploads/" . $storeFile;
      $inputData['datetime_submitted'] = date('Y-m-d H:i:s');
      //UserInfo
      if (Auth::check()){
        $inputData['user_id'] = Auth::id();
        $inputData['user_name'] = Auth::user()->name;
      }
      $inputData['liked_by'] = [];
      array_push($feedInfo, $inputData);

      Storage::disk('public')->put('data.json', json_encode($feedInfo));

      return redirect()->back();

    } catch(Exception $e) {

      return ['error' => true, 'message' => $e->getMessage()];

    }

  }

  public function lul()
  {
    $segment_uid = intval(request()->segment(2)); //returns user id
    $segment_pid = request()->segment(3); //returns post id

    //Data Storage
    $feedInfo = Storage::disk('public')->exists('data.json') ? json_decode(Storage::disk('public')->get('data.json'), true) : [];
    $newArr = [];
    foreach($feedInfo as $item) {
      if ($item["id"] == $segment_pid) {
        if (in_array($segment_uid, $item["liked_by"])) {
          $pos = array_search($segment_uid, $item["liked_by"]);
          array_splice($item['liked_by'], $pos, $pos+1);
        } else {
          array_push($item["liked_by"], $segment_uid);
        }
      }
      array_push($newArr, $item);
    }
    Storage::disk('public')->put('data.json', json_encode($newArr));
    return redirect()->back();
  }

}
