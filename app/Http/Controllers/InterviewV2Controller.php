<?php

namespace App\Http\Controllers;

use App\InterviewV2;
use App\Services\Interfaces\InterviewV2ServiceInterface;
use App\Services\InterviewV2Service;
use App\Traits\ResponseTraitV2;
use App\User;
use Illuminate\Http\Request;

class InterviewV2Controller extends Controller implements InterviewV2ServiceInterface
{

    use ResponseTraitV2;

    private $data = [];

    function loadInterviews(){
     $this->data['interviews'] = InterviewV2Service::fetch()->get();
    }

    function loadJobRoles(){
        $this->data['job_roles'] = InterviewV2Service::getJobRoles($this);
    }

    public function index()
    {

        $this->loadInterviews();
        $this->loadJobRoles();

        return view('interviewv2.index',$this->data);

    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
        return $this->resolveResponse(InterviewV2Service::store());

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
        return $this->resolveResponse(InterviewV2Service::update($id));
    }

    public function destroy($id)
    {
        //
        return $this->resolveResponse(InterviewV2Service::destroy($id));
    }


    static function getJobRoles()
    {
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

    static function getInterviewers()
    {
        return User::query()->get();
        // TODO: Implement getInterviewers() method.
    }
}
