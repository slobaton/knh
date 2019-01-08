<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Project;
use App\Partner;

class ProjectController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:project-list');
        $this->middleware('permission:project-create', ['only' => ['create','store']]);
        $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:project-delete', ['only' => ['destroy']]);
        $this->middleware('permission:project-show', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Partner::all('id', 'partner_name')
            ->pluck('partner_name', 'id');

        return view('projects.create', compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateFields($request);

        Project::create($request->all());

        return redirect()->route('projects.index')
            ->with('success','Proyecto creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partners = Partner::all('id', 'partner_name')
            ->pluck('partner_name', 'id');
        $project = Project::FindOrFail($id);
        return view(
            'projects.edit',
            [ 'project' => $project, 'partners' => $partners ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $this->validateFields($request);
        $project->update($request->all());
        return redirect()->back()
            ->with('success','Proyecto actualizado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->back()
            ->with('success','Proyecto eliminado exitosamente');
    }

    // datatables functions
    public function getProjects()
    {
        return Datatables::of(Project::query())
            ->addIndexColumn()
            ->addColumn('action', function($project) {
                return view(
                    'projects.partials.actions', compact('project')
                );
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    private function validateFields($request)
    {
        $this->validate($request, [
            'project_code' => 'required|numeric|max:999999',
            'project_name' => 'required|string',
            'coordinator_name' => 'required|string',
            'coordinator_phone' => 'required|numeric|max:99999999',
            'coordinator_cellphone' => 'numeric|max:99999999',
            'coordinator_email' => 'required|email',
            'location' => 'string',
            'city' => 'required|string',
            'description' => 'nullable|string',
            'additional_coordinator_info' => 'nullable|string|max:350',
            'partner_id' => 'required|numeric'
        ]);
    }
}
