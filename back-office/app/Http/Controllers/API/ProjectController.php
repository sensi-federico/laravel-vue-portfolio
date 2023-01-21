<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'results' => Project::with(['technologies'])->orderByDesc('id')
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
