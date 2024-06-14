<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserRoutePageName extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;

    public function __construct($routeName)
    {
        $this->setTitle($routeName);
    }

    protected function setTitle($routeName)
    {
        if (!Auth::check()) {
            $this->title = __('Student Classroom Management System');
            return;
        }

        $userType = Auth::user()->user_type;
        $titles = [
            'admin' => [
                'admin.dashboard' => __('Admin Dashboard'),
                'admin_profile.edit' => __('Admin Profile'),
                // program page title
                'program.index' => __('Manage Program'),
                'program.create' => __('Add Program'),
                'program.edit' => __('Edit Program'),
                //dept page title
                'department.index' => __('Manage Department'),
                'department.create' => __('Add Department'),
                'department.edit' => __('Edit Department'),
                // dean page title
                'dean.index' => __('Manage Dean'),
                'dean.create' => __('Add Dean'),
                'dean.edit' => __('Edit Dean'),
                //course page title
                'course.index' => __('Manage Course'),
                'course.create' => __('Add Course'),
                'course.edit' => __('Edit Course'),
                //instructor page title
                'faculty.index' => __('Manage Faculty'),
                'faculty.create' => __('Add Faculty'),
                'faculty.edit' => __('Edit Faculty'),

            ],
            'faculty' => [
                'faculty.dashboard' => __('Faculty Dashboard'),
                //
            ],
            'student' => [
                'dashboard' => __('Student Dashboard'),
                'profile' => __('Student Profile'),
                'settings' => __('Student Settings'),
            ],
        ];

        $this->title = $titles[$userType][$routeName] ?? __('Student Classroom management System');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-route-page-name');
    }
}
