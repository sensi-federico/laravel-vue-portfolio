<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $technologies = Technology::all();
        return view('admin.projects.create', compact('project', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {

        // dd($request->all());
        // validate all data 
        $val_data = $this->validation($request->all());

        // create the slug
        $project_slug = Str::slug($val_data['title']);
        $val_data['slug'] = $project_slug;

        // storage the image
        $image = Storage::disk('public')->put('placeholders', $request->image);
        $val_data['image'] = $image;

        // create new project
        $project = Project::create($val_data);

        // attach the selected technologies
        if ($request->has('technologies')) {
            $project->technologies()->attach($val_data['technologies']);
        }

        return to_route('admin.projects.index')->with('message', "$project->title added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProjectRequest $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {


        // validate the data updated
        $val_data = $this->validation($request->all());


        if ($request->hasFile('image')) {
            // check if the current project has an image if yes, delete it
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $image = Storage::disk('public')->put('placeholders', $val_data['image']);
            // replace the value of image inside $val_data
            $val_data['image'] = $image;
        }

        // create slug of a new title insert
        $project_slug = Str::slug($val_data['title']);
        $val_data['slug'] = $project_slug;

        // update the project
        $project->update($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($val_data['technologies']);
        } else {
            $project->technologies()->sync([]);
        }

        return to_route('admin.projects.index')->with('message', "$project->title added successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // delete the image if exists
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        // delete the project
        $project->delete();

        return to_route('admin.projects.index')->with('message', "$project->title deleted successfully");
    }


    // validation of the data
    private function validation($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|min:5|max:100',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'technologies' => 'nullable|exists:technologies,id'
        ])->validate();

        return $validator;
    }
}
