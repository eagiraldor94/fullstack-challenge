<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueInstanceController extends Controller
{
    /**
     * Renders vue Application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render()
    {
        return view('layouts.app');
    }
}
