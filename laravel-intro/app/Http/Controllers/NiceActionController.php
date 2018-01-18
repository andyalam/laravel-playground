<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NiceActionController extends Controller
{
    public function getNiceAction ($action, $name = null)
    {
        return view('actions.' . $action, ['name' => $name]);
    }

    public function postNiceAction (Request $request)
    {
        $this->validate($request, [
            'action' => 'required',
            'name' => 'required|alpha'
        ]);
        $data = [
            'action' => $request['action'],
            'name' => $request['name']
        ];
        return view('actions.nice', $data);
    }
}
