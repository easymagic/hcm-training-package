<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 28/09/2020
 * Time: 22:04
 */

namespace App\Traits;
use App\PaceSalaryComponent;
use App\SalaryComponent;
use App\SpecificSalaryComponent;
use Carbon\Carbon;
trait PayrollReportTrait
{
  public function filterSalaryComponents(){
      if(request()->input('source')==1){

        $salary_component=SalaryComponent::where('constant',request()->input('salary_component'))->first();
        if(!$salary_component){
            $salary_component=PaceSalaryComponent::where('constant',request()->input('salary_component'))->first();
        }

       return   $this->result = $this->payroll->payroll_details->map(function ($detail, $key) use($salary_component) {
              $user_payroll_data=unserialize($detail->sc_details);
               $this->payroll_data['name']=$salary_component->name;
               if($salary_component->type==1){
                   $this->payroll_data['amount']=$user_payroll_data['sc_allowances'][$salary_component->constant];
               }elseif($salary_component->type==0){
                   $this->payroll_data['amount']=$user_payroll_data['sc_deductions'][$salary_component->constant];
               }
              return $this->payroll_data;

          });
      }
      return $this->result;

    }
    public function filterSpecificSalaryComponents(){
        if(request()->input('source')==2){
            $specific_salary_component_type=SpecificSalaryComponent::find(request()->input('ssc_id'))->first();

            return   $this->result = $this->payroll->payroll_details->map(function ($detail, $key) use($specific_salary_component_type) {
                //unserialize data stored in the ssc_details column
                $user_payroll_data=unserialize($detail->ssc_details);
                $this->payroll_data['name']=$specific_salary_component_type->name;

                $array_key=array_search($specific_salary_component_type->id, $user_payroll_data['ssc_component_category']);
                $this->payroll_data['amount']=$user_payroll_data['ssc_amount'][$array_key];

                return $this->payroll_data;

            });
        }
        return $this->result;

    }
    
    public function filterPayrollComponents(){
        if(request()->input('source')==3) {
            return   $this->result = $this->payroll->payroll_details->map(function ($detail, $key)  {
                $const = request()->payroll_constant;
                $this->payroll_data['name']=studly_case($const);
                if ($const == 'gross_pay') {
                    $this->payroll_data['amount']=$detail->basic_pay+$detail->sc_allowances+$detail->ssc_allowances;
                }elseif ($const == 'netpay') {
                    $this->payroll_data['amount']=$detail->basic_pay+$detail->sc_allowances+$detail->ssc_allowances-($detail->sc_deductions+$detail->ssc_deductions+$detail->paye+$detail->union_dues);
                }else{
                    $this->payroll_data['amount']=$detail->$const;
                }
            });
        }
        return $this->result;
    }
    public function filterPayrollDate(){
        $date = date('Y-m-d', strtotime('01-' . request()->month));
        $pmonth = date('m', strtotime($date));
        $pyear = date('Y', strtotime($date));
        $this->payroll->where(['month' => $pmonth, 'year' => $pyear]);
        
        return $this->payroll;
    }
    public function filterPayrollSection(){
        $date = date('Y-m-d', strtotime('01-' . request()->month));
        $pmonth = date('m', strtotime($date));
        $pyear = date('Y', strtotime($date));
        $this->payroll->where(['month' => $pmonth, 'year' => $pyear]);

        return $this->payroll;
    }
    public function filterPayrollEmployeeBranch(){
         if (request()->filled('branch')&&request()->input('branch')!=0) {
             $branch_id=request()->input('branch');
             $this->payroll->whereHas('payroll_details', function ($query) use($branch_id){
                 $query->whereHas('user.branch', function ($query) use($branch_id){
            $query->where('branch_id','=' ,$branch_id);
            });
         });
            return $this->payroll;
          }
          return $this->payroll;
    }
    public function filterPayrollEmployeeDepartment(){
         if (request()->filled('department')&&request()->input('department')!=0) {
            $department_id=request()->input('department');
             $this->payroll->whereHas('payroll_details', function ($query) use($department_id){

            $query->whereHas('user.job.department', function ($query) use($department_id){
            
                  $query->where('departments.id', '=', $department_id);
              
            });
             });
            return $this->payroll;
          }
          return $this->payroll;
    }
    public function filterPayrollEmployeeJobRole(){
         if (request()->filled('jobrole')&&request()->input('jobrole')!=0) {

             $job_id=request()->input('jobrole');
             $this->payroll->whereHas('payroll_details', function ($query) use($job_id){
                $query->whereHas('user', function ($query) use($job_id){
                $query->where('job_id','=' ,$job_id);
                });
             });
            return $this->payroll;
          }
          return $this->payroll;
    }
    public function filterPayrollEmployeeStatus(){


        $this->payroll->whereHas('payroll_details', function ($query) {
            $query->whereHas('user', function ($query) {
            $query->where('status','<=' ,1);
            });
        });
            return $this->payroll;

    }
    public function filterPayrollEmployeeGender(){
        // dd(request()->input('gender'));
         if (request()->filled('gender')&&request()->input('gender')!='all') {
             
              $gender=request()->input('gender');
             $this->payroll->whereHas('payroll_details', function ($query) use($gender){
              $query->whereHas('user', function ($query) use($gender){
            $query->where('sex','=' ,request()->input('gender'));
              });
             });
            return $this->payroll;
          }
          return $this->payroll;
    }
    public function filterPayrollEmployeeSection(){
         if (request()->filled('section')&&request()->input('section')!='all') {
             $section=request()->input('section');
             $this->payroll->whereHas('payroll_details', function ($query) use($section){
              $query->whereHas('user', function ($query) use($section){
            $query->where('section_id','=' ,$section);
              
         });
             });
            return $this->payroll;
          }
          return $this->payroll;
    }

    public function filterPayrollEmployeeHiredate(){
         
         if (request()->filled('start_date_hiredate')&&request()->filled('end_date_hiredate')) {
             $dt_from=Carbon::parse(request()->input('start_date_hiredate'));
          $dt_to=Carbon::parse(request()->input('end_date_hiredate'));
             $this->payroll->whereHas('user', function ($query) use($dt_from,$dt_to){
          $query->whereHas('user', function ($query) use($dt_from,$dt_to){
            $query->whereBetween('hiredate', [$dt_from,$dt_to]);
          });
             });
            return $this->payroll;
          }
          return $this->payroll;
    }

}