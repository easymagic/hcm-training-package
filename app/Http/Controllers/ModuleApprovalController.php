<?php

namespace App\Http\Controllers;

use App\Models\ModuleApproval;
use App\Services\ModuleApprovalV2Service;
use App\Traits\ResponseTraitV2;
use Illuminate\Http\Request;

class ModuleApprovalController extends Controller
{

    use ResponseTraitV2;

    private $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModuleApproval  $moduleApproval
     * @return \Illuminate\Http\Response
     */
    public function show($id) //token in base64-encode
    {
        //
        $module = base64_decode(\request('module'));
        $this->data['module'] = ModuleApproval::fetchByModule($id,$module)->first()->getByModule()->first();
        $this->data['list'] = ModuleApproval::fetchByModule($id,$module)->get();

        return view('module_approval.index',$this->data);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModuleApproval  $moduleApproval
     * @return \Illuminate\Http\Response
     */
    public function edit(ModuleApproval $moduleApproval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModuleApproval  $moduleApproval
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $action = \request('action');

        if ($action == 'approve'){

            return  $this->resolveResponse(ModuleApprovalV2Service::approve($id));

//            return $this->resolveResponse(ModuleApproval::approve($id));

        }

        if ($action == 'reject'){

            return $this->resolveResponse(ModuleApproval::reject($id));

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModuleApproval  $moduleApproval
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuleApproval $moduleApproval)
    {
        //
    }
}
