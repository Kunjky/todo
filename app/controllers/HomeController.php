<?php

namespace App\Controllers;

class HomeController
{
    /**
     * Show the home page.
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Show the calendar page.
     */
    public function calendar()
    {
        return view('calendar');
    }
}
