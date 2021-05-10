<?php

namespace App\Http\Controllers;

use App\Models\TrainingV2;
use App\Traits\ResponseTraitV2;
use Illuminate\Http\Request;

class TrainingV2Controller extends Controller
{

    use ResponseTraitV2;

    private $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function loadTraining(){
      $this->data['list'] = TrainingV2::query()->get();
    }

    public function index()
    {
        //
        $this->loadTraining();
        return view('trainingv2.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return  $this->resolveResponse(TrainingV2::createTraining());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingV2  $trainingV2
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingV2 $trainingV2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingV2  $trainingV2
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingV2 $trainingV2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingV2  $trainingV2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return  $this->resolveResponse(TrainingV2::updateTraining($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingV2  $trainingV2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->resolveResponse(TrainingV2::removeTraining($id));
    }


}
