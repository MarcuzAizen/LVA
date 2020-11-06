<?php

namespace App\Http\Controllers\API;

use App\Models\Track;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrackResource;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::latest()->paginate(10);
        return TrackResource::collection($tracks);
    }

    public function store(StoreTrackRequest $request)
    {
        Track::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Track successfully created!'
        ], 201);
    }

    public function show(Track $track)
    {
        return new TrackResource($track);
    }

    public function update(UpdateTrackRequest $request, Track $track)
    {
        $track->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Track successfully updated!'
        ]);
    }

    public function destroy(Track $track)
    {
        if ($track->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Track successfully deleted!'
            ]); 
        }
    }
}
