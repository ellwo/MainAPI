<?php

namespace App\Http\Livewire\Admin;

use App\Models\Part;
use Livewire\Component;
use Livewire\WithPagination;

class PartTable extends Component
{
    use WithPagination;
    public function render()
    {
        $part=Part::orderBy('updated_at','desc')->paginate(5);
        return view('livewire.admin.part-table',['part'=>$part]);
    }
}
