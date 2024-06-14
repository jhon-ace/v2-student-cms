<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Faculty;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\FacultyStoreRequest;
use App\Http\Requests\FacultyUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.faculty.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.faculty.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacultyStoreRequest $request)
    {

        $validatedData = $request->validated();

        if ($request->hasFile('faculty_photo')) {
            $fileNameWithExt = $request->file('faculty_photo')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('faculty_photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('faculty_photo')->storeAs('public/faculty_photos', $fileNameToStore);
        } else {
            $fileNameToStore = 'user.png'; 
        }
    
        $faculty = new Faculty();
        $faculty->faculty_fullname = $request->input('faculty_fullname');
        $faculty->email = $request->input('email');
        $faculty->password = bcrypt($request->input('password'));
        $faculty->department_id = $request->input('department_id');
        $faculty->status = $request->input('status');
        $faculty->faculty_photo = $fileNameToStore;
        $faculty->save();

        $user = new User();
        $user->name = $validatedData['faculty_fullname']; // Assuming 'name' is the column in the users table for the user's full name
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->user_type = 'faculty'; // Assuming 'user_type' is a column in the users table
        $user->save();
    
        $departmentName = $faculty->department ? $faculty->department->department_name : 'Not yet assigned';
    
        return redirect()->route('faculty.index')
                         ->with('success', 'Faculty - ' . $faculty->faculty_fullname . ' as faculty of ' . $departmentName . ' department added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    
        $faculty = Faculty::findOrFail($id); // Fetch a single model instance by ID
        return view('admin.faculty.edit', compact('faculty'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacultyUpdateRequest $request, $id)
    {
        // Find the faculty record
        $faculty = Faculty::findOrFail($id);


        if ($request->faculty_fullname !== $faculty->faculty_fullname ||
            $request->email !== $faculty->email ||
            $request->status !== $faculty->status ||
            $request->hasFile('faculty_photo')) 
            { 

                try {

                    $data = $request->validated();


                    if ($request->hasFile('faculty_photo')) {
                        $fileNameWithExt = $request->file('faculty_photo')->getClientOriginalName();
                        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                        $extension = $request->file('faculty_photo')->getClientOriginalExtension();
                        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                        $path = $request->file('faculty_photo')->storeAs('public/faculty_photos', $fileNameToStore);
                        $data['faculty_photo'] = $fileNameToStore;

                        // Delete previous photo if necessary
                        if ($faculty->faculty_photo !== 'user.png') {
                            Storage::delete('public/faculty_photos/' . $faculty->faculty_photo);
                        }
                    }

                    if (!empty($request->faculty_password)) {
                        $data['faculty_password'] = Hash::make($request->faculty_password);
                    }

                    $faculty->update($data);

                    return redirect()->route('faculty.index')
                        ->with('success', 'Faculty ' . $faculty->faculty_fullname . ' updated successfully.');

                } catch (\Illuminate\Database\QueryException $e) {
                    if ($e->errorInfo[1] === 1062) { // MySQL error code for duplicate entry
                        return redirect()->route('faculty.index')
                            ->with('error', 'Faculty - ' . $faculty->faculty_fullname . ' already exists.');
                    } else {
                        
                        return redirect()->route('faculty.index')
                            ->with('error', 'An error occurred while updating the faculty.');
                    }
                }
            } else {
                // No changes were made
                return redirect()->route('faculty.index')
                    ->with('info', 'No changes were made to faculty ' . $faculty->faculty_fullname . '.');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        //
    }

    public function deleteSelected(Request $request)
    {

        
        // Get the IDs of the selected courses
        $selectedFaculties = $request->input('selected');

        if ($selectedFaculties) {
            // Delete the selected courses
            Faculty::whereIn('id', $selectedFaculties)->delete();

            // Redirect with a success message
            return redirect()->route('faculty.index')->with('success', 'Selected faculty have been deleted successfully.');
        } else {
            // Redirect with an error message if no courses were selected
            return redirect()->route('faculty.index')->with('error', 'No faculty selected for deletion.');
        }
    }
}
