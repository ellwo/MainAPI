<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Markt;
use Livewire\WithPagination;

class MarketTable extends Component
{
    use WithPagination;
    public function render()
    {
        $marcket=Markt::orderBy('updated_at','desc')->paginate(5);
        return view('livewire.admin.market-table',['marcket'=>$marcket]);
    }
}
