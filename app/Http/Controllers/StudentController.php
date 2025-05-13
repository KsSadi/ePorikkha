<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function manageStudent(Request $request)
    {
        $query = User::query();
        $query->where('role', 'user');

        // Handle search
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('username', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }

        // Handle status filtering
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Get paginated results
        $users = $query->paginate(10);

        return view('admin.student.manage_student', compact('users'));

    }

    // Add this method for the status toggle functionality
    public function toggleStatus(User $user)
    {
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();

        return redirect()->route('admin.manage.student')
            ->with('success', 'Student status updated successfully');
    }

    public function createStudent()
    {
        return view('admin.student.create_student');
    }



    public function editStudent(User $student)
    {
        return view('admin.student.create_student', compact('student'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);



        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status ?? 0;
        $user->role = 'user'; // Assuming 'user' is the role for students
        $user->save();

        return redirect()->route('admin.manage.student')->with('success', 'Student created successfully.');
    }

    public function destroy(User $student)
    {
        $student->delete();

        return redirect()
            ->route('admin.manage.student')
            ->with('success', 'Student deleted successfully.');
    }

    public function update(Request $request, User $student)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $student->id,
            'password' => 'nullable|min:8|confirmed',
        ]);


        $student->name = $request->name;
        $student->email = $request->email;
        $student->username = $request->email;
        $student->status = $request->status ?? 0;
        $student->role = 'user'; // Assuming 'user' is the role for students
        // Only update the password if it is provided
        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
        }
        // Save the changes
        $student->save();


        return redirect()->route('admin.manage.student')->with('success', 'Student updated successfully.');
    }


}
