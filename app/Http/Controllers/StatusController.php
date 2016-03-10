<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class StatusController extends Controller 
{
    public function index($fname = null)
    {
        return response()->json([
            'fname' => $fname,
            'status' => 'Polly wants a cracker!'
            ]);
    }
}