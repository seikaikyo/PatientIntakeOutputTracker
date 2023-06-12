<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\PatientRecord;

class PatientRecordApiController extends Controller
{
    public function index()
    {
        $inputRecords = PatientRecord::where('type', '攝入')->orderBy('dateTime', 'desc')->get();
        $outputRecords = PatientRecord::where('type', '排出')->orderBy('dateTime', 'desc')->get();
        $totalInputSum = PatientRecord::where('type', '攝入')->sum('unit');
        $totalOutputSum = PatientRecord::where('type', '排出')->sum('unit');

        $dateLabels = PatientRecord::orderBy('dateTime', 'desc')->pluck('dateTime')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        })->all();

        $totalInput = PatientRecord::where('type', '攝入')
            ->selectRaw('date(dateTime) as date, sum(unit) as total')
            ->groupBy('date')
            ->pluck('total', 'date')
            ->all();

        $totalOutput = PatientRecord::where('type', '排出')
            ->selectRaw('date(dateTime) as date, sum(unit) as total')
            ->groupBy('date')
            ->pluck('total', 'date')
            ->all();

        $totalInputSum = array_sum($totalInput);
        $totalOutputSum = array_sum($totalOutput);

        return response()->json([
            'inputRecords' => $inputRecords,
            'outputRecords' => $outputRecords,
            'totalInput' => $totalInputSum,
            'totalOutput' => $totalOutputSum,
            'dateLabels' => $dateLabels,
            'totalInputChart' => $totalInput,
            'totalOutputChart' => $totalOutput,
            'totalInputSum' => $totalInputSum,
            'totalOutputSum' => $totalOutputSum
        ]);
    }

    public function store(Request $request)
    {
        $patientRecord = new PatientRecord;

        // 資料填充到 $patientRecord 中
        $patientRecord->dateTime = $request->dateTime;
        $patientRecord->type = $request->type;
        $patientRecord->content = $request->content;
        $patientRecord->unit = $request->unit;

        if ($patientRecord->save()) {
            Log::info('Record saved successfully');
            return response()->json($patientRecord, 201);
        } else {
            Log::error('Failed to save record');
            return response()->json(['error' => 'Failed to save record'], 500);
        }
    }

    public function destroy($id)
    {
        $record = PatientRecord::findOrFail($id);
        $record->delete();
        Log::info('Record deleted successfully');
        return response()->json(['message' => 'Record deleted successfully']);
    }

    public function deleteAll()
    {
        PatientRecord::truncate();
        Log::info('All records deleted');
        return response()->json(['message' => 'All records deleted']);
    }
}
