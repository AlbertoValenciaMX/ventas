<?php

namespace App\Http\Controllers;

use App\Models\Tipovendedore;
use Illuminate\Http\Request;

/**
 * Class TipovendedoreController
 * @package App\Http\Controllers
 */
class TipovendedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipovendedores = Tipovendedore::paginate();

        return view('tipovendedore.index', compact('tipovendedores'))
            ->with('i', (request()->input('page', 1) - 1) * $tipovendedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipovendedore = new Tipovendedore();
        return view('tipovendedore.create', compact('tipovendedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipovendedore::$rules);

        $tipovendedore = Tipovendedore::create($request->all());

        return redirect()->route('tipovendedores.index')
            ->with('success', 'Tipovendedore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipovendedore = Tipovendedore::find($id);

        return view('tipovendedore.show', compact('tipovendedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipovendedore = Tipovendedore::find($id);

        return view('tipovendedore.edit', compact('tipovendedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipovendedore $tipovendedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipovendedore $tipovendedore)
    {
        request()->validate(Tipovendedore::$rules);

        $tipovendedore->update($request->all());

        return redirect()->route('tipovendedores.index')
            ->with('success', 'Tipovendedore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipovendedore = Tipovendedore::find($id)->delete();

        return redirect()->route('tipovendedores.index')
            ->with('success', 'Tipovendedore deleted successfully');
    }
}
