<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WorkflowPackageProvider extends ServiceProvider
{
    //App\Providers\WorkflowPackageProvider
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //this is where publishes is defined

    $this->publishes([

        __DIR__ . '/../../database/migrations/2021_05_10_201339_create_module_approvals_table.php'=>base_path('database/migrations/2021_05_10_201339_create_module_approvals_table.php'),
        __DIR__ . '/../../resources/views/module_approval'=>base_path('resources/views/module_approval'),
        __DIR__ . '/../../routes/'=>base_path('routes/workflow-routes/'),
        __DIR__ . '/../../app/Services/ModuleApprovalV2Service.php'=>base_path('app/Services/ModuleApprovalV2Service.php'),
        __DIR__ . '/../../app/Models/ModuleApproval.php'=>base_path('app/Models/ModuleApproval.php'),
        __DIR__ . '/../../app/Http/Controllers/ModuleApprovalController.php'=>base_path('app/Http/Controllers/ModuleApprovalController.php'),
        __DIR__ . '/../../app/Traits/ResponseTraitV2.php'=>base_path('app/Traits/ResponseTraitV2.php')

    ]);


    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
