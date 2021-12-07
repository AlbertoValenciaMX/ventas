<?php

namespace App\Http\Controllers;

use App\Models\Tipocompra;
use Illuminate\Http\Request;

/**
 * Class TipocompraController
 * @package App\Http\Controllers
 */
class TipocompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipocompras = Tipocompra::paginate();

        return view('tipocompra.index', compact('tipocompras'))
            ->with('i', (request()->input('page', 1) - 1) * $tipocompras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipocompra = new Tipocompra();
        return view('tipocompra.create', compact('tipocompra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipocompra::$rules);

        $tipocompra = Tipocompra::create($request->all());

        return redirect()->route('tipocompras.index')
            ->with('success', 'Tipocompra created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipocompra = Tipocompra::find($id);

        return view('tipocompra.show', compact('tipocompra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipocompra = Tipocompra::find($id);

        return view('tipocompra.edit', compact('tipocompra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipocompra $tipocompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipocompra $tipocompra)
    {
        request()->validate(Tipocompra::$rules);

        $tipocompra->update($request->all());

        return redirect()->route('tipocompras.index')
            ->with('success', 'Tipocompra updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipocompra = Tipocompra::find($id)->delete();

        return redirect()->route('tipocompras.index')
            ->with('success', 'Tipocompra deleted successfully');
    }
}
