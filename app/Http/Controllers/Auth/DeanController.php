<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dean;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DeanStoreRequest;
use App\Http\Requests\DeanUpdateRequest;

class DeanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dean.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.dean.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeanStoreRequest $request)
    {
        
        $dean = Dean::create($request->validated());

        $department = Department::find($dean->department_id);
        $departmentName = $department ? $department->department_name : 'Not yet assigned';
    
        return redirect()->route('dean.index')
                         ->with('success', $dean->dean_fullname . ' as dean of ' . $departmentName . ' department added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dean $dean)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Dean $dean)
    // {
    //     return view('admin.dean.edit', compact('dean'));
    // }

    public function edit($id)
    {
        $dean = Dean::findOrFail($id);
        $deans = Dean::all(); // or any other relevant data source for dean statuses
        return view('admin.dean.edit', compact('dean', 'deans'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(DeanUpdateRequest $request, $id)
    {

        $dean = Dean::findOrFail($id);

        if ($request->dean_fullname !== $dean->dean_fullname || $request->dean_status !== $dean->dean_status) {
            try {
                $dean->update($request->validated());
                return redirect()->route('dean.index')
                    ->with('success', 'Dean '.$dean->dean_fullname . ' updated successfully.');
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->errorInfo[1] === 1062) { // MySQL error code for duplicate entry
                    return redirect()->route('dean.index')
                        ->with('error','Dean named '. $dean->dean_fullname .' exist on other department.');
                } else {
                    // Handle other database exceptions
                    return redirect()->route('dean.index')
                        ->with('error', 'An error occurred while updating the dean.');
                }
            }
        } else {
            return redirect()->route('dean.index')
                ->with('info', 'No changes were made to dean ' . $dean->dean_fullname . '.');
        }
}

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'dean_fullname' => ['required', 'string', 'max:255'],
    //         'dean_status' => ['required', 'string', 'max:255'],
    //     ]);

    //     $dean = Dean::findOrFail($id);

       
    //     if ($request->dean_fullname !== $dean->dean_fullname) {

    //         try {
    //             $dean->update($request->all());
    //             return redirect()->route('dean.index')
    //                 ->with('success', 'Dean '.$dean->dean_fullname . ' updated successfully.');
    //         } catch (\Illuminate\Database\QueryException $e) {

    //             if ($e->errorInfo[1] === 1062) { // MySQL error code for duplicate entry
    //                 return redirect()->route('dean.index')
    //                     ->with('error','Dean named '. $dean->dean_fullname .' exist on other department.');
    //             } else {
    //                 // Handle other database exceptions
    //                 return redirect()->route('dean.index')
    //                     ->with('error', 'An error occurred while updating the dean.');
    //             }
    //         }
    //     } else {
    //         return redirect()->route('dean.index')
    //             ->with('info', 'No changes were made to dean ' . $dean->dean_fullname . '.');
    //     }
    // }

    // Update dean


    // Redirect with success message
   // return redirect()->route('dean.index')->with('success', $dean->dean_fullname . ' Dean updated successfully.');



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Dean $dean)
    {
        $dean->delete();
           
        return redirect()->route('dean.index')
                        ->with('success','Dean deleted successfully');
    }

    public function deleteSelected(Request $request)
    {

        $selectedDeans = $request->input('selected');

        if ($selectedDeans) {
            Dean::whereIn('id', $selectedDeans)->delete();

            return redirect()->route('dean.index')->with('success', 'Selected deans have been deleted successfully.');
        } else {
            return redirect()->route('dean.index')->with('error', 'No deans selected for deletion.');
        }
    }
}
