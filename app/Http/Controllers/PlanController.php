<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PlanFormRequest;
use App\Plan;

class PlanController extends Controller
{
  public function __construct()
   {
       $this->middleware('auth');
       $this->middleware('role:admin');
   }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $plan=Plan::all()->where('condicion','1');;
    return view ('plan.index',compact('plan'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('plan.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PlanFormRequest $request)
  {
    $plan = (new Plan)->fill($request->all());
    $plan->condicion = 1;
    $plan->save();
    return redirect()->route('plan.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $plan=Plan::findOrFail($id);
    return view('plan.show', compact('plan'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $plan=Plan::findOrFail($id);
    return view('plan.edit',compact('plan'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(PlanFormRequest $request, $id)
  {
      Plan::findOrFail($id)->update($request->all());
      return redirect()->route('plan.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $plan = Plan::findOrFail($id);
    $plan->condicion = '0';
    $plan->update();
    return redirect()->route('plan.index');
  }
}
