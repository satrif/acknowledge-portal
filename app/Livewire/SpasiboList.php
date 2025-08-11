<?php

namespace App\Livewire;

use App\Models\SpasiboJournal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SpasiboList extends Component
{
    public $search = '';

    public function render()
    {
        $spasibos = SpasiboJournal::query()
            ->select('spasibo-journal.*')
            ->when($this->search, function ($query) {
                $query->where('spasibo-journal.uid_to', 'like', '%'.$this->search.'%')
                    ->orWhere('spasibo-journal.uid_send', 'like', '%'.$this->search.'%');
            })
//            ->with(['attributes', 'children', 'parents'])
//            ->orderBy('name')
//            ->paginate(20)
        ;
        $spasibos->leftJoin('users as u1', 'spasibo-journal.uid_send', '=', 'u1.id')
            ->selectRaw('u1.name as name_send');
        $spasibos->join('users as u2', 'spasibo-journal.uid_to', '=', 'u2.id')
            ->selectRaw('u2.name as name_to');
        $spasibos->join('spasibo-items as i1', 'spasibo-journal.v_id', '=', 'i1.id')
            ->selectRaw('i1.name as val_name');
        $spasibos->leftJoin('spasibo-items as i2', 'spasibo-journal.n_id', '=', 'i2.id')
            ->selectRaw('i2.name as nom_name');
        $spasibos->leftJoin(DB::raw('(select a_id as counter_id, count(a_id) as counter from "spasibo-likes" group by a_id) as sl'), 'spasibo-journal.id', '=', 'sl.counter_id')
            ->selectRaw('sl.counter as likes_count');
        $items = $spasibos
//            ->get();
//            ->toSql();
        ->paginate(20);
//        dd($items);
        return view('livewire.spasibo-list', [
            'spasibos' => $items
        ]);
    }
}
