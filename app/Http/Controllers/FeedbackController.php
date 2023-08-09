<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        try {


            $token = Crypt::decryptString($request->token);
        } catch (Exception $e) {
            return view('feedbackError', ['message' => 'Petición inválida']);
        }

        $feedback =  $this->decodeToken($token);


        date_default_timezone_set('America/Bogota');

        $limit = strtotime($feedback->date) + 5184000;

        $starred = Feedback::where('ticket_id', $feedback->ticket_id)->count();



        if ($starred == 0) {
            if ($limit > time()) {

                $token = Crypt::encryptString($token);

                return view('feedbackEdit', compact('token'));
            } else {
                return view('feedbackError', ['message' => 'Este enlace ha expirado.']);
            }
            return view('feedbackError', ['message' => 'Usted ya calificó este ticket.']);
        }
    }


    public function store(Request $request)
    {

        $token = Crypt::decryptString($request->token);

        $feedback =  $this->decodeToken($token);
        $feedback->comments = $request->comments;

        $feedback->save();


        return view('gracias');
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
