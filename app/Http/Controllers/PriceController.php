<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Price;
use App\Models\PriceCover;
use Illuminate\Support\Facades\Validator;

class PriceController extends Controller
{
    public function index(Request $request){   
            
        $prices_page = Price::all();

        $prices_cover = PriceCover::all();

        return view('prices', compact('prices_page', 'prices_cover'));
    }

    public function editPriceCover($id)
    {
        $price_cover = PriceCover::findOrFail($id);

        return view('price-cover', compact('price_cover'));
    }

    public function updatePriceCover(Request $request, $id)
    {
        $price_cover = PriceCover::findOrFail($id);
        
        //Validate user new data
        $validator = Validator::make($request->all(), [
            'format' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);


        if ($validator->fails()) {

            return redirect(url()->previous())
                        ->withErrors($validator)
                        ->withInput();
        } 

        

        $price_cover->update($request->all());

       // dd($user);

        return back()->with('status', 'Podaci su ažurirani uspešno.');
    }

    public function editPricePage($id)
    {
        $price_page = Price::findOrFail($id);

        return view('price-page', compact('price_page'));
    }

    public function updatePricePage(Request $request, $id)
    {
        $price_page = Price::findOrFail($id);
        
        //Validate user new data
        $validator = Validator::make($request->all(), [
            'format' => 'required',
            'price' => 'required',
        ]);


        if ($validator->fails()) {

            return redirect(url()->previous())
                        ->withErrors($validator)
                        ->withInput();
        } 

        

        $price_page->update($request->all());

       // dd($user);

        return back()->with('status', 'Podaci su ažurirani uspešno.');
    }
}
