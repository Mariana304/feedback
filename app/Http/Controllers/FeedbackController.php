<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        try {
            $tokenEncrypted = $request->token;
            $token = Crypt::decryptString($tokenEncrypted);

        } catch (\Throwable $th) {
            return view('feedbackError', ['message' => 'Petición inválida']);
        }

        $feedback =  $this->decodeToken($token);

        $ticket_number =  $feedback->ticket_number;
        $ticket_rating = $feedback->rating;

        date_default_timezone_set('America/Bogota');
        $limit = strtotime($feedback->date) + 5184000;

        $starred = Feedback::where('ticket_id', $feedback->ticket_id)->count();


        if ($starred > 0){

            return view('feedbackError', ['message' => 'Usted ya calificó este ticket.']);
        } else {
            if ($limit > time()) {
                return view('feedbackEdit', compact('tokenEncrypted', 'ticket_number', 'ticket_rating'));
            } else {
                return view('feedbackError', ['message' => 'Este enlace ha expirado.']);
            }
        }       
    }


    public function store(Request $request)
    {


        $feedback =  $this->decodeToken(Crypt::decryptString($request->encrypted)); 

        if($request->rating == null){
            $feedback->comments = $request->comments;                  
        }else{         
            $feedback->rating = $request->rating;
            $feedback->comments = $request->comments;          
        }


        $feedback->save();
        return to_route('feedback.gracias');
       
        
    }

    protected function decodeToken($token)
    {
        $data = explode('W', $token);
        $feedback = new Feedback();
        try {
            $feedback->ticket_number = substr($data[0], 5, 6);
            $feedback->ticket_id = substr($data[0], 11);
            $feedback->rating = substr($data[0], 4, 1);
            $feedback->status =  $data[1];
            $feedback->user_ip = $_SERVER['REMOTE_ADDR'];
            $feedback->date =  $data[2];             
        } catch (\Throwable $th) {
            return view('feedbackError', ['message' => 'Parámetros no válidos']);
        }
        return $feedback;
    }
}
