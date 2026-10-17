<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::post('/kontakt', function (Request $request) {
    $data = $request->validate([
        'first_name' => ['required', 'string', 'max:80'],
        'last_name' => ['required', 'string', 'max:80'],
        'email' => ['required', 'email', 'max:254'],
        'message' => ['required', 'string', 'max:5000'],
        'website' => ['nullable', 'size:0'],
    ]);

    if (! config('sonopro.contact_to') || in_array(config('mail.default'), ['log', 'array'])) {
        return back()->withInput()->with('contact_error', __('Odosielanie správ zatiaľ nie je dostupné. Skúste to, prosím, neskôr.'))->withFragment('kontakt');
    }

    try {
        Mail::raw("Meno: {$data['first_name']} {$data['last_name']}\nE-mail: {$data['email']}\n\n{$data['message']}", function ($mail) use ($data) {
            $mail->to(config('sonopro.contact_to'))->replyTo($data['email'])->subject('SONOPRO – správa z webu');
        });
    } catch (\Throwable $exception) {
        report($exception);
        return back()->withInput()->with('contact_error', __('Správu sa nepodarilo odoslať. Skúste to, prosím, neskôr.'))->withFragment('kontakt');
    }

    return back()->with('contact_success', __('Ďakujeme. Vaša správa bola odoslaná.'))->withFragment('kontakt');
})->middleware('throttle:5,1')->name('contact');
