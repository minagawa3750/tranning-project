<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'contacts.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::pluck('name', 'id');
        return view('contacts.confirm', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'text' => 'required|max:100',
            'start_date' =>  'required|date|after:yesterday', //start_dateが今日以降の日付かどうかチェック
            'finish_date' => 'required|date|after:yesterday',
        ];
    
        $messages = [
            'required' => '必須項目です', 'max' => '100文字以下にしてください。',
            'start_date.after' => '開始日には今日以降の日付を入力してください。',
            'finish_date.after' => '終了日には開始日以降の日付を入力してください。',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        //モデルをインスタンス化
        $task = new Task;
        
        $task->text = $request->input('text');
        $task->user_id = Auth::id();
        $task->start_date = $request->input('start_date');
        $task->finish_date = $request->input('finish_date');
        
        
        //データベースに保存
        $task->save();
        
        //リダイレクト
        session()->flash('flash_message', 'タスクを追加しました');
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
