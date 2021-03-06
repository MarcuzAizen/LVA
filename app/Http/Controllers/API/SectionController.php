<?php

namespace App\Http\Controllers\API;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with('track')->latest()->paginate(10);
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
        return new SectionResource($section->load('track'));
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
        if ($section->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Section successfully deleted!'
            ]);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $sections = Section::where('name', 'LIKE', '%'.$query.'%')
            ->orWhereHas('track', function(Builder $builder) use ($query) {
                $builder->where('name', 'LIKE', '%'.$query.'%')
                    ->orWhere('name', 'LIKE', '%'.$query.'%');
            })
            ->with('track')
            ->paginate(10);
        
        return SectionResource::collection($sections);
    }

    public function getAllSections()
    {
        $sections = Section::with('track')->latest()->get();
        return SectionResource::collection($sections);
    }
}
