<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\Manufacturer;
use App\Models\Status;
use Illuminate\Http\Request;

class AircraftController extends Controller
{
    public function index()
    {
        $aircrafts = Aircraft::with(['manufacturer', 'status'])->orderBy('created_at', 'desc')->paginate(10);

        return view('aircraft.index', ['aircrafts' => $aircrafts]);
    }

    public function create()
    {
        $statuses = Status::all();
        $manufacturers = Manufacturer::all();
        return view('aircraft.create', ['statuses' => $statuses, 'manufacturers' => $manufacturers]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'model' => 'required|string|max:255',
            'date_of_manufacture' => 'required|date',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'status_id' => 'required|exists:statuses,id'
        ]);

        Aircraft::create($validatedData);

        return redirect()->route('aircraft.index')->with('success', 'Aircraft created successfully');
    }

    public function destroy(Aircraft $aircraft)
    {
        // $aircraft = Aircraft::findOrFail($id);
        $aircraft->delete();
        return redirect()->route('aircraft.index')->with('success', 'Aircraft deleted successfully');
    }

    public function edit(Aircraft $aircraft)
    {
        $statuses = Status::all();
        $manufacturers = Manufacturer::all();

        return view('aircraft.edit', ['aircraft' => $aircraft, 'manufacturers' => $manufacturers, 'statuses' => $statuses]);
    }

    public function update(Request $request, Aircraft $aircraft)
    {
        $validatedData = $request->validate([
            'model' => 'required|string|max:255',
            'date_of_manufacture' => 'required|date',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'status_id' => 'required|exists:statuses,id',
        ]);

        $aircraft->update($validatedData);
        return redirect()->route('aircraft.index')->with('success', 'Aircraft updated successfully');
    }
}
