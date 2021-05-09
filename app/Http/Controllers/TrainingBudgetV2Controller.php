<?php

namespace App\Http\Controllers;

use App\Models\TrainingBudgetV2;
use App\Traits\ResponseTraitV2;
use Illuminate\Http\Request;

class TrainingBudgetV2Controller extends Controller
{

    use ResponseTraitV2;

    private $data = [];

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        return $this->resolveResponse(TrainingBudgetV2::createTrainigBudget());
    }

    function loadBudgets(){
        $this->data['list'] = TrainingBudgetV2::all();
    }

    public function index()
    {
        //
        $this->loadBudgets();
        return view('training-budgetv2.index',$this->data);
    }

    public function show(TrainingBudgetV2 $trainingBudgetV2)
    {
        //
    }

    public function edit(TrainingBudgetV2 $trainingBudgetV2)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        return $this->resolveResponse(TrainingBudgetV2::updateTrainigBudget($id));
    }

    public function destroy($id)
    {
        //
        return $this->resolveResponse(TrainingBudgetV2::removeTrainigBudget($id));

    }

}
