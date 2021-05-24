<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class TrainingPackageProvider extends ServiceProvider
{
    // App\Providers\TrainingPackageProvider
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            //migrate the budget package first

            __DIR__ . '/../../database/migrations/2021_05_09_124826_create_training_budget_v2s_table.php'=>base_path('database/migrations/2021_05_09_124826_create_training_budget_v2s_table.php'),
            __DIR__ . '/../../database/migrations/2021_05_09_124743_create_training_v2s_table.php'=>base_path('database/migrations/2021_05_09_124743_create_training_v2s_table.php'),
            __DIR__ . '/../../database/migrations/2021_05_09_124840_create_training_user_v2s_table.php'=>base_path('database/migrations/2021_05_09_124840_create_training_user_v2s_table.php'),

            __DIR__ . '/../../app/Http/Controllers/TrainingBudgetV2Controller.php'=>base_path('app/Http/Controllers/TrainingBudgetV2Controller.php'),
            __DIR__ . '/../../app/Http/Controllers/TrainingUserV2Controller.php'=>base_path('app/Http/Controllers/TrainingUserV2Controller.php'),
            __DIR__ . '/../../app/Http/Controllers/TrainingV2Controller.php'=>base_path('app/Http/Controllers/TrainingV2Controller.php'),


            __DIR__ . '/../../app/Traits/ResponseTraitV2.php'=>base_path('app/Traits/ResponseTraitV2.php'),

            __DIR__ . '/../../app/Models/TrainingUserV2.php'=>base_path('app/Models/TrainingUserV2.php'),
            __DIR__ . '/../../app/Models/TrainingBudgetV2.php'=>base_path('app/Models/TrainingBudgetV2.php'),
            __DIR__ . '/../../app/Models/TrainingV2.php'=>base_path('app/Models/TrainingV2.php'),

            __DIR__ . '/../../app/Services/TrainingUserV2Service.php'=>base_path('app/Services/TrainingUserV2Service.php'),
            __DIR__ . '/../../app/Services/TrainingV2Service.php'=>base_path('app/Services/TrainingV2Service.php'),

            __DIR__ . '/../../resources/views/training-budgetv2'=>base_path('resources/views/training-budgetv2'),
            __DIR__ . '/../../resources/views/training-userv2'=>base_path('resources/views/training-userv2'),
            __DIR__ . '/../../resources/views/trainingv2'=>base_path('resources/views/trainingv2'),

            __DIR__ . '/../../routes/'=>base_path('routes/training-package-routes/'),
            __DIR__ . '/../../resources/views/response-message.blade.php'=>base_path('resources/views/response-message.blade.php'),
            __DIR__ . '/../../resources/views/js_cdns/swal.blade.php'=>base_path('resources/views/js_cdns/swal.blade.php')


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

        Blade::directive('usercan', function($expression){
            //@if(Auth::user()->role->permissions->contains('constant', 'run_payroll'))
            return '<?php if(Auth::user()->role->permissions->contains(\'constant\', \'' . $expression . '\')) { ?>';
        });

        Blade::directive('endusercan', function($expression){
            return '<?php } ?>';
        });

    }


}
