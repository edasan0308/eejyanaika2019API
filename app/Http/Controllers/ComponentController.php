<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;
use App\Toilet;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Component::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(Component::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Choose a toilet close to the user
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chooseToilet(Request $request)
    {
        $lat = $request->input('lat');
        $long = $request->input('long');

        $toilets = Toilet::all();
        $near_toilet_id = 1000000;
        $min_dist = 1000000.0000;

        foreach($toilets as $toilet) {

            $array = $toilet->toArray();
            $dist = sqrt(pow(($lat - $array['lat']), 2) + pow(($long - $array['long']),2 ) );

            if ($min_dist > $dist) {
                $min_dist = $dist;
                $near_toilet_id = $array['id'];
            }

        }
        return response(Toilet::find($near_toilet_id));
    }

    /**
     * Choose a toilet close to the user
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComponent(Request $request)
    {
        $component = new Component();

        $component->title = $request->input('title');
        $component->place = $request->input('place');
        $component->charge = $request->input('charge');
        $component->lat = $request->input('lat');
        $component->long = $request->input('long');
        $component->tag = $request->input('tag');
        $component->info = $request->input('info');
        $component->start = $request->input('start');
        $component->end = $request->input('end');
        $component->url = "http://www.city.toyohashi.lg.jp/Images/logo.png";
        $component->save();

        return response(json_encode(['result'=>true]));
    }
}
