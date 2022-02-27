<?php

namespace App\Controllers;

class HomeController
{
    /**
     * Show the calendar page.
     */
    public function calendar()
    {
        return view('calendar');
    }
}
