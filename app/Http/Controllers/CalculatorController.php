<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use App\Models\Services\CalculatorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CalculatorController extends Controller
{
    //
    protected CalculatorService $calculatorService;

    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function getHistory(Request $request)
    {
        if ($request->ajax()) {
            $data = Calculation::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function showHistory() {
        return view('calculatorhistory');
    }

    public function calculateApi(Request $request)
    {

        $validator = Validator::make($request->all(), [
//            'result' => 'required|string',
//            'expression' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            // Handle the failed validation. For example, return back with errors.
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $expression = $request->input('expression');
        preg_match('/(-?\d*\.?\d+)([+\-*\/])(-?\d*\.?\d+)/', $expression, $matches);
        if (count($matches) < 4) {
            return response()->json(['error' => 'Invalid expression'], 400);
        }

        $firstNumber = $matches[1];
        $operator = $matches[2];
        $secondNumber = $matches[3];
        try {
            $result = $this->calculatorService->calculate($operator, [$firstNumber, $secondNumber]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error in calculation: ' . $e->getMessage()], 500);
        }

        Calculation::create([
            'expression' => $expression,
            'result' => $result
        ]);
        return response()->json(['result' => $result]);
    }
    public function calculate(Request $request)
    {

        $validator = Validator::make($request->all(), [
//            'expression' => 'required|string',
//            'expression' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            // Handle the failed validation. For example, return back with errors.
            return back()->withErrors($validator)->withInput();
        }
        $result = $request->input('result');
        $expression = $request->input('expression');

        Calculation::create([
            'expression' => $expression,
            'result' => $result
        ]);

//        $result=$request->input('hiddenExpression') .'tet' . $request->input('result');
        return view('dashboard', compact('result'));
    }
}
