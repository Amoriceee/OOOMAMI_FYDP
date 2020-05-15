<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updatePassword(Request $request){
        $validatedData = $request->validate([
            'oldp' => 'required',
            'newp' => 'required|string|min:6|confirmed',
        ],
        [
          'oldp.required' => 'Please enter your current password!',
          'newp.required' => 'Please enter a new password!',
          'newp.min' => 'New password must contian a minimum of 6 characters!',
          'newp.confirmed' => 'Please ensure new password fields match!',
        ]);
        if (!(Hash::check($request->get('oldp'), Auth::user()->password))) {
            // The passwords not matches
            return redirect()->back()->withErrors(['Your current password does not match our records! Please try again.']);
        }
        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('newp'));
        $user->save();
        return redirect()->back();
    }

    public function updateDisplay(Request $request){
        $validatedData = $request->validate([
            'profile-image' => 'required|image',
        ],
        [
          'profile-image.required' => 'Please attach a new profile picture!',
          'profile-image.image' => 'Attachment must be an image!',
        ]);
        //update display
        $user = Auth::user();
        $file = $request->file('profile-image');
        $path = Storage::disk('public')->put("/dp", $file);
        $user->dp_path = "../uploads/" . $path;
        $user->save();
    }

    public function resetDisplay(){
      $user = Auth::user();
      $user->dp_path = "../uploads/dp/default.png";
      $user->save();
      return redirect()->back();
    }

    public function updateIntolerances(Request $request)
    {

      $uid = Auth::id();
      $intData = Storage::disk('public')->exists('int_data.json') ? json_decode(Storage::disk('public')->get('int_data.json'), true) : [];
      $newArr = [];
      $bol = false;
      foreach($intData as $item) {
        if($item['user_id'] == $uid) {
          $bol = true;
          $request->has('Dairy') ? $item['Dairy'] = 'true' : $item['Dairy'] = 'false';
          $request->has('Egg') ? $item['Egg'] = 'true' : $item['Egg'] = 'false';
          $request->has('Gluten') ? $inputData['Gluten'] = 'true' : $inputData['Gluten'] = 'false';
          $request->has('Grain') ? $item['Grain'] = 'true' : $item['Grain'] = 'false';
          $request->has('Peanut') ? $item['Peanut'] = 'true' : $item['Peanut'] = 'false';
          $request->has('Seafood') ? $item['Seafood'] = 'true' : $item['Seafood'] = 'false';
          $request->has('Sesame') ? $item['Sesame'] = 'true' : $item['Sesame'] = 'false';
          $request->has('Shellfish') ? $item['Shellfish'] = 'true' : $item['Shellfish'] = 'false';
          $request->has('Soy') ? $item['Soy'] = 'true' : $item['Soy'] = 'false';
          $request->has('Sulfite') ? $item['Sulfite'] = 'true' : $item['Sulfite'] = 'false';
          $request->has('Tree_Nut') ? $item['Tree'] = 'true' : $item['Tree'] = 'false';
          $request->has('Wheat') ? $item['Wheat'] = 'true' : $item['Wheat'] = 'false';
        }
        array_push($newArr, $item);
      }

      if($bol == true){
        Storage::disk('public')->put('int_data.json', json_encode($newArr));
      } else {
        if (Auth::check()){
          $inputData["user_id"] = Auth::id();
          $inputData["user_name"] = Auth::user()->name;
          $request->has('Dairy') ? $inputData['Dairy'] = 'true' : $inputData['Dairy'] = 'false';
          $request->has('Egg') ? $inputData['Egg'] = 'true' : $inputData['Egg'] = 'false';
          $request->has('Gluten') ? $inputData['Gluten'] = 'true' : $inputData['Gluten'] = 'false';
          $request->has('Grain') ? $inputData['Grain'] = 'true' : $inputData['Grain'] = 'false';
          $request->has('Peanut') ? $inputData['Peanut'] = 'true' : $inputData['Peanut'] = 'false';
          $request->has('Seafood') ? $inputData['Seafood'] = 'true' : $inputData['Seafood'] = 'false';
          $request->has('Sesame') ? $inputData['Sesame'] = 'true' : $inputData['Sesame'] = 'false';
          $request->has('Shellfish') ? $inputData['Shellfish'] = 'true' : $inputData['Shellfish'] = 'false';
          $request->has('Soy') ? $inputData['Soy'] = 'true' : $inputData['Soy'] = 'false';
          $request->has('Sulfite') ? $inputData['Sulfite'] = 'true' : $inputData['Sulfite'] = 'false';
          $request->has('Tree_Nut') ? $inputData['Tree'] = 'true' : $inputData['Tree'] = 'false';
          $request->has('Wheat') ? $inputData['Wheat'] = 'true' : $inputData['Wheat'] = 'false';
        }
        array_push($intData, $inputData);
        Storage::disk('public')->put('int_data.json', json_encode($intData));
      }
    }

    public function updateDiets(Request $request)
    {

      $uid = Auth::id();
      $dieData = Storage::disk('public')->exists('die_data.json') ? json_decode(Storage::disk('public')->get('die_data.json'), true) : [];
      $newArr = [];
      $bol = false;
      foreach($dieData as $item) {
        if($item['user_id'] == $uid) {
          $bol = true;
          $request->has('Gluten_Free') ? $item['Gluten'] = 'true' : $item['Gluten'] = 'false';
          $request->has('Ketogenic') ? $item['Ketogenic'] = 'true' : $item['Ketogenic'] = 'false';
          $request->has('Vegetarian') ? $item['Vegetarian'] = 'true' : $item['Vegetarian'] = 'false';
          $request->has('Lacto-Vegetarian') ? $item['Lacto'] = 'true' : $item['Lacto'] = 'false';
          $request->has('Ovo-Vegetarian') ? $item['Ovo'] = 'true' : $item['Ovo'] = 'false';
          $request->has('Vegan') ? $item['Vegan'] = 'true' : $item['Vegan'] = 'false';
          $request->has('Pescetarian') ? $item['Pescetarian'] = 'true' : $item['Pescetarian'] = 'false';
          $request->has('Paleo') ? $item['Paleo'] = 'true' : $item['Paleo'] = 'false';
          $request->has('Primal') ? $item['Primal'] = 'true' : $item['Primal'] = 'false';
          $request->has('Whole30') ? $item['Whole30'] = 'true' : $item['Whole30'] = 'false';
        }
        array_push($newArr, $item);
      }

      if($bol == true){
        Storage::disk('public')->put('die_data.json', json_encode($newArr));
      } else {
        if (Auth::check()){
          $inputData["user_id"] = Auth::id();
          $inputData["user_name"] = Auth::user()->name;
          $request->has('Gluten_Free') ? $inputData['Gluten'] = 'true' : $inputData['Gluten'] = 'false';
          $request->has('Ketogenic') ? $inputData['Ketogenic'] = 'true' : $inputData['Ketogenic'] = 'false';
          $request->has('Vegetarian') ? $inputData['Vegetarian'] = 'true' : $inputData['Vegetarian'] = 'false';
          $request->has('Lacto-Vegetarian') ? $inputData['Lacto'] = 'true' : $inputData['Lacto'] = 'false';
          $request->has('Ovo-Vegetarian') ? $inputData['Ovo'] = 'true' : $inputData['Ovo'] = 'false';
          $request->has('Vegan') ? $inputData['Vegan'] = 'true' : $inputData['Vegan'] = 'false';
          $request->has('Pescetarian') ? $inputData['Pescetarian'] = 'true' : $inputData['Pescetarian'] = 'false';
          $request->has('Paleo') ? $inputData['Paleo'] = 'true' : $inputData['Paleo'] = 'false';
          $request->has('Primal') ? $inputData['Primal'] = 'true' : $inputData['Primal'] = 'false';
          $request->has('Whole30') ? $inputData['Whole30'] = 'true' : $inputData['Whole30'] = 'false';
        }
        array_push($dieData, $inputData);
        Storage::disk('public')->put('die_data.json', json_encode($dieData));
      }
    }

    public function fA(Request $request) {
      if ($request->submit == "SET PROFILE PICTURE") {
          $this->updateDisplay($request);
          return redirect()->back();
      } elseif ($request->submit == "SET INTOLERANCE PREFERENCES") {
          $this->updateIntolerances($request);
          return redirect()->back();
      } elseif ($request->submit == "SET DIET PREFERENCES") {
          $this->updateDiets($request);
          return redirect()->back();
      } else {
          $this->updatePassword($request);
          return redirect()->back();
      }
    }
}
