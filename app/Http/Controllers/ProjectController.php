<?php

namespace App\Http\Controllers;

use DB;
use App\Partner;
use App\Project;
use App\Document;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ProjectController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:project-list');
        $this->middleware('permission:project-create', ['only' => ['create','store']]);
        $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:project-delete', ['only' => ['destroy']]);
        $this->middleware('permission:project-upload', ['only' => ['uploadForm', 'upload']]);
        $this->middleware('permission:project-show', ['only' => ['show']]);
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
        $partner = Partner::findOrFail($project->partner_id);
        $documents = DB::table('documents')
            ->where('project_id', $id)
            ->get()
            ->groupBy('type');
        return view(
            'projects.show',
            compact('project', 'partner', 'documents')
        );
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

    public function getDocuments($projectId)
    {
        $documents = Document::where('project_id', $projectId);
        return Datatables::of($documents)
            ->addColumn('action', function($document) {
                return view(
                    'projects.partials.documents_actions',
                    compact('document')
                );
            })
            ->editColumn('files', function($document) {
                $files = json_decode($document->files);
                return view(
                    'projects.partials.files',
                    compact('files')
                );
            })
            ->editColumn('created_at', function($document) {
                return \Carbon\Carbon::parse($document->created_at, 'America/La_Paz')
                    ->format('d/m/y H:m:s');
            })
            ->editColumn('type', function($document) {
                return config('constants.documents_types.'.$document->type);
            })
            ->rawColumns(['action', 'files'])
            ->make(true);
    }

    public function getObservations($projectId)
    {
        $documents = Document::where('project_id', $projectId)
            ->where('type', '=', 'observations');
        return Datatables::of($documents)
            ->editColumn('files', function($document) {
                $files = json_decode($document->files);
                return view(
                    'projects.partials.files',
                    compact('files')
                );
            })
            ->editColumn('created_at', function($document) {
                return \Carbon\Carbon::parse($document->created_at, 'America/La_Paz')
                    ->format('d/m/y H:m:s');
            })
            ->editColumn('type', function($document) {
                return config('constants.documents_types.'.$document->type);
            })
            ->rawColumns(['files'])
            ->make(true);
    }

    public function uploadFile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'type' => 'required|string',
            'project_id' => 'required|string',
            'files' => 'required',
            'files.*' => 'file|mimes:pdf,doc,docx'
        ]);

        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $files = [];

            foreach ($request->file('files') as $file) {
                $name= Carbon::now().'-'.$file->getClientOriginalName();
                $fileName = $file->storeAs('public/documents', $name);
                array_push($files, $fileName);
            }

            $inputs['files'] = json_encode($files);

            Document::create($inputs);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            \Log::error('Error has ocurred (upload file) - '. $e->getMessage());
            return back()->withErrors([__('Error al guardar el archivo').$e->getMessage()]);
        }
        return back()->with('success','Archivo subido al servidor');
    }

    public function uploadForm($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.upload', compact('project'));
    }

    private function validateFields($request)
    {
        $this->validate($request, [
            'project_code' => 'required|numeric|max:999999',
            'project_name' => 'required|string',
            'coordinator_name' => 'required|string',
            'coordinator_phone' => 'nullable|numeric|max:99999999',
            'coordinator_cellphone' => 'required|numeric|max:99999999',
            'coordinator_email' => 'required|email',
            'location' => 'string',
            'city' => 'required|string',
            'description' => 'nullable|string',
            'additional_coordinator_info' => 'nullable|string|max:350',
            'partner_id' => 'required|numeric',
            'created_date' => 'required|string',
            'end_date' => 'required|string',
        ]);
    }
}
