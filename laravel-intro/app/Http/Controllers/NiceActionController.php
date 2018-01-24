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

    public function postInsertNiceAction (Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha|unique:nice_actions',
            'niceness' => 'required|numeric',
        ]);

        $action = new NiceAction();
        $action->name = ucfirst(strtolower($request['name']));
        $action->niceness = $request['niceness'];
        $action->save();

        return redirect()->route('home');
    }
}
