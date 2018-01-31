<?php

namespace App\Http\Controllers;

use App\NiceAction;
use App\NiceActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NiceActionController extends Controller
{
    public function getHome()
    {
        $actions = NiceAction::orderBy('niceness', 'desc')->get();
        $logged_actions = NiceActionLog::all();
//         Raw way of doing this query
//        $actions = DB::table('nice_actions')->get();
//        Example of raw way of doing things:
        $query = DB::table('nice_action_logs')
                    ->insertGetId([
                        'nice_action_id' => DB::table('nice_actions')
                            ->select('id')->where('name', 'Hug')->first()->id
                    ]);

        return view('home', [
            'actions' => $actions,
            'logged_actions' => $logged_actions,
            'db' => $query
        ]);
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
