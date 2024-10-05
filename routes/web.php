<?php

use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
use App\Mail\WelcomeEmail;

Route::get('/', function () {

    //dd(Activity::all());
    return view('welcome');
});

Route::get('/email', function () {
    Mail::to('tanseeq1209@gmail.com')->send(new WelcomeEmail());
    return 'Email sent from Tanseeq to tanseeq1209@gmail.com';
});
