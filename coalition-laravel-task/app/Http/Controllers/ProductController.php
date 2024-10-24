<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function submit(Request $req)
    {
        if (Storage::disk('public')->exists('data.json')) {
            // GET CONTENT
            $json = Storage::disk('public')->get('data.json');
            $data = json_decode($json, true);
            if($data!='' && count($data)>0){
                unset($req["_token"]);
                $req["DateTime"] = date('Y-m-d H:i:s');
                array_push($data, $req->all());
                Storage::disk('public')->put('data.json', json_encode($data));
            }else{
                //FIRST ELEMENT
                unset($req["_token"]);
                $date = date('Y-m-d H:i:s');
                $req["DateTime"] = date('Y-m-d H:i:s');
                Storage::disk('public')->put('data.json', json_encode([$req->all()]));
            }
        } else {
            echo "File not found";
        }
    }

    public function fetch(){
        // CHECK FOR FILE
        if (Storage::disk('public')->exists('data.json')) {
            // GET CONTENT
            $json = Storage::disk('public')->get('data.json');
            echo $json;
        } else {
            echo "File not found";
        }
}
}
