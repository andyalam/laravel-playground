<?php

namespace App\Http\Controllers;

use App\NiceAction;
use Illuminate\Http\Request;

class NiceActionController extends Controller
{
    public function getHome()
    {
        $actions = NiceAction::all();
        return view('home', ['actions' => $actions]);
    }

    public function getNiceAction ($action, $name = null)
    {
        if ($name === null) {
            $name = 'you';
        }
        return view('actions.nice', ['action' => $action, 'name' => $name]);
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
