<?php

namespace App\Http\Controllers\Admin\CentralAdmin;

use App\Http\Controllers\Controller;
use App\Models\form5PNAObarangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;



class Form5PNAOBuilderController extends Controller
{
    public function index()
    {
        $forms = form5PNAObarangay::get();
        return view('CentralAdmin.Form5.index', ['forms' => $forms]);
    }

    public function edit(Request $request)
    {
        $form = form5PNAObarangay::where('id', $request->id )->first();
        return view('CentralAdmin.Form5.edit', ['form' => $form]);
    }

    public function update(Request $request)
    {
        
        $validatedData = $request->validate([
            'column1' => 'required|string|max:255',
            'column2' => 'required|string|max:255',
            'column3' => 'required|string',
            'column4' => 'required|string',
            'column5' => 'required|string',
            'column6' => 'required|string',
            'column7' => 'required|string',
            'column8' => 'required|string',
        ]);

        $message = [
            'required' => 'The field is required.',
            'integer' => 'The field must be a whole number.',
            'string' => 'The field must be a string.',
            'date' => 'The field must be a valid date.',
            'max' => 'The field may not be greater than :max.',
            'min' => 'The field may not be greater than :min.',
        ];

        $input = $request->all();
            // $input = array_map('trim', $input);

            $validator = Validator::make($input, $validatedData, $message);

            if ($validator->fails()) {
                Log::error($validator->errors());
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Something went wrong! Please try again.');
            }else{

                // Find the model by ID
                $model = form5PNAObarangay::findOrFail($request->id);

                // Update the model with validated data
                $model->update($validatedData);

                return redirect()->route('form5.index')->with('success', 'Form updated successfully!');
    
       }
    }


}
