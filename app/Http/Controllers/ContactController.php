<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();
        // return $data;
        // $data['userMessage'] = $request->input('message');

        Mail::send('admin.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'userMessage' => $request->message,
        ], function ($message) use ($request) {
            $message->to('masjid.tpq.baitijannati@gmail.com')
                    ->subject('Ada yang menghubungi')
                    ->replyTo($request->email);
        });

        Mail::send('umum.email', [
            'name' => $request->name,
        ], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Terima Kasih Telah Menghubungi Kami');
        });
        

        return back()->with('success', 'Email sent successfully!');
    }
}