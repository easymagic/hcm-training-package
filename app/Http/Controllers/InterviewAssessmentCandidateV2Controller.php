<?php

namespace App\Http\Controllers;


use App\Models\InterviewAssessmentCandidateV2;
use App\Services\InterviewAssessmentCandidateV2Service;
use App\Services\InterviewV2Service;
use App\Traits\ResponseTraitV2;
use Illuminate\Http\Request;

class InterviewAssessmentCandidateV2Controller extends Controller
{

    use ResponseTraitV2;

    private $data = [];


    function loadInterviewAssessmentData($interviewId){

        $this->data['list'] = [];

//        dd(123);

        $this->data['candidates'] = InterviewAssessmentCandidateV2Service::fetchCandidates($interviewId)->get();



        if (\request()->filled('candidate')){
            $candidate = request('candidate');
            $this->data['list'] = InterviewAssessmentCandidateV2Service::mapRecordsToCandidateScore($interviewId,$candidate);
        }

        $this->data['interview'] = InterviewV2Service::getById($interviewId);
    }


    public function index()
    {
        //
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        //

        return $this->resolveResponse(InterviewAssessmentCandidateV2Service::store());
    }


    public function show($id) //interviewId
    {

        //
        $this->loadInterviewAssessmentData($id);


        return view('interview-assessment-candidatev2.index',$this->data);

    }


    public function edit(InterviewAssessmentCandidateV2 $interviewAssessmentCandidateV2)
    {
        //
    }


    public function update(Request $request, InterviewAssessmentCandidateV2 $interviewAssessmentCandidateV2)
    {
        //
    }


    public function destroy(InterviewAssessmentCandidateV2 $interviewAssessmentCandidateV2)
    {
        //
    }

}
