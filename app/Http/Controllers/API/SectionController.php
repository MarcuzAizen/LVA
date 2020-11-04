<?php

namespace App\Http\Controllers\API;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with('tracks')->latest()->paginate(10);
        return SectionResource::collection($sections);
    }

    public function store(StoreSectionRequest $request)
    {
        Section::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Section successfully created!'
        ], 201);
    }

    public function show(Section $section)
    {
        return new SectionResource($section->load('tracks'));
    }

    public function update(UpdateSectionRequest $request, Section $section)
    {
        $section->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Section successfully updated!'
        ]);
    }

    public function destroy(Section $section)
    {
        $section->tracks()->detach();
        if ($section->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Section successfully deleted!'
            ]);
        }
    }
}
