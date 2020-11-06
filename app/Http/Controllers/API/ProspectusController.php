<?php

namespace App\Http\Controllers\API;

use App\Models\Prospectus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProspectusResource;
use App\Http\Requests\StoreProspectusRequest;
use App\Http\Requests\UpdateProspectusRequest;

class ProspectusController extends Controller
{
    public function index()
    {
        $prospectuses = Prospectus::with(['track', 'subject'])->latest()->paginate(10);
        return ProspectusResource::collection($prospectuses);
    }

    public function store(StoreProspectusRequest $request)
    {
        Prospectus::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Prospectus successfully created!'
        ], 201);
    }

    public function show(Prospectus $prospectus)
    {
        return new ProspectusResource($prospectus->load(['track', 'subject']));
    }

    public function update(UpdateProspectusRequest $request, Prospectus $prospectus)
    {
        $prospectus->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Prospectus successfully updated!'
        ]);
    }

    public function destroy(Prospectus $prospectus)
    {
        if ($prospectus->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Prospectus successfully deleted!'
            ]);
        }
    }
}
