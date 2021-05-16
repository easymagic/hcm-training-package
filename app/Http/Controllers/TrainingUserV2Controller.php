<?php

namespace App\Http\Controllers;

use App\Models\TrainingUserV2;
use App\Models\TrainingV2;
use App\Services\TrainingUserV2Service;
use App\Services\TrainingV2Service;
use App\Traits\ResponseTraitV2;
use App\User;
use Illuminate\Http\Request;

class TrainingUserV2Controller extends Controller
{
    use ResponseTraitV2;


    private $data = [];



    function loadTraining(){
        $this->data['trainings'] = TrainingV2Service::fetchApproved()->get(); // query()->where('approved',1)->get();
    }

    function loadUsers(){
        $this->data['users'] = User::query()->get();
    }

    function loadTrainingUsers(){
       $this->data['list'] = TrainingUserV2Service::fetch()->paginate(20); // ::query()->get();
    }


    public function index()
    {
        //
        $this->loadTraining();
        $this->loadUsers();
        $this->loadTrainingUsers();

        return view('training-userv2.index',$this->data);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        return $this->resolveResponse(TrainingUserV2Service::store());
    }


    public function show(TrainingUserV2 $trainingUserV2)
    {
        //
    }


    public function edit(TrainingUserV2 $trainingUserV2)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
        return $this->resolveResponse(TrainingUserV2Service::updateRecord($id));
    }


    public function destroy($id)
    {
        //
        return $this->resolveResponse(TrainingUserV2Service::deleteRecord($id));

    }

}
