<?php

namespace App\Http\Controllers;

use App\Models\Metodopago;
use Illuminate\Http\Request;

/**
 * Class MetodopagoController
 * @package App\Http\Controllers
 */
class MetodopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodopagos = Metodopago::paginate();

        return view('metodopago.index', compact('metodopagos'))
            ->with('i', (request()->input('page', 1) - 1) * $metodopagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metodopago = new Metodopago();
        return view('metodopago.create', compact('metodopago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Metodopago::$rules);

        $metodopago = Metodopago::create($request->all());

        return redirect()->route('metodopagos.index')
            ->with('success', 'Metodopago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metodopago = Metodopago::find($id);

        return view('metodopago.show', compact('metodopago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metodopago = Metodopago::find($id);

        return view('metodopago.edit', compact('metodopago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Metodopago $metodopago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metodopago $metodopago)
    {
        request()->validate(Metodopago::$rules);

        $metodopago->update($request->all());

        return redirect()->route('metodopagos.index')
            ->with('success', 'Metodopago updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $metodopago = Metodopago::find($id)->delete();

        return redirect()->route('metodopagos.index')
            ->with('success', 'Metodopago deleted successfully');
    }
}
