<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Feedback $feedback, $token)
    {

        $token = Crypt::decryptString($token);

        $data = explode('W', $token);


        $feedback->ticket_number = substr($data[0], 5, 6);
        $feedback->ticket_id = substr($data[0], 11);
        $feedback->rating = substr($data[0], 4, 1);
        $feedback->status =  $data[1];
        $feedback->user_ip = $_SERVER['REMOTE_ADDR'];
        $feedback->date =  $data[2];


        return view('index', compact('feedback'));

       
    }
}
