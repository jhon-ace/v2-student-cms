<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserTypeDropdown extends Component
{
    public $selected;
    public $options;

    public function __construct($selected = null)
    {
        $this->selected = $selected;
        $this->options = [
            'admin' => 'Admin',
            'instructor' => 'Instructor',
            'student' => 'Student',
        ];
    }

    public function render()
    {
        return view('components.user-type-dropdown', [
            'options' => $this->options,
        ]);
    }
}
