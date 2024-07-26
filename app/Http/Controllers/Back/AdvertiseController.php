<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdvertiseRequest;
use App\Http\Requests;
use App\Http\Requests\UpdateimgRequest;
use App\Models\Advertise;
use Illuminate\Support\Facades\Storage;


class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.ads.index', [
            'advertises' => Advertise::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdvertiseRequest $request)
    {
        
        $data = $request -> validated();
        $file = $request -> file('img'); //foto
        $filename = uniqid().'.'.$file->getClientOriginalExtension(); //ekstensi png, jpeg dll
        $file -> storeAs('public/back', $filename); //public/back/contoh.jpeg

        $data['img'] = $filename;
        Advertise::create($data);
        return redirect(url('advertise'))->with('success', 'Data ads has been created'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateimgRequest $request, string $id)
    {
        $data = $request -> validated();
        if ($request->hasFile('img')) {
            $file = $request -> file('img'); //foto
            $filename = uniqid().'.'.$file->getClientOriginalExtension(); //ekstensi png, jpeg dll
            $file -> storeAs('public/back/', $filename);

            //unlink img / delete img
            Storage::delete('public/back/images'.$request->oldImg);

            $data['img'] = $filename;
        }else {
            $data['img'] = $request->oldImg;
        }
        
        Advertise::find($id)->update($data);
        return redirect(url('advertise'))->with('success', 'Data Advertise has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Advertise::find($id);
        Storage::delete('public/back/images/'.$data->img);
        $data->delete();
        return back()->with('success', 'Advertises has been delete');
    }
}
