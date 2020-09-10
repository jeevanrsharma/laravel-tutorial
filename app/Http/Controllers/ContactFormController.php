<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;



class ContactFormController extends Controller
{
    public function create(){
    	return view('contact.create');
    }

    public function store(){

    	$data = request()->validate([
    		'name' => 'required',
    		'email' => 'required|email',
    		'message' => 'required'
    	]);

    	// dd(request()->all());

    	Mail::to('test@test.com')->send(new ContactFormMail($data)); // mail facaade is imported from above - dont forget to add same in constructor of contactformmail

    	return redirect('contact')->with('message', 'Thanks for message we will be in touch!!');
    }
}
