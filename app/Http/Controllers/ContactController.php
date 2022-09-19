<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Activity;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ContactController extends BaseController
{
    public function index(){
        return view('pages.contact');
    }

    public function send(ContactRequest $request){
        $name = $request->tbName;
        $email = $request->tbEmail;
        $message = $request->userMessage;
        try{
            Contact::create([
                'name' => $name,
                'email' => $email,
                'message' => $message
            ]);
            Activity::create([
                'type' => 'Sent a message',
                'user_name' => $name
            ]);
            return redirect()->back()->with('success', 'Message sent!');
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error','There was an error sending your message');
        }
    }


}
