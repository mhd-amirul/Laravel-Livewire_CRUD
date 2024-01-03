<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMailer;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function update(Contact $contact)
    {
        return view('update-contact')
            ->with('contact', $contact);
    }
}
