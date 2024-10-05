<?php

use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
use App\Mail\WelcomeEmail;

Route::get('/', function () {

    //dd(Activity::all());
    return view('welcome');
});

Route::get('/email', function () {
    $to = [
        'rumanmohammed@tanseeqinvestment.com',
        'badruddin@tanseeqinvestment.com'
    ];
    $cc = [
        'tanseeq1209@gmail.com'
    ];

    Mail::to($to)->cc($cc)->send(new WelcomeEmail());
    return 'Email sent from Tanseeq to multiple recipients';
});
