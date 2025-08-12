<?php

namespace App\Livewire;

use App\Models\SpasiboJournal;
//use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SpasiboList extends Component
{
    use WithPagination;
    public $search = '';
    public $orderBy = 'id';
    public $orderDirection = 'asc';

    public function render()
    {
        //making joins
        $spasibos = SpasiboJournal::query()
            ->select('spasibo-journal.*');
        $spasibos->leftJoin('users as u1', 'spasibo-journal.uid_send', '=', 'u1.id')
            ->selectRaw('coalesce(u1.email_display_name, \'Anonymous\') as name_send');
        $spasibos->join('users as u2', 'spasibo-journal.uid_to', '=', 'u2.id')
            ->selectRaw('u2.email_display_name as name_to');
        $spasibos->join('spasibo-items as i1', 'spasibo-journal.v_id', '=', 'i1.id')
            ->selectRaw('i1.name as val_name');
        $spasibos->leftJoin('spasibo-items as i2', 'spasibo-journal.n_id', '=', 'i2.id')
            ->selectRaw('i2.name as nom_name');
        $spasibos->leftJoin(DB::raw('(select a_id as counter_id, count(a_id) as counter from "spasibo-likes" group by a_id) as sl'), 'spasibo-journal.id', '=', 'sl.counter_id')
            ->selectRaw('sl.counter as likes_count');
        //making search
        $spasibos->when($this->search, function ($query) {
            $search[] = $this->search;
            if(str_contains($this->search, ' ')) {
                $search = explode(' ', $this->search);
            }
            foreach ($search as $word) {
                if($word != '') {
                    if (ctype_digit($word)) {
                        $query->orWhere('spasibo-journal.id', '=', $word)
                            ->orWhere('sl.counter', '=', $word);
                    } else {
                        $query->orWhere('u2.email_display_name', 'ilike', '%' . $word . '%')
                            ->orWhere(DB::raw('coalesce(u1.email_display_name, \'Anonymous\')'), 'ilike', '%' . $word . '%')
                            ->orWhere('spasibo-journal.description', 'ilike', '%' . $word . '%')
                            ->orWhere('i1.name', 'ilike', '%' . $word . '%')
                            ->orWhere('i2.name', 'ilike', '%' . $word . '%');
                    }
                }
            }
        });
        //order by
        $cols = array(
            'sender' => 'name_send',
            'reciever' => 'name_to',
            'value' => 'val_name',
            'nomination' => 'nom_name',
            'comment' => 'spasibo-journal.comment',
            'likes_count' => 'likes_count',
            'id' => 'spasibo-journal.id',
        );
        $spasibos->orderBy($cols[$this->orderBy], $this->orderDirection);

        $items = $spasibos
//            ->get();
//            ->toSql();
        ->paginate(20);
//        dd($items);

        return view('livewire.spasibo-list', [
            'spasibos' => $items
        ]);
    }

    public function goSearch() {
        $this->render();
    }
}
