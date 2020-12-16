<?php

namespace App\Http\Controllers\API;

use App\Models\Track;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrackResource;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Http\Requests\StoreTrackSubjectRequest;

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

    public function addSubjectOfferings(StoreTrackSubjectRequest $request, Track $track)
    {
        $subjects = [];
        foreach ($request->subjects as $subject) {
            $subjects[$subject] = ['sem_to_offer' => $request->sem_to_offer];
        }

        $track->subjects()->sync($subjects);
        return response()->json([
            'success' => true,
            'message' => 'Subject offerings added!'
        ]);
    }

    public function search(Request $request)
    {
        $tracks = Track::where('name', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('description', 'LIKE', '%'.$request->input('query').'%')
            ->orWhere('grade_level', 'LIKE', '%'.$request->input('query').'%')
            ->paginate(10);

        return TrackResource::collection($tracks);
    }

    public function getTracksNoPagination()
    {
        return TrackResource::collection(Track::all());
    }

    public function getSubjectOfferings()
    {
        $subjectOfferings = Track::with('subjects')
            ->orderBy('grade_level')
            ->get();
            
        return TrackResource::collection($subjectOfferings);
    }
}
