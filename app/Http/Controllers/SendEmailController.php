<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail; //user
use App\Models\User;//log


class SendEmailController extends Controller
{
    // In SendEmailController.php
    public function sendEmail(User $user)
    {
        try {
            Mail::to($user->email)->send(new WelcomeMail($user));
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Email sending failed: ' . $e->getMessage());
        }
        return true; // or handle response as needed
    }
}
