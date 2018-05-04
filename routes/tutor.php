<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('tutor')->user();

    //dd($users);

    return view('tutor.home');
})->name('home');

