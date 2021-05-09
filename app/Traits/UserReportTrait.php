<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 28/09/2020
 * Time: 22:04
 */

namespace App\Traits;
use Carbon\Carbon;
trait UserReportTrait
{
  
    public function filterEmployeeName(){
       if (request()->filled('employee') || request()->filled('q')) {

          $q= request()->filled('employee') ? request()->input('employee') : request()->input('q');
            $this->user->where(function ($query) use($q) {
                $query->where('email','like' ,'%' . $q . '%')
                      ->orWhere('name','like' ,'%' . $q . '%')
                      ->orWhere('emp_num','like' ,'%' . $q . '%');
            });
            return $this->user;
        }
        return $this->user;
    }
    public function filterEmployeeRole(){
         if (request()->filled('role')&&request()->input('role')!=0) {
            $this->user->where('role_id','=' ,request()->input('role'));
            return $this->user;
          }
          return $this->user;
    }
    public function filterEmployeeBranch(){
         if (request()->filled('branch')&&request()->input('branch')!=0) {
            $this->user->where('branch_id','=' ,request()->input('branch'));
            return $this->user;
          }
          return $this->user;
    }
    public function filterEmployeeDepartment(){
         if (request()->filled('department')&&request()->input('department')!=0) {
            $department_id=request()->input('department');
            $this->user->whereHas('job.department', function ($query) use($department_id){
                  $query->where('departments.id', '=', $department_id);
              });
            return $this->user;
          }
          return $this->user;
    }
    public function filterEmployeeJobRole(){
         if (request()->filled('jobrole')&&request()->input('jobrole')!=0) {
            $this->user->where('job_id','=' ,request()->input('jobrole'));
            return $this->user;
          }
          return $this->user;
    }
    public function filterEmployeeStatus(){
        
         if (request()->filled('status')&&request()->input('status')!='all') {
             if(request()->input('status')=='active'){
                $this->user->where('status','<=' ,1);
                return $this->user;
             }elseif(request()->input('status')=='all'){
                  return $this->user;
             }else{
                 $this->user->where('status','=' ,request()->input('status'));
                 return $this->user;
             }
             
           
            return $this->user;
          }
          return $this->user;
    }
    public function filterEmployeeGender(){
         if (request()->filled('gender')&&request()->input('gender')!='all') {
            $this->user->where('sex','=' ,request()->input('gender'));
            return $this->user;
          }
          return $this->user;
    }
    public function filterEmployeeSection(){
         if (request()->filled('section')&& request()->input('section')!=0 &&request()->input('section')!='all') {
            $this->user->where('section_id','=' ,request()->input('section'));
            return $this->user;
          }elseif(request()->input('section')=='m'){
              $this->user->whereDoesntHave('section');
            return $this->user;
          }
          return $this->user;
    }
    public function filterEmployeeUnion(){
         if (request()->filled('union')&&request()->input('union')!=0&&request()->input('union')!='all') {
            $this->user->where('union_id','=' ,request()->input('union'));
            return $this->user;
          }
          return $this->user;
    }
    public function filterEmployeeHiredate(){
         
         if (request()->filled('start_date_hiredate')&&request()->filled('end_date_hiredate')) {
             $dt_from=Carbon::parse(request()->input('start_date_hiredate'));
          $dt_to=Carbon::parse(request()->input('end_date_hiredate'));
            $this->user->whereBetween('hiredate', [$dt_from,$dt_to]);
            return $this->user;
          }
          return $this->user;
    }
    public function filterEmployeeDob(){
         if (request()->filled('start_date_dob')&&request()->filled('end_date_dob')) {
         dd(request()->start_date_dob);
             $dt_from=Carbon::parse(request()->input('start_date_dob'));
          $dt_to=Carbon::parse(request()->input('end_date_dob'));
            $this->user->whereBetween('hiredate', [$dt_from,$dt_to]);
            return $this->user;
          } 
          return $this->user;
    }
}