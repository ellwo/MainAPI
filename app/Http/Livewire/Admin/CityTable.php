<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Part;
use Livewire\Component;
use Livewire\WithPagination;

class CityTable extends Component
{
    use WithPagination;
    public function render()
    {
        $part=City::orderBy('updated_at','desc')->paginate(5);
        return view('livewire.admin.city-table',['city'=>$part]);
    }
}
