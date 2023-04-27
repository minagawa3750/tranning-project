<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository
{
    public function getAllDepartmentsId()
    {
        return Department::pluck('name', 'id');
    }
}