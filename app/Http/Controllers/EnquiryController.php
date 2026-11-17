<?php
namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot: bot mengisi field "website", pura-pura sukses
        if ($request->filled('website')) {
            return response()->json(['ok' => true, 'message' => 'Thank you.']);
        }

        $data = $request->validate([
            'name'         => 'required|string|max:120',
            'email'        => 'required|email|max:160',
            'project_type' => 'required|in:Residential,Hotel,Restaurant,Villa,Distributor,Other',
            'message'      => 'required|string|min:10|max:3000',
        ]);

        Enquiry::create($data + ['ip' => $request->ip()]);

        try {
            $body = "Name: {$data['name']}\nEmail: {$data['email']}\nType: {$data['project_type']}\n\n{$data['message']}";
            Mail::raw($body, fn ($m) => $m
                ->to(config('concrea.notify_email'))
                ->replyTo($data['email'])
                ->subject('New CONCREA enquiry: ' . $data['project_type']));
        } catch (\Throwable $e) {
            report($e); // data tetap tersimpan di database
        }

        return response()->json(['ok' => true, 'message' => 'Thank you. We will reply within 1–2 business days.']);
    }
}