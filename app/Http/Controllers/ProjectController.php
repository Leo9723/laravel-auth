<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Validator;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $this->validation($request->all());



        $newProject = new Project();

        $newProject->fill($form_data);

        $newProject->save();

        return redirect()->route('admin.projects.index', $newProject->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        $project = Project::find($project);


        $data = [
            'single' => $project
        ];

        return view('admin.projects.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($project)
    {
        $project = Project::find($project);

        if($project){
            $data = [
                'project' => $project
            ];

            return view ('admin.projects.edit', $data);
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $project)
    {
        $project = Project::find($project);

        $form_data = $this->validation($request->all());

        $project->update($form_data);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        $project = Project::find($project);

        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    private function validation($data){

        $validator = Validator::make($data, [
            'title' => 'required|max:30',
            'description' => 'required|max:200',
        ],
        [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo è superiore a :max caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'description.max' => 'La descrizione superiore a :max caratteri',
        ]
        )->validate();

        return $validator;



    }


}
