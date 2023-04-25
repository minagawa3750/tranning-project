<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Department;
use App\Repositories\ContactRepository;
use App\Repositories\DepartmentRepository;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository, DepartmentRepository $departmentRepository)
    {
        $this->contactRepository = $contactRepository;
        $this->departmentRepository = $departmentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->contactRepository->getAllContacts();
        return view( 'contacts.index', compact('contacts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = $this->departmentRepository->getAllDepartmentsId();
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
            'department_id' => 'required',
            'name' => 'required|max:255',
            'email' =>  'required|max:255|email',
            'content' => 'required|max:1000',
            'age' => 'required|integer|between:0,100',
            'gender' => 'required|integer|between:1,3',
        ];
    
        $messages = [
            'required' => '必須項目です。',
            'max' => '255文字以内で入力してください。',
            'email' => '入力した値が不正です。',
            'content.max' => '1000文字以内で入力してください。',
            'integer' => '整数で入力してください。',
            'age.between' => '1~100の数字を入力してください。',
            'gender.between' => '1~3の数字を入力してください。',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $contact = $this->contactRepository->store($request->all());
        
        return redirect()->route('contacts.show', ['contact' => $contact->id])->with('success', 'お問い合わせを送信しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->contactRepository->getContactById($id);
        return view('contacts.show', compact('contact'));
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
