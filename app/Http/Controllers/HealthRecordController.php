<?php

namespace App\Http\Controllers;

use App\Models\HealthRecord;
use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    public function update(Request $request, $id)
    {
        $record = HealthRecord::findOrFail($id);
        $record->update($request->all());

        return response()->json($record, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'record_date' => 'required|date',
            'vaccination_date' => 'required|date',
            'id_pet' => 'required|exists:pets,id',
        ]);

        $healthRecord = HealthRecord::create($validatedData);

        return response()->json($healthRecord, 201);
    }
}
