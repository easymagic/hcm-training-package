<?php


namespace App\Traits;


trait WorkFlowableTrait
{

    abstract function notifyRejected($users);
    abstract function notifyFinalApproved($users);
    abstract function notifyApproved($users);
    abstract function getPreviewLink();
    abstract function getNarration();

}