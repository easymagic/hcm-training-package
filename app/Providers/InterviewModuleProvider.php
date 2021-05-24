<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterviewModuleProvider extends ServiceProvider
{
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

            __DIR__ . '/../../database/migrations/2021_05_17_225401_create_interview_v2s_table.php'=>base_path('database/migrations/2021_05_17_225401_create_interview_v2s_table.php'),
            __DIR__ . '/../../database/migrations/2021_05_17_225555_create_interview_assessment_v2s_table.php'=>base_path('database/migrations/2021_05_17_225555_create_interview_assessment_v2s_table.php'),
            __DIR__ . '/../../database/migrations/2021_05_17_225640_create_interview_assessment_candidate_v2s_table.php'=>base_path('database/migrations/2021_05_17_225640_create_interview_assessment_candidate_v2s_table.php'),


            __DIR__ . '/../../app/Http/Controllers/InterviewAssessmentCandidateV2Controller.php'=>base_path('app/Http/Controllers/InterviewAssessmentCandidateV2Controller.php'),
            __DIR__ . '/../../app/Http/Controllers/InterviewAssessmentV2Controller.php'=>base_path('app/Http/Controllers/InterviewAssessmentV2Controller.php'),
            __DIR__ . '/../../app/Http/Controllers/InterviewV2Controller.php'=>base_path('app/Http/Controllers/InterviewV2Controller.php'),


            __DIR__ . '/../../app/Traits/ResponseTraitV2.php'=>base_path('app/Traits/ResponseTraitV2.php'),

            __DIR__ . '/../../app/Models/InterviewAssessmentCandidateV2.php'=>base_path('app/Models/InterviewAssessmentCandidateV2.php'),
            __DIR__ . '/../../app/Models/InterviewAssessmentV2.php'=>base_path('app/Models/InterviewAssessmentV2.php'),
            __DIR__ . '/../../app/Models/InterviewV2.php'=>base_path('app/Models/InterviewV2.php'),

            __DIR__ . '/../../app/Services/InterviewAssessmentCandidateV2Service.php'=>base_path('app/Services/InterviewAssessmentCandidateV2Service.php'),
            __DIR__ . '/../../app/Services/InterviewAssessmentV2Service.php'=>base_path('app/Services/InterviewAssessmentV2Service.php'),
            __DIR__ . '/../../app/Services/InterviewV2Service.php'=>base_path('app/Services/InterviewV2Service.php'),


            __DIR__ . '/../../resources/views/interview-assessment-candidatev2'=>base_path('resources/views/interview-assessment-candidatev2'),
            __DIR__ . '/../../resources/views/interview-assessmentv2'=>base_path('resources/views/interview-assessmentv2'),
            __DIR__ . '/../../resources/views/interviewv2'=>base_path('resources/views/interviewv2'),

            __DIR__ . '/../../routes/'=>base_path('routes/interview-package-routes/'),
            __DIR__ . '/../../resources/views/response-message.blade.php'=>base_path('resources/views/response-message.blade.php')



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
