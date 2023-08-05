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
    public function index($token)
    {
           
            $cadenaDesencriptada = Crypt::decryptString($token);

            dd($cadenaDesencriptada);

    }

}
