<?php

namespace App\Http\Controllers;

use App\Property;
use App\User;
use App\Detail;
use DB;
use Auth;
use Image;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('user_id', Auth::id())->get();
        return view('property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'description' => 'required',
            'address' => 'optional',
            'price' => 'required'
        ]);

        if(Auth::check() && $request->hasFile('pic')){

            $picture = $request->file('pic');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(1000, 636)->save(public_path('/uploads/properties/' . $filename));

            $property = Property::create([
                'picture' => $filename,
                'description' => $request->input('description'),
                'address' => $request->input('address_address'),
                'price' => $request->input('price'),
                'status' => "Available",
                'lng' => $request->input('address_longitude'),
                'lat' => $request->input('address_latitude'),
                'user_id' => Auth::id()
            ]);

            if($property){
                return redirect()->route('properties.index')->with('success','New Properties Successfuly Added');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $property= Property::find($property->id);
        return view('property.detail',compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $property = Property::find($property->id);
        return view('property.edit', ['property'=>$property]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $prop)
    {
        $id = Auth::id();
        $properties = Property::find($prop);

        if($request->hasFile('pic')){
            $picture = $request->file('pic');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(570, 270)->save(public_path('/uploads/properties/' . $filename));
            if(Auth::check()){
                $properties->picture = $filename;
                $properties->description = $request->input('description');
                $properties->address = $request->input('address_address');
                $properties->price = $request->input('price');
                $properties->status = $request->input('status');
                $properties->save();
            }
            if($properties){
                return  redirect()->route('properties.index')->with('success',' Properties successfuly altered');
            }
        }else{
            if(Auth::check()){
                $properties->description = $request->input('description');
                $properties->address = $request->input('address_address');
                $properties->price = $request->input('price');
                $properties->status = $request->input('status');
                $properties->save();
            }
            if($properties){
                return  redirect()->route('properties.index')->with('success',' Properties successfuly altered');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $findproperty = Property::find( $property->id );
        $findDetail = Detail::find( $property->detail_id );
        $role = Auth::user()->is_admin;

        if($findproperty->delete() && $findDetail->delete() && $role == 'user'){
            return redirect()->route('properties.index')->with('success', 'Property deleted Successfully');
        }else{
            return redirect()->route('users.index')->with('success', 'Property deleted Successfully');
        }
        
        return back()->withInput()->with('errors', 'Property could not be deleted');
    }

    public function listhouse()
    {
        $id = Auth::id();
        $user = User::select('is_admin')->where('id', $id)->get();

        $properties = DB::table('properties')
                    ->join('users', 'users.id', '=', 'properties.user_id')
                    ->join('details', 'details.id', '=', 'properties.detail_id')
                    ->select('name', 'price', 'address', 'properties.picture','status', 'properties.id', 'bedroom', 'area', 'bathroom')
                    ->get();
        return view('listhouse', compact('properties', 'user'));
    }

    public function singlehouse($idProp)
    {
        $id = Auth::id();
        $user = User::select('is_admin')->where('id', $id)->get();

        $properties = DB::table('details')
                    ->join('properties', 'details.id', '=', 'properties.detail_id')
                    ->join('users', 'properties.user_id', '=', 'users.id')
                    ->select('properties.picture', 'name', 'price', 'type', 'bedroom', 'bathroom', 'area', 'address', 'description', 'email', 'phone_no', 'users.picture as userPic', 'lat', 'lng', 'address')
                    ->where('properties.id', $idProp)
                    ->get();

        return view('singlehouse', compact('user', 'properties'));
    }

    public function welcomeHouse()
    {
        $id = Auth::id();
        $user = User::select('is_admin')->where('id', $id)->get();

        $properties = DB::table('properties')
                    ->join('users', 'users.id', '=', 'properties.user_id')
                    ->join('details', 'properties.detail_id', '=', 'details.id')
                    ->select('name', 'price', 'address', 'properties.picture','status', 'properties.id', 'bedroom', 'bathroom', 'area')
                    ->take(3)
                    ->get();

        return view('welcome', compact('user', 'properties'));
    }

    public function showFull($idP)
    {
        $properties = DB::table('properties')
                    ->join('details', 'details.id', '=', 'properties.detail_id')
                    ->select('properties.picture', 'price', 'type', 'bedroom', 'bathroom', 'area', 'address', 'description', 'lat', 'lng', 'address','status','facility')
                    ->where('details.id', $idP)
                    ->get();
        return view('property.detail',compact('properties'));
    }

    public function search(Request $request)
    {
        $id = Auth::id();
        $user = User::select('is_admin')->where('id', $id)->get();
        
        $search = $request->get('search');
        $properties = DB::table('properties')
                    ->join('users', 'users.id', '=', 'properties.user_id')
                    ->join('details', 'details.id', '=', 'properties.detail_id')
                    ->select('name', 'price', 'address', 'properties.picture','status', 'properties.id', 'bedroom', 'area', 'bathroom')
                    -> where('address','LIKE' ,'%'. $search .'%')->get();
        return view('listhouse', compact('user', 'properties'));        
    }
}
