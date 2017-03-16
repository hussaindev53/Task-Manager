<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tasks;

use View;

use Auth;

use Validator;

use Input;

use Session;

use Redirect;

class tasksController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

        $this->user_id = Auth::id();


    }

    public function index(){

    	$tasks = Tasks::where('user_id', '=' ,$this->user_id)->get();
    	
    	return View::make('tasks.index')->with('tasks',$tasks);
    }
    public function create(){

        $data = $this->user_id;

        return View::make('tasks.create')->with('data',$data);
    }
    public function store(){

        $validate_this = array(
          'task_name' => 'required',
          'task_status' =>'required|not_in:0',
          );

        $validator = Validator::make(Input::all(),$validate_this);

        if($validator->fails()):
          
          return Redirect::to('tasks/create')
          ->withErrors($validator)
          ->withInput(Input::except('password'));
        
        else:
        
        $tasks = new Tasks; 

        $tasks->user_id = Auth::id();

        $tasks->task_name = Input::get('task_name');

        $tasks->task_status = Input::get('task_status');

        $tasks->save();

        Session::flash('message','Task created successfully..!!');

        return Redirect::to('tasks');

        endif;


    }
    public function show($id){

      $task = Tasks::find($id);

      return View::make('tasks.show')
      ->with('task',$task);

    }
    public function edit($id){

    }
    public function update($id){

       $task = Tasks::find($id);

      $task->task_name = Input::get("task_name");

      $task->save();
    
    }
    public function destroy($id){

    }
}
