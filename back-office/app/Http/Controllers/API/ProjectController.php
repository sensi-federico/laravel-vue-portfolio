<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();

        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }

    public function skill()
    {
        return response()->json([
            'success' => true,
            'results' => Technology::all()
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('technologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Project not found'
            ]);
        }
    }
}
