<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function getSettings(){   
            
        $sett = Settings::first();
        return view('settings', compact('sett'));
    }

    public function updateSettings(Request $request, $id){   
        $settings = Settings::findOrFail($id);//Get user with the given id
        
        //Validate user new data
        $validator = Validator::make($request->all(), [
            'company' => 'required',
            'account' => 'required'
        ]);


        if ($validator->fails()) {

            return redirect(url()->previous())
                        ->withErrors($validator)
                        ->withInput();
        } 

        

        $settings->update($request->all());

       // dd($user);

        return back()->with('status', 'Podaci su ažurirani uspešno.');
    }

}
