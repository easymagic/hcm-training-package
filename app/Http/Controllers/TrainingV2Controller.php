<?php

namespace App\Http\Controllers;

use App\Interfaces\ModuleApprovalInterface;
use App\Models\TrainingV2;
use App\Services\ModuleApprovalV2Service;
use App\Services\TrainingV2Service;
use App\Traits\ResponseTraitV2;
use Illuminate\Http\Request;

class TrainingV2Controller extends Controller
{

    use ResponseTraitV2;

    private $data = [];

    function __construct()
    {
//        parent::__construct();
//        ModuleApprovalV2Service::setListener($this);
    }

    function loadTraining(){
      $this->data['list'] = TrainingV2::query()->get();
      $this->data['departments'] = TrainingV2Service::getDepartments();
    }

    public function index()
    {
        //
        $this->loadTraining();
        return view('trainingv2.index',$this->data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        return  $this->resolveResponse(TrainingV2Service::createTraining());
    }


    public function show(TrainingV2 $trainingV2)
    {
        //
    }


    public function edit(TrainingV2 $trainingV2)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
        return  $this->resolveResponse(TrainingV2Service::updateTraining($id));
    }


    public function destroy($id)
    {
        return $this->resolveResponse(TrainingV2Service::removeTraining($id));
    }




}
