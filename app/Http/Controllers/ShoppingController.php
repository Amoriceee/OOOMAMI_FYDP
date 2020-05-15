<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ShoppingController extends Controller
{

  public function buildShoppingList(Request $request) {
    $this->newList($request);
    $this->li($request);
    return redirect()->to('/shopl');
  }

  public function newList(Request $request)
  {
    $request->validate([
      'new_item' => 'string|min:2|required',
    ]);
    $uid = Auth::id();
    $slData = Storage::disk('public')->exists('shopping_data.json') ? json_decode(Storage::disk('public')->get('shopping_data.json'), true) : [];
    $newArr = [];
    $bol = false;
    foreach($slData as $item) {
      if ($item['user_id'] == $uid) {
        $bol = true;
        if($request->hid){
          $dat['list_id'] = $request->hid;
        } else {
          $dat['list_id'] = Str::random(40);
        }
        $dat['list_name'] = $request->new_item;
        $dat['list_items'] = [];
        array_push($item['shoppingList'], $dat);
      }
      array_push($newArr, $item);
    }

    if($bol == true){
      Storage::disk('public')->put('shopping_data.json', json_encode($newArr));
    } else {
      if (Auth::check()){
        $inputData['user_id'] = Auth::id();
        $inputData['user_name'] = Auth::user()->name;
      }
      $inputData['shoppingList'] = [];
      $dat['list_id'] = Str::random(40);
      $dat['list_name'] = $request->new_item;
      $dat['list_items'] = [];
      array_push($inputData['shoppingList'], $dat);
      array_push($slData, $inputData);
      Storage::disk('public')->put('shopping_data.json', json_encode($slData));
    }
  }

  public function li(Request $request)
  {
    $uid = Auth::id();
    $slData = Storage::disk('public')->exists('shopping_data.json') ? json_decode(Storage::disk('public')->get('shopping_data.json'), true) : [];
    $newArr = [];
    $newShop = [];
    $bol = false;
    foreach($slData as $item) {
      if ($item['user_id'] == $uid) {
        $bol = true;
        foreach($item['shoppingList'] as $sl) {
          $item['shoppingList'] = [];
          if ($sl['list_id'] == $request->hid) {
            foreach ($request->hi as $key => $val) {
              $sl['list_items'] = [];
              $nli[$val] = false;
              array_push($sl['list_items'], $nli);
            }
            array_push($newShop, $sl);
          } else {
            array_push($newShop, $sl);
          }
          $item['shoppingList'] = $newShop;
        }
      }
      array_push($newArr, $item);
    }

    if($bol == true){
      Storage::disk('public')->put('shopping_data.json', json_encode($newArr));
    }

  }

  public function del(Request $request)
  {
    $uid = Auth::id();
    $slData = Storage::disk('public')->exists('shopping_data.json') ? json_decode(Storage::disk('public')->get('shopping_data.json'), true) : [];
    $newArr = [];
    $newShop = [];
    $bol = false;
    foreach($slData as $item) {
      if ($item['user_id'] == $uid) {
        $bol = true;
        foreach($item['shoppingList'] as $sl) {
          $item['shoppingList'] = [];
          if ($sl['list_id'] != request()->segment(3)) {
            array_push($newShop, $sl);
          }
          $item['shoppingList'] = $newShop;
        }
      }
      array_push($newArr, $item);
    }

    if($bol == true){
      Storage::disk('public')->put('shopping_data.json', json_encode($newArr));
    }
    return redirect()->back();
  }

  public function fA(Request $request) {
    if ($request->has('cnl')) {
        $this->newList($request);
        return redirect()->back();
    } else if ($request->has('sub')){
        $this->li($request);
        return redirect()->back();
    }
  }

}
