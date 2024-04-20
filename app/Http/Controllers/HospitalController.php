<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospital', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createHospital');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        Hospital::create($data);

        return redirect()->route('hospital');

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
        $data = Hospital::find($id);
        return view('updateHospital', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        Hospital::whereId($id)->update($data);

        return redirect()->route('hospital');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Hospital::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hospital Data has been Deleted',
        ]);
    }
}
