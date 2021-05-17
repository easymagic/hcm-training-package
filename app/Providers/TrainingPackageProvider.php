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
