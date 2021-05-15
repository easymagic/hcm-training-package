<?php


namespace App\Interfaces;


interface ModuleApprovalInterface
{

    function getSubscribers();
    function notifyRejected($users);
    function notifyFinalApproved($users);
    function notifyApproved($users);
    function getPreviewLink();
    function getNarration();
    function user();


}