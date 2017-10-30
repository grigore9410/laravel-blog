<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;
class PagesController extends Controller {

    public function getIndex()  {
        # process variable data or params
        # talk to the model
        # recive from the model
        # compile or process from model if needed
        # pass that data to the correct view
        $posts= Post::orderBy('id' , 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
        $first = 'Adrian';
        $last = 'Grigore';

        $fullname = $first . " " . $last;
        $email = 'grigore9410@gmail.com';
        $data['email'] = $email;
        $data['fullname'] =$fullname;
        return view('pages.about')->withData($data);
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'min:10',
            'subject' => 'min:3']);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
                $message->from($data ['email']);
                $message->to('grigore9410@gmail.com ');
                $message->subject($data['subject']);


        });
        Session::flash('success', 'Your Email was Sent!');

        return redirect()-> route('home');


    }



}