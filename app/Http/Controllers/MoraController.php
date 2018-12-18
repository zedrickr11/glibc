<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MoraFormRequest;
use App\Mora;

class MoraController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mora=Mora::all()->where('condicion','1');
      return view ('mora.index',compact('mora'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mora.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoraFormRequest $request)
    {
      Mora::create($request->all());
      return redirect()->route('mora.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $mora=Mora::findOrFail($id);
      return view('mora.show', compact('mora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $mora=Mora::findOrFail($id);
      return view('mora.edit',compact('mora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MoraFormRequest $request, $id)
    {
        Mora::findOrFail($id)->update($request->all());
        return redirect()->route('mora.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $mora = Mora::findOrFail($id);
      $mora->condicion = '0';
      $mora->update();
      return redirect()->route('mora.index');
    }
}
