<?php

namespace App\Livewire;

use \App\Models\Program; 
use Livewire\Component;
use Livewire\WithPagination;

class ProgramShowTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'program_abbreviation';
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
        $programs = Program::where('program_abbreviation', 'like', '%' . $this->search . '%')
            ->orWhere('program_description', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.program-show-table', [
            'programs' => $programs,
        ]);
    }
}
