<?php

namespace App\Http\Controllers;

use App\Restaurants;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Validation;
use Illuminate\Support\Facades\Storage;

class RestaurantsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurants::all();
        return $this->showAll($restaurants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['url_image'] = $request->file('url_image')->store('public/images');
        $restaurant = Restaurants::create($data);
        return $this->showOne($restaurant,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurants::findOrfail($id);
        return $this->showOne($restaurant);
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
        $restaurant = Restaurants::findOrfail($id);
        if($request->has('name')){
            $restaurant->name = $request->name;
        }
        if($request->has('description')){
            $restaurant->description = $request->description;
        }
        if($request->has('url_image')){
            Storage::delete($restaurant->url_image);
            $restaurant->url_image = $request->url_image->store('public/images');
        }

        if(!$restaurant->isDirty()){
            return $this->errorResponse('Se debe especificar un valor diferente en algun campo para actualizar',422);
        }

        $restaurant->save();
        return $this->showOne($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurants::findOrfail($id);
        $restaurant->delete();
        Storage::delete($restaurant->url_image);
        return $this->showOne($restaurant);
    }
}
