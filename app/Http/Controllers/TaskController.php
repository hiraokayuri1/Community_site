<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Auth;

class TaskController extends Controller
{
  
  //タスク一覧画面表示
    public function index() {

    //タスクを全て表示する
    //  $works = Work::all();
    
       //タスクを一覧画面に8個表示し、それ以降は次のページに表示させる
        $tasks = Task::paginate(8);
    
      return view('tasks.index',[
        'tasks' => $tasks
      ]);
    
 }

//連絡詳細画面を表示する
public function show($id) {

    $task = Task::find($id);

     if (is_null($task)) {
       \Session::flash('err_msg', 'データがありません。');
       return redirect(route('tasks.index'));
     }
       return view('tasks.show', [
        'task' => $task
      ]);

  }

    
  //タスクの新規作成
     public function create() {
    
        return view('tasks.create');
    
        }
    
  //新規で作成した仕事を登録する
     public function store(CreateTask $request) {
    
            $task = new Task(); //新しくインスタンスを作成する
            $task->name = $request->name; //入力した名前の情報を渡す
            $task->title = $request->title; //入力したタイトルの情報を渡す
            $task->due_date = $request->due_date; //入力した日付を渡す
            $task-> user_id = Auth::user()->id; 
    
            $task->save(); //入力が完了したら保存する

            \Session::flash('err_msg', '登録しました。');
            return redirect(route('tasks.index')); //作成が完了したらタスク一覧ページに戻る
    
        }
    
   //タスクの編集画面を表示する
     public function showEdit(int $task_id) {

            $task = Task::find($task_id); //該当するタスク番号を表示する
    
            //一致したユーザしか編集できないようにする
            if(Auth::id() !== $task->user_id) {
            return abort(404);
           }
            return view('tasks.edit', [      
                'task' => $task,          
            ]);
         }
    
         //タスクを編集後、更新する
          public function edit(int $task_id, EditTask $request) {
    
            $task = Task::find($task_id); //編集したタスクを表示する

            //一致したユーザしか編集できないようにする
            if(Auth::id() !== $task->user_id) {
                return abort(404);
            }
    
            $task->name = $request->name; //変更した名前の情報を渡す
            $task->title = $request->title; //変更したタイトルの情報を渡す
            $task->status = $request->status; //変更したタスク状態の情報を渡す
            $task->due_date = $request->due_date; //変更した日付の情報を渡す
    
            $task->save(); //入力が完了したら保存する
    
            \Session::flash('err_msg', '更新しました。');
            return redirect(route('tasks.index')); //更新が完了したらタスク一覧ページに戻る
    
          }
    
          //タスクを削除する
           public function destroy($task_id) {
    
             $task = Task::find($task_id); //削除したいタスクを表示する

             //一致したユーザしか編集できないようにする
            if(Auth::id() !== $task->user_id) {
                return abort(404);
            }
             
             $task->delete(); //削除する
    
             \Session::flash('err_msg', '削除しました。');
             return redirect(route('tasks.index')); //削除が完了したらタスク一覧ページに戻る
           }
    
    }
