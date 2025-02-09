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
            'message' => $request->message ?? null,
        ]);

        $emailData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'business_activity' => $request->business_activity,
            'plan_to_start' => $request->plan_to_start,
            'message' => $request->message ?? '',
        ];

        // Send email to admin
        Mail::send('emails.admin_template', ['data' => $emailData], function ($mail) use ($emailData) {
            $mail->to('info@businessexperts.ae')->subject('Enquiry Submission From - ' . $emailData['name']);
        });

        // Send thank-you email to user
        Mail::send('emails.user_template', ['data' => $emailData], function ($mail) use ($request) {
            $mail->to($request->email)->subject('Thank You for Reaching Out to Business Experts!');
        });

        return response()->json(['message' => 'Form submitted successfully.']);
    }
}
