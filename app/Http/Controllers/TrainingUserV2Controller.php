<?php

namespace App\Http\Controllers;

use App\Models\TrainingUserV2;
use App\Models\TrainingV2;
use App\Traits\ResponseTraitV2;
use App\User;
use Illuminate\Http\Request;

class TrainingUserV2Controller extends Controller
{
    use ResponseTraitV2;


    private $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function loadTraining(){
        $this->data['trainings'] = TrainingV2::query()->where('approved',1)->get();
    }

    function loadUsers(){
        $this->data['users'] = User::query()->get();
    }

    function loadTrainingUsers(){
       $this->data['list'] = TrainingUserV2::query()->get();
    }


    public function index()
    {
        //
        $this->loadTraining();
        $this->loadUsers();
        $this->loadTrainingUsers();

        return view('training-userv2.index',$this->data);

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
        return $this->resolveResponse(TrainingUserV2::store());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingUserV2  $trainingUserV2
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingUserV2 $trainingUserV2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingUserV2  $trainingUserV2
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingUserV2 $trainingUserV2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingUserV2  $trainingUserV2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return $this->resolveResponse(TrainingUserV2::updateRecord($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingUserV2  $trainingUserV2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $this->resolveResponse(TrainingUserV2::deleteRecord($id));

    }

}
