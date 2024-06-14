<?php

namespace App\Livewire;

use \App\Models\Course; 
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class CourseShowTable extends Component
{
    use WithPagination;

    public $deleteAllClicked = false;
    
    public $search = '';
    public $sortField = 'course_name';
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

        $courses = Course::with('program')
            ->where(function (Builder $query) {
                $query->where('course_code', 'like', '%' . $this->search . '%')
                      ->orWhere('course_name', 'like', '%' . $this->search . '%')
                      ->orWhere('course_description', 'like', '%' . $this->search . '%')
                      ->orWhere('course_semester', 'like', '%' . $this->search . '%')
                      ->orWhereHas('program', function (Builder $query) {
                          $query->where('program_abbreviation', 'like', '%' . $this->search . '%');
                      });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.course-show-table', [
            'courses' => $courses,
        ]);
    }
}
