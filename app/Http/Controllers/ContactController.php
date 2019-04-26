<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'position' => 'required|string',
            'cellphone' => 'required|numeric',
            'partner_id' => 'required|string'
        ]);

        try {
            $inputs = $request->all();

            if($request->file('photo')) {
                $imagen = $request->file('photo')->store('public/partners');
                $inputs['photo'] = $imagen;
            }
            Contact::create($inputs);
        } catch(\Exception $e) {
            \Log::error('Error has ocurred (store contact) - '. $e->getMessage());
            return back()->withErrors([__('Error al crear el contacto').$e->getMessage()]);
        }

        return redirect()->route('partners.show', $request->input('partner_id'))
            ->with('success','Contacto creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = request()->route('contact');
        try {
            $contact = Contact::findOrfail($id);
        } catch (\Exception $e) {
            Log::error('Error has ocurred (edit contact) - '. $e->getMessage());
            return back()->with('error', __('Contacto no encontrado'));
        }
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'position' => 'required|string',
            'cellphone' => 'required|numeric',
            'contact_id' => 'required|string'
        ]);

        try {
            $contact = Contact::findOrfail($request->contact_id);
            $inputs = $request->all();

            if($request->file('photo')) {
                Storage::delete($contact->photo);
                $imagen = $request->file('photo')->store('public/partners');
                $inputs['photo'] = $imagen;
            }
            $contact->update($inputs);
        } catch(\Exception $e) {
            \Log::error('Error has ocurred (update contact) - '. $e->getMessage());
            return back()->withErrors([__('Error al actualizar el contacto').$e->getMessage()]);
        }

        return redirect()->route('partners.show', $request->input('partner_id'))
            ->with('success','Contacto creado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $contact = Contact::findOrfail($id);

            if($contact->photo) {
                Storage::delete($contact->photo);
            }

            $contact->delete();

        } catch(\Exception $e) {
            Log::error('Error has ocurred (destroy contact) - '. $e->getMessage());
            return back()->with('error', __('Error al eliminar el contacto'));
        }

        return back()->with('success','Contacto eliminado exitosamente');
    }
}
