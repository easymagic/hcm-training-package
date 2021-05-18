<?php

namespace App\Http\Controllers;

use App\InterviewAssessmentV2;
use App\Services\InterviewAssessmentV2Service;
use App\Services\InterviewV2Service;
use App\Traits\ResponseTraitV2;
use Illuminate\Http\Request;

class InterviewAssessmentV2Controller extends Controller
{

    use ResponseTraitV2;

    private $data = [];

    function loadInterviewAssessment($interviewId){
        $this->data['assessments'] = InterviewAssessmentV2Service::fetch($interviewId)->get();
        $this->data['interview'] = InterviewV2Service::getById($interviewId);
    }

    public function index()
    {
        //

    }


    public function create()
    {
        //
    }


    public function store()
    {

        //
        return $this->resolveResponse(InterviewAssessmentV2Service::store());

    }


    public function show($id)
    {
        //

        $this->loadInterviewAssessment($id);

        return view('interview-assessmentv2.index',$this->data);

    }


    public function edit($id)
    {
        //
    }


    public function update($id)
    {
        //
        return $this->resolveResponse(InterviewAssessmentV2Service::update($id));
    }


    public function destroy($id)
    {
        //
        return $this->resolveResponse(InterviewAssessmentV2Service::delete($id));
    }

}
