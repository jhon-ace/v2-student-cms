<?php

namespace App\Livewire;

use \App\Models\Department; 
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentShowTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'department_name';
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
        $departments = Department::where('department_name', 'like', '%' . $this->search . '%')
            ->orWhere('department_description', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.department-show-table', [
            'departments' => $departments,
        ]);
    }
}
