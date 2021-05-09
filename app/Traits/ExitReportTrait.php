<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 28/09/2020
 * Time: 22:04
 */

namespace App\Traits;
use Carbon\Carbon;
trait ExitReportTrait
{
  public function filterExitType(){


      
         if (request()->filled('separation_type')&&request()->input('separation_type')!=0) {
             $separation_type=request()->input('separation_type');
            
            $this->separation->where('separation_type_id' ,$separation_type);
           
            return $this->separation;
          }
          return $this->separation;
    }
    
    public function filterExitEmployeeRole(){
         if (request()->filled('role')&&request()->input('role')!=0) {
             $role_id=request()->input('role');
             $this->separation->whereHas('user.role', function ($query) use($role_id){
            $query->where('role_id','=' ,$role_id);
             });
            return $this->separation;
          }
          return $this->separation;
    }
    public function filterExitEmployeeBranch(){
         if (request()->filled('branch')&&request()->input('branch')!=0) {
             $branch_id=request()->input('branch');
             $this->separation->whereHas('user.branch', function ($query) use($branch_id){
            $query->where('branch_id','=' ,$branch_id);
            });
            return $this->separation;
          }
          return $this->separation;
    }
    public function filterExitEmployeeDepartment(){
         if (request()->filled('department')&&request()->input('department')!=0) {
            $department_id=request()->input('department');
            $this->separation->whereHas('user.job.department', function ($query) use($department_id){
            
                  $query->where('departments.id', '=', $department_id);
              
            });
            return $this->separation;
          }
          return $this->separation;
    }
    public function filterExitEmployeeJobRole(){
         if (request()->filled('jobrole')&&request()->input('jobrole')!=0) {
             $job_id=request()->input('jobrole');
            $this->separation->whereHas('user', function ($query) use($job_id){
            $query->where('job_id','=' ,$job_id);
            });
            return $this->separation;
          }
          return $this->separation;
    }
    public function filterExitEmployeeStatus(){
        
         if (request()->filled('status')&&request()->input('status')!='all') {
              $status=request()->input('status');
            $this->separation->whereHas('user', function ($query) use($status){
            $query->where('status','=' ,$status);
            });
            return $this->separation;
          }
          return $this->separation;
    }
    public function filterExitEmployeeGender(){
        // dd(request()->input('gender'));
         if (request()->filled('gender')&&request()->input('gender')!='all') {
             
              $gender=request()->input('gender');
              $this->separation->whereHas('user', function ($query) use($gender){
            $query->where('sex','=' ,request()->input('gender'));
              });
            return $this->separation;
          }
          return $this->separation;
    }
    public function filterExitEmployeeSection(){
         if (request()->filled('section')&&request()->input('section')!='all') {
             $section=request()->input('section');
              $this->separation->whereHas('user', function ($query) use($section){
            $query->where('section_id','=' ,$section);
              
         });
            return $this->separation;
          }
          return $this->separation;
    }
    public function filterExitEmployeeUnion(){
         if (request()->filled('union')&&request()->input('union')!='all') {
             $union=request()->input('union');
              $this->separation->whereHas('user', function ($query) use($union){
            $query->where('union_id','=' ,$union);
              });
            return $this->separation;
          }
          return $this->separation;
    }
    public function filterExitEmployeeHiredate(){
         
         if (request()->filled('start_date_hiredate')&&request()->filled('end_date_hiredate')) {
             $dt_from=Carbon::parse(request()->input('start_date_hiredate'));
          $dt_to=Carbon::parse(request()->input('end_date_hiredate'));
          $this->separation->whereHas('user', function ($query) use($dt_from,$dt_to){
            $query->whereBetween('hiredate', [$dt_from,$dt_to]);
          });
            return $this->separation;
          }
          return $this->separation;
    }
    public function filterExitdate(){
          if (request()->filled('start_date_exitdate')&&request()->filled('end_date_exitdate')) {
             $dt_from=Carbon::parse(request()->input('start_date_exitdate'));
          $dt_to=Carbon::parse(request()->input('end_date_exitdate'));
            $this->separation->whereBetween('date_of_separation', [$dt_from,$dt_to]);
            return $this->separation;
          }
          return $this->separation;
    }
}