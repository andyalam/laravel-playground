<?php

namespace App\Http\Controllers;

use App\NiceAction;
use App\NiceActionLog;
use Illuminate\Http\Request;

class NiceActionController extends Controller
{
    public function getHome()
    {
        $actions = NiceAction::all();
        $logged_actions = NiceActionLog::all();
        return view('home', ['actions' => $actions, 'logged_actions' => $logged_actions]);
    }

    public function getNiceAction ($action, $name = null)
    {
        if ($name === null) {
            $name = 'you';
        }
        /* @var NiceAction $nice_action */
        $nice_action = NiceAction::query()->where('name', $action)->first();
        /* @var NiceActionLog $nice_action_log */
        $nice_action_log = new NiceActionLog();
        $nice_action->logged_actions()->save($nice_action_log);
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
