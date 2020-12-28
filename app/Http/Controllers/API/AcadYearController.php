<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AcadYear;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAcadYearRequest;
use App\Http\Requests\UpdateAcadYearRequest;
use App\Http\Resources\AcadYearResource;

class AcadYearController extends Controller
{    
    public function index()
    {
        $acadYears = AcadYear::latest()->paginate(10);
        return AcadYearResource::collection($acadYears);
    }

    public function store(StoreAcadYearRequest $request)
    {
        AcadYear::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Academic Year Successfully Created',
        ], 201);
    }

    public function show(AcadYear $acadYear)
    {
        return new AcadYearResource($acadYear);
    }

    public function update(UpdateAcadYearRequest $request, AcadYear $acadYear)
    {
        $acadYear->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Academic Year Successfully Updated',
        ]);
    }

    public function destroy(AcadYear $acadYear)
    {
        if($acadYear->delete())
        {
            return response()->json([
                'success' => true,
                'message' => 'Academic Year Successfully Deleted',
            ]);
        }
    }

    public function search(Request $request) 
    {
        $acadYears = AcadYear::where('start', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('end', 'LIKE', '%'.$request->input('query').'%')
            ->get();

        return AcadYearResource::collection($acadYears);
    }

    public function getAllAcadYears()
    {
        $acadYears = AcadYear::latest()->get();
        return AcadYearResource::collection($acadYears);
    }
}
