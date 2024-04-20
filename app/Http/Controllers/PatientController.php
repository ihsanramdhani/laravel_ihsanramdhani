<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::all();
        $patients = Patient::all();
        return view('patient', compact('patients', 'hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createPatient');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['hospital_id'] = $request->hospital_id;

        Patient::create($data);

        return redirect()->route('patient');
    }

    /**
     * Display the specified resource.
     */
    public function filterPatients(Request $request)
    {
        $hospitals = Hospital::get();
        $patients = Patient::query();

        $hospital_id = $request->input('hospital_id');

        if ($hospital_id) {
            $patients->where('hospital_id', $hospital_id);
        }
        $patients = $patients->get();

        return response()->json([
            'patients' => $patients,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Patient::find($id);
        return view('updatePatient', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['hospital_id'] = $request->hospital_id;

        Patient::whereId($id)->update($data);

        return redirect()->route('patient');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { {
            Patient::find($id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Patient Data has been Deleted',
            ]);
        }
    }
}
