<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.department.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Department $department)
    {
        return view('admin.department.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentStoreRequest $request)
    {
        $department = Department::create($request->validated());
           
        return redirect()->route('department.index')
                         ->with('success', $department->department_name . ' Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentUpdateRequest $request, Department $department)
    {

        $department->update($request->validated());

        if ($department->wasChanged()) {
            return redirect()->route('department.index')
                            ->with('success', $department->department_name . ' Department updated successfully.');
        } else {
            return redirect()->route('department.index')
                            ->with('info', 'No changes were made to the ' . $department->department_name . ' Department.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }

    public function deleteSelected(Request $request)
    {

        $selectedDepartments = $request->input('selected');

        if ($selectedDepartments) {
            // Fetch departments associated with deans
            $departmentsWithDeans = \DB::table('deans')
                ->whereIn('department_id', $selectedDepartments)
                ->pluck('department_id')
                ->toArray();

            // Get the departments that are not associated with deans
            $departmentsWithoutDeans = array_diff($selectedDepartments, $departmentsWithDeans);

            // Attempt to delete departments without deans
            try {
                if (!empty($departmentsWithoutDeans)) {
                    Department::whereIn('id', $departmentsWithoutDeans)->delete();
                    $message = 'Selected department/s  have been deleted successfully.';
                }
               
                if (!empty($departmentsWithDeans)) {
                    $message .= ' However, the following departments could not be deleted because they are associated with deans: ' 
                        . implode(', ', Department::whereIn('id', $departmentsWithDeans)->pluck('department_name')->toArray()) . '.';
                }

                return redirect()->route('department.index')->with('success', $message);
            } catch (\Exception $e) {
                return redirect()->route('department.index')->with('error', 'The following departments could not be deleted because they are associated with deans: ' 
                . implode(', ', Department::whereIn('id', $departmentsWithDeans)->pluck('department_name')->toArray()) . '.');
            }
        } else {
            return redirect()->route('department.index')->with('error', 'No departments selected for deletion.');
        }
        
    }
}
