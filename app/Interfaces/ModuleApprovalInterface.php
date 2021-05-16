<?php


namespace App\Interfaces;


interface ModuleApprovalInterface
{

//    function getSubscribers();
    function notifyRejected($id,$users);
    function notifyFinalApproved($id,$users);
    function notifyApproved($id,$users);
    function getPreviewLink();
    function getNarration();
//    function user();
//    function getModuleObject();


}