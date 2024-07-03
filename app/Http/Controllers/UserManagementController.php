<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUser;
use App\Http\Requests\RequstUpdateUser;
use App\Models\Department;
use App\Models\District;
use App\Models\Division;
use App\Models\Role;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserManagementController extends Controller
{
    public function addNewUser(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $roles = Role::all();
        return view('pages.user-management.add-user', [
            'roles' => $roles,
        ]);
    }

    public function userList(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::with('role:id,name')
            ->where('id', '!=', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('pages.user-management.user-list', ['users' => $users]);
    }

    public function saveUser(RequestUser $request): RedirectResponse
    {
        try {
            $request->password = bcrypt($request->password);
            User::create($request->all());
        }catch (Exception $exception) {
            Toastr::error('Something went wrong!!', 'Title', ["positionClass" => "toast-bottom-right"]);
        }
        Toastr::success('User Created Successfully!!', 'Title', ["positionClass" => "toast-bottom-right"]);
        return back();
    }

    public function toggle(Request $request, User $user): JsonResponse
    {
        try {
            $status = (bool) $request->input('status');
            $user->update(['is_active' => $status]);
            $data = ['message' => 'Success! status updated'];
        } catch (Exception $exception) {
            $data['message'] = 'Sorry! something went wrong';
            return response()->json($data, $status = 500);
        }

        return response()->json($data);
    }

    public function editUser(User $user): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $user = $user->load('role:id,name');
        $roles = Role::all();

        return view('pages.user-management.edit-user', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function updateUser(RequstUpdateUser $request, User $user): RedirectResponse
    {
        try {
            // Filter out null values from the data array
            $data = array_filter($request->all(), function($value) {
                return !is_null($value);
            });
            if ($request->password !== null)
            {
                $request->password = bcrypt($request->password);
            }
            $user->update($data);
        }catch (Exception $exception) {
            Toastr::error('Something went wrong!!'. $exception, 'Title', ["positionClass" => "toast-bottom-right"]);
        }
        Toastr::success('User Updated Successfully!!', 'Title', ["positionClass" => "toast-bottom-right"]);
        return back();
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
            return Response::json(['success' => true, 'message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            return Response::json(['success' => false, 'message' => 'Error deleting user']);
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}$/|confirmed',
        ]);
        try {
            auth()->user()->update(['password' => bcrypt($request->password)]);
        } catch (\Exception $exception) {
            Toastr::error('Something went wrong!!'. $exception, 'Title', ["positionClass" => "toast-bottom-right"]);
        }
        Toastr::success('Password Updated Successfully!!', 'Title', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
