<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Partner;
use DB;

class PartnerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:partner-list');
        $this->middleware('permission:partner-create', ['only' => ['create','store']]);
        $this->middleware('permission:partner-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:partner-delete', ['only' => ['destroy']]);
        $this->middleware('permission:partner-show', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.create');
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
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $partner = Partner::create($inputs);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('Error has ocurred (store partner) - '. $e->getMessage());
            return back()->withErrors([__('Error al crear el socio').$e->getMessage()]);
        }
        return redirect()->route('partners.index')
            ->with('success','Socio creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $partner = Partner::findOrFail($id);
        } catch(\Exception $e) {
            Log::error('Error has ocurred (show partner) - '. $e->getMessage());
            return back()->with('error', __('Socio no encontrado'));
        }

        return view('partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $partner = Partner::findOrfail($id);
        } catch(\Exception $e) {
            Log::error('Error has ocurred (edit partner) - '. $e->getMessage());
            return back()->withErrors([__('Socio no encontrado')]);
        }

        return view('partners.edit', compact('partner'));
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
        $this->validateFields($request, $id);

        try {
            DB::beginTransaction();
            $partner = Partner::findOrFail($id);
            $inputs = $request->all();
            if($request->file('partner_photo')) {
                $imagen = $request->file('partner_photo')->store('public/partners');
                $inputs['partner_photo'] = $imagen;
            }

            $partner->update($inputs);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('Error has ocurred (store partner) - '. $e->getMessage());
            return back()->with('error', __('Error al crear el socio '));
        }
        return redirect()->back()
            ->with('success','Socio actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('partners')->where('id', $id)->delete();
        return redirect()->route('partners.index')
            ->with('success','Socio eliminado con éxito');
    }

    // datatables functions
    public function getPartners()
    {
        return Datatables::of(Partner::query())
            ->addIndexColumn()
            ->addColumn('action', function($partner) {
                return view(
                    'partners.partials.actions', compact('partner')
                );
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    private function validateFields($request, $id = 0)
    {
        $this->validate($request, [
            'partner_name' => 'required|string|max:255',
            'partner_email' => 'required|email|max:255|unique:partners,partner_email,'.$id,
            'partner_phone' => 'required|max:15',
            'partner_location' => 'sometimes|max:350',
            'partner_city' => 'required|max:255',
        ]);
    }
}
