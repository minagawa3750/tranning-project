<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function getAllContacts()
    {
        return Contact::all();
    }

    public function getContactById($id)
    {
        return Contact::find($id);
    }

    public function store(array $data)
    {
        $contact = new Contact();
        $contact->department_id = $data["department_id"];
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->content = $data['content'];
        $contact->age = $data['age'];
        $contact->gender = $data['gender'];  
        $contact->save();

        return $contact;
    }
}