<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taskModel;
class CMS_AddDataController extends Controller
{
    public function _POST_TASK(Request $request)
    {
        $task = new taskModel();
        $task->task_title=$request->task_name;
        $task->task_description=$request->task_description;
        $task->content=$request->content;
        $task->date_start=$request->task_start_date;
        $task->date_end=$request->task_end_date;
        $task->status=1;
        $task->user_id =1;
        if($task->save())
        {
            return redirect('/lvtn-dashboard')->with('message', "Thanks, message has been sent");
        }
        else
        {
            return view('CMS.components.error');
        }
    }
}
