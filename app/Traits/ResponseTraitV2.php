<?php


namespace App\Traits;


trait ResponseTraitV2
{

    function resolveResponse($response){

        $response = json_decode($response->content(),true);
//        dd($response);

        if (isset($response['error']) && $response['error']){
            return redirect()->back()->with($response)->withInput();
        }


        if (isset($response['route'])){

            return redirect($response['route'])->with($response);

        }

//        dd('back',$response);


        return redirect()->back()->with($response);

    }


}