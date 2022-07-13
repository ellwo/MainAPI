<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentTable extends Component
{
    use WithPagination;
    public function render()
    {

        $departments=Department::orderBy('updated_at','desc')->paginate(5);

        return view('livewire.admin.department-table',['departments'=>$departments]);
    }
}
