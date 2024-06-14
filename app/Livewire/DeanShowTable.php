<?php

namespace App\Livewire;

use \App\Models\Dean; 
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class DeanShowTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'dean_fullname';
    public $sortDirection = 'asc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function render()
    {

        $deans = Dean::with('department')
            ->where(function (Builder $query) {
                $query->where('dean_fullname', 'like', '%' . $this->search . '%')
                      ->orWhere('dean_status', 'like', '%' . $this->search . '%')
                      ->orWhereHas('department', function (Builder $query) {
                          $query->where('department_name', 'like', '%' . $this->search . '%');
                      });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.dean-show-table', [
            'deans' => $deans,
        ]);
    }
}
