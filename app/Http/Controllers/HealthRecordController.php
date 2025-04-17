<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    public function update(Request $request, $id)
    {
        $record = HealthRecord::findOrFail($id);
        $record->description = $request->description;
        $record->save();

        return response()->json($record, 200);
    }
}
