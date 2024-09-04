<?php

namespace App\Http\Controllers\Admin\CentralAdmin;

use App\Http\Controllers\Controller;
use App\Models\FormBuilderA;
use App\Models\FormBuilderB;
use App\Models\FormBuilderC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class FormsBuilderController extends Controller
{
    public function index()
    {
        $forms = FormBuilderA::get();
        return view('CentralAdmin.FormsA.index', ['forms' => $forms]);
    }

    public function formIndex(Request $request)
    {
        // $forms = FormBuilder::get($request->id);
        $formsA = FormBuilderA::where('id', $request->id)->first();
        $formsB = FormBuilderB::where('formbuilderA_id', $request->id)->get();
        //dd($request->id);
        return view('CentralAdmin.FormsA.indexB', ['formsB' => $formsB, 'formsA' => $formsA]);
    }

    public function ViewFields($id, $idb)
    {
        // dd($id, $idb);  
        $formsA = FormBuilderA::where('id', $id)->first();
        $formsB = FormBuilderB::where('formbuilderA_id', $id)->where('id', $idb)->first();
        $formsC = FormBuilderC::where('formbuilderB_id', $idb)->get();

        return view('CentralAdmin.FormsA.indexC', ['formsA' => $formsA, 'formsB' => $formsB, 'formsC' => $formsC,]);
    }

    public function create()
    {

        return view('CentralAdmin.FormsA.createA');
    }

    // for Creating forms Title
    public function createForms(Request $request)
    {

        $formsA = FormBuilderA::where('id', $request->id)->first();
        return view('CentralAdmin.FormsA.createB', ['formsA' => $formsA]);
    }

    // for Creating forms Title
    public function createFormsFields($id, $idb)
    {

        $formsA = FormBuilderA::where('id', $id)->first();
        $formsB = FormBuilderB::where('formbuilderA_id', $id)->where('id', $idb)->first();
        $formsC = FormBuilderC::where('formbuilderB_id', $idb)->get();

        return view('CentralAdmin.FormsA.createC', ['formsA' => $formsA, 'formsB' => $formsB]);
    }


    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'formAname' =>  'required|string|max:255',
            'status' =>  'required|string|max:100',
        ]);

        FormBuilderA::create([
            'formAname' =>  $request->formAname,
            'status' =>  $request->status,
        ]);


        return redirect('CentralAdmin/formsb')->with('success', 'Form Created Successfully!');
    }

    public function storeFormB(Request $request)
    {
        //dd($request);
        $request->validate([
            'formBname' =>  'required|string|max:255',
            'formbuilderA_id' =>  'required|integer',
            'status' =>  'required|string|max:100',
        ]);

        FormBuilderB::create([
            'formBname' =>  $request->formBname,
            'formbuilderA_id' =>  $request->formbuilderA_id,
            'status' =>  $request->status,
        ]);


        return redirect()->route('formsb.formList', ['id' => $request->id])
            ->with('success', 'Form Created Successfully!');
    }

    public function storeFormC(Request $request, $id, $idb)
    {
            
        $rules = [
            'formbuilderA_id' =>  'required|integer',
            'formbuilderB_id' =>  'required|integer',
            // 'name' => 'required|string|max:255',
            'fields' => 'required|array',
            'fields.*.label' => 'required|string|max:255',
            'fields.*.name' => 'required|string|max:255',
            'fields.*.type' => 'required|string|max:255',
            'status' =>  'required|integer',
        ];

        $message = [
            'required' => 'The field is required.',
            'integer' => 'The field must be an integer.',
            'string' => 'The field must be a string.',
            'date' => 'The field must be a valid date.',
            'max' => 'The field may not be greater than :max characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        //dd($validator->fails());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }


        foreach ($request->fields as $field) {
            FormBuilderC::create([
                'formbuilderA_id' => $request->formbuilderA_id,
                'formbuilderB_id' => $request->formbuilderB_id,
                'status' => $request->status, 
                'label'=> $field['label'],
                'name'=> $field['name'],
                'type'=> $field['type'],
            ]);
        }



        return redirect()->route('formsb.fieldList', ['id' => $request->id, 'idb' => $request->idb])
            ->with('success', 'Form Created Successfully!');
    }

    public function edit(Request $request)
    {

        $forms = FormBuilderA::find($request->id);
        return view('CentralAdmin.FormsA.editA', ['forms' => $forms]);
    }
    public function updateA(Request $request, $id)
    {


        $rules = [
            'formAname' => 'required|string|max:255',
            'status' => 'required|integer',

        ];

        $message = [
            'required' => 'The field is required.',
            'integer' => 'The field must be an integer.',
            'string' => 'The field must be a string.',
            'max' => 'The field may not  be greater than :max characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        } else {
            $forms = FormBuilderA::find($request->id);

            $forms->update([
                'formAname' => $request->formAname,
                'status' => $request->status,
            ]);
        }
        return redirect('CentralAdmin/formsb')->with('success', 'Data created successfullySuccessfully!');
    }

    public function destroy(Request $request)
    {
        $FB = FormBuilderA::find($request->id);
        $FB->delete();
        return redirect('CentralAdmin/formsb')->with('error', 'Form deleted Successfully');
    }

    public function destroyFormB($id, $idb)
    {

        //dd($id,$idb);
        // inside FormBuilder
        $FormTitle = FormBuilderB::find($idb);
        $FormTitle->delete();

        return redirect()->route('formsb.formList', ['id' => $id])
            ->with('success', 'Form Deleted Successfully!');
    }
}
