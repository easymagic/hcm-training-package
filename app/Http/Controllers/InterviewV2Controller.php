<?php

namespace App\Http\Controllers;

use App\InterviewV2;
use App\Services\InterviewV2Service;
use App\Traits\ResponseTraitV2;
use Illuminate\Http\Request;

class InterviewV2Controller extends Controller
{

    use ResponseTraitV2;

    private $data = [];

    function loadInterviews(){
     $this->data['interviews'] = InterviewV2Service::fetch()->get();
    }

    function loadJobRoles(){
        $this->data['job_roles'] = InterviewV2Service::getJobRoles();
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


}
