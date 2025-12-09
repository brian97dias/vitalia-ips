<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::orderBy('last_name')
                            ->orderBy('first_name')
                            ->paginate(10);
        
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_type' => 'required|in:CC,TI,RC,CE,PA,TE,PEP',
            /* validacion de tupla tipo y numero de identificacion */
            'id_number' => 'required|string|max:15|unique:patients,id_number,NULL,id,id_type,' . $request->id_type,
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'cellphone' => 'nullable|string|max:15',
            'eps' => 'nullable|string|max:50',
            'status' => 'required|in:active,inactive',
        ]);

        Patient::create($data);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Paciente creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate([
            'id_type' => 'required|in:CC,TI,RC,CE,PA,TE,PEP',
            /*  */
            'id_number' => 'required|string|max:15|unique:patients,id_number,' . $patient->id . ',id,id_type,' . $request->id_type,
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'cellphone' => 'nullable|string|max:15',
            'eps' => 'nullable|string|max:50',
            'status' => 'required|in:active,inactive',
        ]);

        $patient->update($data);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Paciente actualizado satisfacoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient-> update(['status' => 'inactive']);
        
        return redirect()
            ->route('patients.index')
            ->with('success', 'Paciente inactivado satisfactoriamente.');
    }
}
