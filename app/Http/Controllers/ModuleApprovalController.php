<?php

namespace App\Http\Controllers;

use App\Models\ModuleApproval;
use App\Services\ModuleApprovalV2Service;
use App\Traits\ResponseTraitV2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class ModuleApprovalController extends Controller
{

    use ResponseTraitV2;

    private $data = [];

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id) //token in base64-encode
    {

        $module = base64_decode(\request('module'));
        $list = ModuleApprovalV2Service::fetchApprovalsByModule($id,$module);
//        foreach ($list as $k=>$item){
//            $list[$k]->can_approve
//        }
        $this->data['list'] = $list;  //ModuleApprovalV2Service::fetchApprovalsByModule($id,$module);
        $this->data['module'] = ModuleApprovalV2Service::getModuleObjectByModule($id,$module);

        return view('module_approval.index',$this->data);

    }



    public function edit(ModuleApproval $moduleApproval)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $this->authorize('update',ModuleApprovalV2Service::getById($id));


        $action = \request('action');
//        $request->input('')
//Validator::m
        if ($action == 'approve'){

//            Route::

            return  $this->resolveResponse(ModuleApprovalV2Service::approve($id));


        }

        if ($action == 'reject'){

            return $this->resolveResponse(ModuleApprovalV2Service::reject($id));

        }

    }


    public function destroy(ModuleApproval $moduleApproval)
    {
        //
    }

}
