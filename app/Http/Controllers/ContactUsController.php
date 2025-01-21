<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function submit_contact_us_form(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string',
            'nationality' => 'required|string',
            'business_activity' => 'required|string',
            'plan_to_start' => 'required|string',
        ]);

        // Save to database
        $contact = ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'business_activity' => $request->business_activity,
            'plan_to_start' => $request->plan_to_start,
            'message' => $request->message,
        ]);

        // Send email to admin
//        Mail::raw("New contact form submission:\n\n" . print_r($request->all(), true), function ($mail) {
//            $mail->to('admin@example.com')->subject('New Contact Form Submission');
//        });
//
//        // Send thank-you email to user
//        Mail::raw("Thank you for reaching out! We will contact you shortly.", function ($mail) use ($request) {
//            $mail->to($request->email)->subject('Thank You!');
//        });

        return response()->json(['message' => 'Form submitted successfully.']);
    }
}
