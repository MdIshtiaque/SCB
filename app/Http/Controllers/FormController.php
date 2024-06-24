<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DataRequest;
use App\Models\Record;
use Exception;

class FormController extends Controller
{
    public function storeData(DataRequest $request) {
        try{
            Record::create([
                'full_name' => $request->full_name,
                'mobile' => $request->mobile,
                'city' => $request->city,
            ]);
        }catch(Exception $exception) {
            return back();
        }
        return redirect()->route('success');
    }
}