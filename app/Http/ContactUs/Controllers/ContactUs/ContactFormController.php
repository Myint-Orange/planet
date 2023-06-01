<?php

namespace App\Http\Controllers\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{

    public function index()
    {
        $contactForms = ContactForm::all();
        return view('admin.contactUs.indexContactForm', compact(['contactForms']));
    }
    public function store(Request $request)
    {
        dd($request);
        return view('user.workwithus.contact');
    }
}
