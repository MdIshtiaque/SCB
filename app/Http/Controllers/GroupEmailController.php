<?php

namespace App\Http\Controllers;

use App\Models\GroupEmail;
use App\Models\Timer;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
class GroupEmailController extends Controller
{
    public function emailList()
    {
        $emails = GroupEmail::all();
        $timer = Timer::first();
        return view('pages.email-group.list', ['emails' => $emails, 'timer' => $timer]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emails' => 'required|array',
            'emails.*' => 'required|string|email|max:255|unique:group_emails,email',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        foreach ($request->emails as $email) {
            GroupEmail::create(['email' => $email]);
        }

        return response()->json(['success' => true], 200);
    }


    public function toggle(Request $request, GroupEmail $groupEmail): JsonResponse
    {
        try {
            $status = (bool) $request->input('status');
            $groupEmail->update(['is_active' => $status]);
            $data = ['message' => 'Success! status updated'];
        } catch (Exception $exception) {
            $data['message'] = 'Sorry! something went wrong';
            return response()->json($data, $status = 500);
        }

        return response()->json($data);
    }

    public function delete(GroupEmail $groupEmail)
    {
        try {
            $groupEmail->delete();
            return Response::json(['success' => true, 'message' => 'Email deleted successfully']);
        } catch (\Exception $e) {
            return Response::json(['success' => false, 'message' => 'Error deleting Email']);
        }
    }

    public function saveTime(Request $request)
    {

        try {
            $timer = Timer::first();
            $timer->update(['timer' => $request->time]);
        }catch (Exception $exception) {
            Toastr::error('Something went wrong!!', 'Title', ["positionClass" => "toast-bottom-right"]);
        }
        Toastr::success('Timer Updated Successfully!!', 'Title', ["positionClass" => "toast-bottom-right"]);
        return back();
    }
}
