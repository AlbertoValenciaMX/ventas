<?php

namespace App\Http\Controllers;

use App\Models\Vendedore;
use Illuminate\Http\Request;

/**
 * Class VendedoreController
 * @package App\Http\Controllers
 */
class VendedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = Vendedore::paginate();

        return view('vendedore.index', compact('vendedores'))
            ->with('i', (request()->input('page', 1) - 1) * $vendedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendedore = new Vendedore();
        return view('vendedore.create', compact('vendedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vendedore::$rules);

        $vendedore = Vendedore::create($request->all());

        return redirect()->route('vendedores.index')
            ->with('success', 'Vendedore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendedore = Vendedore::find($id);

        return view('vendedore.show', compact('vendedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendedore = Vendedore::find($id);

        return view('vendedore.edit', compact('vendedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vendedore $vendedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendedore $vendedore)
    {
        request()->validate(Vendedore::$rules);

        $vendedore->update($request->all());

        return redirect()->route('vendedores.index')
            ->with('success', 'Vendedore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vendedore = Vendedore::find($id)->delete();

        return redirect()->route('vendedores.index')
            ->with('success', 'Vendedore deleted successfully');
    }
}
