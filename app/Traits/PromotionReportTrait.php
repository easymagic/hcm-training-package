<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 28/09/2020
 * Time: 22:04
 */

namespace App\Traits;
use Carbon\Carbon;

trait PromotionReportTrait
{
  public function filterOldGrade(){
      
         if (request()->filled('promoted_from')&&request()->input('promoted_from')!=0) {
             $old_grade=request()->input('promoted_from');
            
            $this->promotion->where('old_grade_id' ,$old_grade);
           
            return $this->promotion;
          }
          return $this->promotion;
    }
    public function filterNewGrade(){
      
         if (request()->filled('promoted_to')&&request()->input('promoted_to')!=0) {
             $new_grade=request()->input('promoted_to');
            
            $this->promotion->where('grade_id' ,$new_grade);
           
            return $this->promotion;
          }
          return $this->promotion;
    }
    
 
    public function filterPromotionEmployeeBranch(){
         if (request()->filled('branch')&&request()->input('branch')!=0) {
             $branch_id=request()->input('branch');
             $this->promotion->whereHas('user.branch', function ($query) use($branch_id){
            $query->where('branch_id','=' ,$branch_id);
            });
            return $this->promotion;
          }
          return $this->promotion;
    }
    public function filterPromotionEmployeeDepartment(){
         if (request()->filled('department')&&request()->input('department')!=0) {
            $department_id=request()->input('department');
            $this->promotion->whereHas('user.job.department', function ($query) use($department_id){
            
                  $query->where('departments.id', '=', $department_id);
              
            });
            return $this->promotion;
          }
          return $this->promotion;
    }
    public function filterPromotionEmployeeJobRole(){
         if (request()->filled('jobrole')&&request()->input('jobrole')!=0) {
             $job_id=request()->input('jobrole');
            $this->promotion->whereHas('user', function ($query) use($job_id){
            $query->where('job_id','=' ,$job_id);
            });
            return $this->promotion;
          }
          return $this->promotion;
    }
    public function filterPromotionEmployeeStatus(){
        
         if (request()->filled('status')&&request()->input('status')!='all') {
              $status=request()->input('status');
            $this->promotion->whereHas('user', function ($query) use($status){
            $query->where('status','=' ,$status);
            });
            return $this->promotion;
          }
          return $this->promotion;
    }
    public function filterPromotionEmployeeGender(){
        // dd(request()->input('gender'));
         if (request()->filled('gender')&&request()->input('gender')!='all') {
             
              $gender=request()->input('gender');
              $this->promotion->whereHas('user', function ($query) use($gender){
            $query->where('sex','=' ,request()->input('gender'));
              });
            return $this->promotion;
          }
          return $this->promotion;
    }
    public function filterPromotionEmployeeSection(){
         if (request()->filled('section')&&request()->input('section')!='all') {
             $section=request()->input('section');
              $this->separation->whereHas('user', function ($query) use($section){
            $query->where('section_id','=' ,$section);
              
         });
            return $this->promotion;
          }
          return $this->promotion;
    }
    
    
    public function filterPromotiondate(){
          if (request()->filled('start_date_promotiondate')&&request()->filled('end_date_promotiondate')) {
             $dt_from=Carbon::parse(request()->input('start_date_promomtiondate'));
          $dt_to=Carbon::parse(request()->input('end_date_promotiondate'));
            $this->promotion->whereBetween('approved_on', [$dt_from,$dt_to]);
            return $this->promotion;
          }
          return $this->promotion;
    }
}