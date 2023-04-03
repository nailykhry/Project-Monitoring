<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Image;

class ProjectController extends Controller
{
    public function index()
    {
       $projects = Project::all();
        return view('index', [
            'projects' => Project::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_name' => 'required',
            'client' => 'required',
            'pl_name' => 'required',
            'pl_email' => 'required',
            'pl_image' => 'image|file',
            'start' => 'required',
            'end' => 'required',
            'progress' => 'required',
        ]);

        if($request->file('pl_image'))
        {
            $validatedData['pl_image'] = $request->file('pl_image')->store('img');
        }

        

        if($validatedData)
        {
            $project = new Project;
            $project->pl_image = $validatedData['pl_image'];
            $project->project_name = $validatedData['project_name'];
            $project->client = $validatedData['client'];
            $project->pl_name = $validatedData['pl_name'];
            $project->pl_email = $validatedData['pl_email'];
            $project->start = $validatedData['start'];
            $project->end = $validatedData['end'];
            $project->progress = $validatedData['progress'];
            $project->save();
            return redirect('/');
        }else{
            dd('Validasi data gagal');
        }
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('edit', [
            'project' => $project,
        ]);
    }



    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'project_name' => 'required',
            'client' => 'required',
            'pl_name' => 'required',
            'pl_email' => 'required',
            'pl_image' => 'image|file',
            'start' => 'required',
            'end' => 'required',
            'progress' => 'required',
        ]);

        if($request->file('pl_image'))
        {
            $validatedData['pl_image'] = $request->file('pl_image')->store('img');
        }

        if($validatedData)
        {
            $project = Project::findOrFail($id);
            $project->pl_image = $validatedData['pl_image'];
            $project->project_name = $validatedData['project_name'];
            $project->client = $validatedData['client'];
            $project->pl_name = $validatedData['pl_name'];
            $project->pl_email = $validatedData['pl_email'];
            $project->start = $validatedData['start'];
            $project->end = $validatedData['end'];
            $project->progress = $validatedData['progress'];
            $project->update();
            return redirect('/');
        }else{
            dd('Validasi data gagal');
        }
    }



    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('/');
    }
        
}
