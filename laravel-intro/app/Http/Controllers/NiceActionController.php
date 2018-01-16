<?php

namespace App\Http\Controllers;

class NiceActionController extends Controller
{
    public function getNiceAction ($action, $name = null)
    {
        return view('actions.' . $action, ['name' => $name]);
    }
}
