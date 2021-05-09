<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Grade;
use App\Role;
use App\Branch;
use App\Department;
use App\UserGroup;
use App\UserUnion;
use App\UserSection;
use App\Traits\UserReportTrait;
use App\Traits\ExitReportTrait;
use App\Traits\PromotionReportTrait;
use App\Traits\PayrollReportTrait;
use App\User;
use App\Separation;
use App\Separationtype;
use App\PromotionHistory;

class ExcelReportController extends Controller
{
    public $user;
    public $separation;
    public $promotion;
    public $payroll;
    public $payroll_data;
    public $result;
    use UserReportTrait,ExitReportTrait,PromotionReportTrait;

   public function index (){
       $company=Company::find(companyId());
       
       $grades=Grade::all();
        $branches=$company->branches;
        $departments=$company->departments;
        $roles=Role::all();
        $sections=UserSection::where('company_id',$company->id)->get();
        $unions=UserUnion::where('company_id',$company->id)->get();
        $separation_types=SeparationType::all();
        // $groups=UserGroup::all();
       return view('reports.index',compact('grades','branches','departments','roles','sections','unions','separation_types'));
   }
   public function master(Request $request){
       
       $this->user= (new User)->newQuery();
       $this->user->where('company_id',companyId());
       $this->filterEmployeeName();
       $this->filterEmployeeRole();
       $this->filterEmployeeBranch();
       $this->filterEmployeeDepartment();
       $this->filterEmployeeJobRole();
       $this->filterEmployeeStatus();
       $this->filterEmployeeGender();
       $this->filterEmployeeSection();
       $this->filterEmployeeUnion();
       $this->filterEmployeeHiredate();
       $this->filterEmployeeDob();
       $users= $this->user->get();
       return view('reports.masterfile',compact('users'));
   }
   public function exits(Request $request){
       
       $this->separation= (new Separation)->newQuery();
       $this->filterExitType();
       $this->filterExitEmployeeRole();
       $this->filterExitEmployeeBranch();
       $this->filterExitEmployeeDepartment();
       $this->filterExitEmployeeJobRole();
       $this->filterExitEmployeeStatus();
       $this->filterExitEmployeeGender();
       $this->filterExitEmployeeSection();
       $this->filterExitEmployeeUnion();
       $this->filterExitEmployeeHiredate();
       $this->filterExitdate();
       $separations= $this->separation->get();
       return view('reports.exits',compact('separations'));
   }
   public function promotions(Request $request){
       
       $this->promotion= (new PromotionHistory)->newQuery();
       $this->filterOldGrade();
       $this->filterNewGrade();
       $this->filterPromotionEmployeeBranch();
       $this->filterPromotionEmployeeDepartment();
       $this->filterPromotionEmployeeJobRole();
       $this->filterPromotionEmployeeStatus();
       $this->filterPromotionEmployeeGender();
       $this->filterPromotionEmployeeSection();
       $this->filterPromotiondate();
       $promotions= $this->promotion->get();
       return view('reports.promotion',compact('promotions'));
   }
   
   
}
