<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CookbookController extends Controller
{
    //
    public function index(){
      return view('indcb');
    }

    public function newCb(Request $request)
    {
      $request->validate([
        'new_cb' => 'string|min:2|required',
      ]);
      $uid = Auth::id();
      $slData = Storage::disk('public')->exists('cookbook_data.json') ? json_decode(Storage::disk('public')->get('cookbook_data.json'), true) : [];
      $newArr = [];
      $bol = false;
      foreach($slData as $item) {
        if ($item['user_id'] == $uid) {
          $bol = true;
          $dat['cookbook_id'] = Str::random(40);
          $dat['cookbook_name'] = $request->new_cb;
          $dat['cookbook_status'] = "private";
          $dat['cookbook_cover'] = "../uploads/cb/default.jpg";
          $dat['cookbook_recipes'] = [];
          array_push($item['cookbookList'], $dat);
        }
        array_push($newArr, $item);
      }

      if($bol == true){
        Storage::disk('public')->put('cookbook_data.json', json_encode($newArr));
      } else {
        if (Auth::check()){
          $inputData['user_id'] = Auth::id();
          $inputData['user_name'] = Auth::user()->name;
        }
        $inputData['cookbookList'] = [];
        $dat['cookbook_id'] = Str::random(40);
        $dat['cookbook_name'] = $request->new_cb;
        $dat['cookbook_status'] = "private";
        $dat['cookbook_cover'] = "../uploads/cb/default.jpg";
        $dat['cookbook_recipes'] = [];
        array_push($inputData['cookbookList'], $dat);
        array_push($slData, $inputData);
        Storage::disk('public')->put('cookbook_data.json', json_encode($slData));
      }
      return redirect()->back();
    }

    public function editCb(Request $request)
    {
      $uid = Auth::id();
      $slData = Storage::disk('public')->exists('cookbook_data.json') ? json_decode(Storage::disk('public')->get('cookbook_data.json'), true) : [];
      $newArr = [];
      $newCb = [];
      $bol = false;
      foreach($slData as $item) {
        if ($item['user_id'] == $uid) {
          $bol = true;
          foreach($item['cookbookList'] as $sl) {
            $item['cookbookList'] = [];
            if ($sl['cookbook_id'] == $request->hid) {
              $sl['cookbook_name'] = $request->cng_cb;
              $request->has('pp') ? $sl['cookbook_status'] = 'public' :  $sl['cookbook_status'] = 'private';
              array_push($newCb, $sl);
            } else {
              array_push($newCb, $sl);
            }
            $item['cookbookList'] = $newCb;
          }
        }
        array_push($newArr, $item);
      }

      if($bol == true){
        Storage::disk('public')->put('cookbook_data.json', json_encode($newArr));
      }
    }

    public function addCBR(Request $request, $cbid)
    {
      $uid = Auth::id();
      $slData = Storage::disk('public')->exists('cookbook_data.json') ? json_decode(Storage::disk('public')->get('cookbook_data.json'), true) : [];
      $newArr = [];
      $newCBR = [];
      $bol = false;
      $bol2 = false;
      foreach($slData as $item) {
        if ($item['user_id'] == $uid) {
          $bol = true;
          foreach($item['cookbookList'] as $sl) {
            $item['cookbookList'] = [];
            if ($sl['cookbook_id'] == $cbid) {
              foreach($sl['cookbook_recipes'] as $cbr) {
                if($cbr['recipe_id'] == $request->hid_id) $bol2 = true;
              }
              if($bol2 == false){
                $nli['recipe_id'] = $request->hid_id;
                $nli['recipe_name'] = $request->hid_name;
                array_push($sl['cookbook_recipes'], $nli);
              }
              array_push($newCBR, $sl);
            } else {
              array_push($newCBR, $sl);
            }
            $item['cookbookList'] = $newCBR;
          }
        }
        array_push($newArr, $item);
      }

      if($bol == true){
        Storage::disk('public')->put('cookbook_data.json', json_encode($newArr));
      }
    }

    public function del(Request $request, $cbid)
    {
      $uid = Auth::id();
      $htcData = Storage::disk('public')->exists('cookbook_data.json') ? json_decode(Storage::disk('public')->get('cookbook_data.json'), true) : [];
      $newArr = [];
      $newIt = [];
      $bol = false;
      $bol2 = false;
      foreach($htcData as $item) {
        if ($item['user_id'] == $uid) {
          $bol = true;
          foreach($item['cookbookList'] as $cbl) {
            if ($cbl['cookbook_id'] == $cbid) {
                foreach($cbl['cookbook_recipes'] as $key => $value){
                  if ($value['recipe_id'] === $request->hid_id) {
                    $bol2 = true;
                   unset($cbl['cookbook_recipes'][$key]);
                  }
                }
              }
              array_push($newIt, $cbl);
              if($bol2) $item['cookbookList'] = $newIt;
            }
        }
        array_push($newArr, $item);
      }

      if($bol == true){
        Storage::disk('public')->put('cookbook_data.json', json_encode($newArr));
      }
    }

    public function fA(Request $request, $cbid) {
      if ($request->has('sub_add')) {
          $this->addCBR($request, $cbid);
          return redirect()->back();
      } else if ($request->has('sub_del')){
          $this->del($request, $cbid);
          return redirect()->back();
      } else if ($request->has('cb_but')){
          $this->editCb($request);
          return redirect()->back();
      }
    }
}
