<?php

namespace App\Policies;

use App\Models\ModuleApproval;
use App\Services\ModuleApprovalV2Service;
use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class ModuleApprovalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the module approval.
     *
     * @param  \App\User  $user
     * @param  \App\ModuleApproval  $moduleApproval
     * @return mixed
     */
    public function view(User $user, ModuleApproval $moduleApproval)
    {
        //
    }

    /**
     * Determine whether the user can create module approvals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the module approval.
     *
     * @param  \App\User  $user
     * @param  \App\ModuleApproval  $moduleApproval
     * @return mixed
     */
    public function update(User $user, ModuleApproval $moduleApproval)
    {
//        return true;
        //
//        dd(90);
        return ModuleApprovalV2Service::canApprove($user->id,$moduleApproval->id);

    }

    /**
     * Determine whether the user can delete the module approval.
     *
     * @param  \App\User  $user
     * @param  \App\ModuleApproval  $moduleApproval
     * @return mixed
     */
    public function delete(User $user, ModuleApproval $moduleApproval)
    {
        //
    }

    /**
     * Determine whether the user can restore the module approval.
     *
     * @param  \App\User  $user
     * @param  \App\ModuleApproval  $moduleApproval
     * @return mixed
     */
    public function restore(User $user, ModuleApproval $moduleApproval)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the module approval.
     *
     * @param  \App\User  $user
     * @param  \App\ModuleApproval  $moduleApproval
     * @return mixed
     */
    public function forceDelete(User $user, ModuleApproval $moduleApproval)
    {
        //
    }
}
