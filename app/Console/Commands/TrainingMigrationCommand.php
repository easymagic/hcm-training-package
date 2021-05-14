<?php

namespace App\Console\Commands;

use App\Permission;
use App\PermissionCategory;
use Illuminate\Console\Command;

class TrainingMigrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'training:migrate-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->init();
    }

    function init(){

        $name = 'Training Module';

        $checkPermissionCategory = PermissionCategory::query()->where('name',$name);

        if (!$checkPermissionCategory->exists()){
            $obj = new PermissionCategory();
            $obj->name = $name;
            $obj->save();
        }

        $permissionCategory = $checkPermissionCategory->first();

        $checkPermission = Permission::query()->where('permission_category_id',$permissionCategory->id);

        //create training Budget
        $name = 'Create Training Budget';
        $constant = 'create_training_budget';
        if (!$checkPermission->where('name',$name)->where('constant',$constant)->exists()){
           $obj = new Permission();
           $obj->permission_category_id = $permissionCategory->id;
           $obj->name = $name;
           $obj->constant = $constant;
           $obj->save();
        }


        $name = 'Edit Training Budget';
        $constant = 'edit_training_budget';
        if (!$checkPermission->where('name',$name)->where('constant',$constant)->exists()){
            $obj = new Permission();
            $obj->permission_category_id = $permissionCategory->id;
            $obj->name = $name;
            $obj->constant = $constant;
            $obj->save();
        }



        $name = 'Remove Training Budget';
        $constant = 'remove_training_budget';
        if (!$checkPermission->where('name',$name)->where('constant',$constant)->exists()){
            $obj = new Permission();
            $obj->permission_category_id = $permissionCategory->id;
            $obj->name = $name;
            $obj->constant = $constant;
            $obj->save();
        }





        $name = 'Create Training Plan';
        $constant = 'create_training_plan';
        if (!$checkPermission->where('name',$name)->where('constant',$constant)->exists()){
            $obj = new Permission();
            $obj->permission_category_id = $permissionCategory->id;
            $obj->name = $name;
            $obj->constant = $constant;
            $obj->save();
        }



        $name = 'Edit Training Plan';
        $constant = 'edit_training_plan';
        if (!$checkPermission->where('name',$name)->where('constant',$constant)->exists()){
            $obj = new Permission();
            $obj->permission_category_id = $permissionCategory->id;
            $obj->name = $name;
            $obj->constant = $constant;
            $obj->save();
        }


        $name = 'Remove Training Plan';
        $constant = 'remove_training_plan';
        if (!$checkPermission->where('name',$name)->where('constant',$constant)->exists()){
            $obj = new Permission();
            $obj->permission_category_id = $permissionCategory->id;
            $obj->name = $name;
            $obj->constant = $constant;
            $obj->save();
        }







    }


}
