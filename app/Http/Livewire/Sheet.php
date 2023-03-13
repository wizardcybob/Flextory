<?php

namespace App\Http\Livewire\Sheet;

use App\Models\Sheet;
use Livewire\Component;

class Search extends Component
{

    public $search = '';

    public function render()
    {
        if ($this->search !== '') {
            $query = Sheet::query();
            if ($this->search !== '') {
                $query->where('title', 'like', '%' . $this->search . '%');
            }
            $sheets = $query->orderBy('title', 'asc')->get();
        } else {
            $sheets = collect();
        }
        return view('sheet.index', ['sheets' => $sheets]);
    }

    public function submit()
    {
    }

    public function resetFilters()
    {
        $this->search = '';
    }
}


