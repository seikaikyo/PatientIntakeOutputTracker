<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\PatientRecord;

class PatientRecordController extends Controller
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


        return view('welcome', ['inputRecords' => $inputRecords, 'outputRecords' => $outputRecords, 'totalInput' => $totalInputSum, 'totalOutput' => $totalOutputSum, 'dateLabels' => $dateLabels, 'totalInputChart' => $totalInput, 'totalOutputChart' => $totalOutput, 'totalInputSum' => $totalInputSum, 'totalOutputSum' => $totalOutputSum]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dateTime' => 'required|date_format:Y-m-d\TH:i',
            'type' => 'required|string',
            'content' => 'required|string',
            'unit' => 'required|string',
        ]);

        if ($validator->fails()) {
            Log::error('Validation error: ', $validator->errors()->toArray());  // 將 $validator->errors() 轉換成陣列
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        // 儲存到資料庫
        $patientRecord = new PatientRecord;
        $patientRecord->dateTime = \Carbon\Carbon::parse($validatedData['dateTime']);
        $patientRecord->type = $validatedData['type'];
        $patientRecord->content = $validatedData['content'];
        $patientRecord->unit = $validatedData['unit'];

        if ($patientRecord->save()) {
            Log::info('Record saved successfully');
        } else {
            Log::error('Failed to save record');
        }

        // Redirect to the form page
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $record = PatientRecord::findOrFail($id);
        $record->delete();
        Log::info('Record deleted successfully');
        return redirect()->route('index');
    }

    public function deleteAll()
    {
        PatientRecord::truncate();
        Log::info('All records deleted');
        return redirect()->route('index');
    }
}
