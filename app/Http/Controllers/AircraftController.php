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
            'tail_number' => 'required|string|max:255|unique:aircraft,tail_number|regex:/^[A-Z]{1,2}-?[A-Z0-9]{3,5}$/',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'model' => 'required|string|max:255',
            'year_of_manufacture' => 'required|digits:4|integer|min:1900|max:2025',
            'total_flight_hours' => 'required|numeric',
            'total_landings' => 'required|numeric',
            'last_maintenance_date' => 'nullable|date',
            'next_maintenance_due' => 'nullable|date',
            'status_id' => 'required|exists:statuses,id',
        ], ['tail_number.regex' => 'The tail number format is invalid. It must start with 1 to 2 uppercase letters, optionally followed by a dash, and then 3 to 5 alphanumeric characters. Example: IT-0001A', 'manufacturer_id.required' => 'The manufacturer is required.', 'status_id.required' => 'The status is required.']);

        Aircraft::create($validatedData);

        return redirect()->route('aircraft.index')->with('success', 'Aircraft created successfully');
    }

    public function destroy(Aircraft $aircraft)
    {
        // $aircraft = Aircraft::findOrFail($id);
        $aircraft->delete();
        return redirect()->route('aircraft.index')->with('success', 'Aircraft deleted permanently');
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
            'tail_number' => 'required|string|max:255|regex:/^[A-Z]{1,2}-?[A-Z0-9]{3,5}$/',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'model' => 'required|string|max:255',
            'year_of_manufacture' => 'required|digits:4|integer|min:1900|max:2025',
            'total_flight_hours' => 'required|numeric',
            'total_landings' => 'required|numeric',
            'last_maintenance_date' => 'nullable|date',
            'next_maintenance_due' => 'nullable|date',
            'status_id' => 'required|exists:statuses,id',
        ], ['tail_number.regex' => 'The tail number format is invalid. It must start with 1 to 2 uppercase letters, optionally followed by a dash, and then 3 to 5 alphanumeric characters. Example: IT-0001A', 'manufacturer_id.required' => 'The manufacturer is required.']);

        $aircraft->update($validatedData);
        return redirect()->route('aircraft.index')->with('success', 'Aircraft updated successfully');
    }

    public function soft_delete(Aircraft $aircraft)
    {
        $aircraft->is_deleted = true;
        $aircraft->deleted_at = now();
        $aircraft->save();
        return redirect()->route('aircraft.index')->with('success', 'Aircraft deleted successfully');
    }

    public function restore(Aircraft $aircraft)
    {
        $aircraft->is_deleted = false;
        $aircraft->deleted_at = null;
        $aircraft->save();
        return redirect()->route('aircraft.index')->with('success', 'Aircraft restored successfully');
    }

    public function deleted()
    {
        $aircrafts = Aircraft::with(['manufacturer', 'status'])->orderBy('created_at', 'desc')->paginate(10);
        return view('aircraft.deleted', ['aircrafts' => $aircrafts]);
    }
}
