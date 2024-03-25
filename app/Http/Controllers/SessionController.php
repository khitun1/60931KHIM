<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Hall;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sessions', ['sessions' => Session::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('session_create', ['halls' => Hall::all(), 'films' => Film::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'film_id' => 'integer',
            'hall_id' => 'integer',
            'beginning' => 'required']);
        $session = new Session($validated);
        $session->save();
        return redirect('/sessions');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('session_edit', [
           'session' => Session::all()->where('id', $id)->first(),
            'halls' => Hall::all(),
            'films' => Film::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'film_id' => 'integer',
            'hall_id' => 'integer',
            'beginning' => 'required']);
        $session = Session::all()->where('id', $id)->first();
        $session->film_id = $validated['film_id'];
        $session->hall_id = $validated['hall_id'];
        $session->beginning = $validated['beginning'];
        $session->save();
        return redirect('/sessions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::allows('destroy-session', Session::all()->where('id', $id)->first())) {
            return redirect('/error')->with('message', 'У вас нет разрешения на удаление сенаса
             номер ' . $id);
        }

        Session::destroy($id);
        return redirect('/sessions');
    }
}
