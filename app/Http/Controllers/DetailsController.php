<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Property;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {

        $details = Detail::where('property_id', $property->id);
        return view('detail.index', compact('details'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Detail $detail)
    {
         $request->validate
        ([
            'area' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
            'facility' => 'required',
            'type' => 'required'
        ]);

        $detail = Detail::create([
            'area' => $request->input('area'),
            'bedroom' => $request->input('bedroom'),
            'bathroom' => $request->input('bathroom'),
            'facility' => $request->input('facility'),
            'type' => $request->input('type'),
        ]);
        
        $id = $request->input('property_id');
        $property = Property::find($id);
        
        $idDetail = $detail->id;

        $property->detail_id = $idDetail;
        $property->save();


        return redirect()->route('properties.index')->with('success','New Detail Property Successfuly Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        $detail = Detail::find($detail->id);
        
        return view('detail.edit', ['detail'=>$detail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        $detailUpdate = Detail::where('id', $detail->id)->update([
            'type' => $request->input('type'),
            'area' => $request->input('area'),
            'bedroom' => $request->input('bedroom'),
            'bathroom' => $request->input('bathroom'),
            'facility' => $request->input('facility'),
        ]);

        if($detailUpdate){
            return redirect()->route('property.index')->with('success', 'Detail Property Updated Successfully');
        }else{
            return redirect()->route('property.index')->with('errors', 'Detail Property Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }

    public function createDetail($id)
    {
        return view('detail.create', compact('id'));
    }
}
