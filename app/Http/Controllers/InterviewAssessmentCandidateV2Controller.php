<?php

namespace App\Http\Controllers;


use App\Models\InterviewAssessmentCandidateV2;
use App\Services\Interfaces\InterviewAssessmentCandidateV2ServiceInterface;
use App\Services\InterviewAssessmentCandidateV2Service;
use App\Services\InterviewV2Service;
use App\Traits\ResponseTraitV2;
use App\User;
use Illuminate\Http\Request;

class InterviewAssessmentCandidateV2Controller extends Controller implements InterviewAssessmentCandidateV2ServiceInterface
{

    use ResponseTraitV2;

    private $data = [];


    function loadInterviewAssessmentData($interviewId){

        $this->data['list'] = [];
        $this->data['id'] = $interviewId;

//        dd(123);

        $this->data['candidates'] = InterviewAssessmentCandidateV2Service::fetchCandidates($this);
        $this->data['job_roles'] = InterviewAssessmentCandidateV2Service::getJobRoles($this);


        $this->data['total_score'] = 0;

        if (\request()->filled('candidate')){
            $candidate = request('candidate');
            $this->data['candidate'] = InterviewAssessmentCandidateV2Service::getCandidate($candidate);
            $this->data['list'] = InterviewAssessmentCandidateV2Service::mapRecordsToCandidateScore($interviewId,$candidate);
            $this->data['total_score'] = InterviewAssessmentCandidateV2Service::fetch($interviewId,$candidate)->sum('score');
//            dd($this->data);
        }

//        dd($this->data);

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


    public function update($id)
    {
        //
        return $this->resolveResponse(InterviewAssessmentCandidateV2Service::update($id));
    }


    public function destroy($id)
    {
        //

        return $this->resolveResponse(response()->json([
            'message'=>'Operation not allowed!',
            'error'=>true
        ]));

    }


    static function fetchCandidates()
    {
        // TODO: Implement fetchCandidates() method.
//        dd(123);
        return User::query()->get();
    }

    static function getJobRoles()
    {
        // TODO: Implement getJobRoles() method.
        // TODO: Implement getJobRoles() method.

        $list = [];

        $job = new \stdClass();
        $job->name = 'Senior Developer';
        $job->id = 1;

        $list[] = $job;

        $job = new \stdClass();
        $job->name = 'Junior Developer';
        $job->id = 2;

        $list[] = $job;

//        dd($list);

        return $list;

    }

}
