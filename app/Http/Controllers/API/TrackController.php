<?php

namespace App\Http\Controllers\API;

use App\Models\Track;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrackResource;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::with(['sections'])->latest()->paginate(10);
        return TrackResource::collection($tracks);
    }

    public function store(StoreTrackRequest $request)
    {
        $track = $request->validated();
        Track::create($track);
        return response()->json([
            'success' => true,
            'message' => 'Track successfully created!'
        ], 201);
    }

    public function show(Track $track)
    {
        return new StudentResource($student->load(['sections']));
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
        $track->sections()->detach();
        if ($student->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Track successfully deleted!'
            ]); 
        }
    }

    public function addSection(StoreTrackSectionRequest $request, Track $track)
    {
        $data = $request->validated();
        unset($data['relationship']);
        $section = Section::updateOrCreate($data, $data);
        $section->students()->sync([
            $track->id => ['relationship' => $request->relationship]
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Section successfully added to the student!'
        ]); 
    }

    public function removeSection(Track $track, Section $section)
    {
        $query = $track->sections()
            ->wherePivot('section_id', $section->id)
            ->first();

        $track->sections()->detach($section);
        return response()->json([
            'success' => $query ? true: false,
            'message' => $query ? 'Section successfully removed from the track!'
                                : 'Section is not related to the track!'
        ], $query ? 200 : 404);
    }
}
