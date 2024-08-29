<?php

namespace App\Http\Controllers\CentralAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;  
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('permission:view user', ['only' => ['index']]);
    //     $this->middleware('permission:create user', ['only' => ['create','store']]);
    //     $this->middleware('permission:update user', ['only' => ['update','edit']]);
    //     $this->middleware('permission:delete user', ['only' => ['destroy']]);
    // }
    
    public function getProvinces()
    {
        try {
            $provinces = DB::connection('nnc_db')->table('provinces')->get(['id', 'province']);
            return response()->json($provinces);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch provinces data. Please try again later.'], 500);
        }
    }

    public function getProvincesByRegion($regionId)
    {
        try {
            $provinces = DB::connection('nnc_db')->table('provinces')->where('region_id', $regionId)->get(['provcode', 'province']);
            return response()->json($provinces);
        } catch (\Exception $e) { 
            return response()->json(['error' => 'Failed to fetch provinces data. Please try again later.'], 500);
        }
    }

    public function getCitiesByProvince($provcode)
    {
        try {
            $cities = DB::connection('nnc_db')->table('cities')->where('provcode', $provcode)->get(['id','provcode', 'cityname']);
            return response()->json($cities);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch cities data. Please try again later.'], 500);
        }
    }    

    public function getRegions()
    {
        try {
            $regions = DB::connection('nnc_db')->table('regions')->get(['id', 'region']);
            return response()->json($regions);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch regions data. Please try again later.'], 500);
        }
    }


    public function index()
    {
        $users = User::get();
        
        //dd($users);
        return view('CentralAdmin.role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::get();
        return view('CentralAdmin.role-permission.user.create', ['roles' => $roles]);
        //return view('CentralAdmin.role-permission.user.create');
    }

    public function show(Request $request)
    {
        $users = User::find($request->id);
        $role = Role::get();
        $userstatus = DB::table('userstatus')->get();
        $userrequeststatus = DB::table('userrequeststatus')->get();

        $lnclocation = DB::table('users')
        ->join('mplgubrgylncmanagement', 'users.id', '=', 'mplgubrgylncmanagement.user_id')
        ->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')
        ->select('users.Firstname as firstname', 'users.Middlename as middlename', 'users.Lastname as lastname', 'mplgubrgylncmanagement.*')
        ->get();
        
        return view('CentralAdmin.role-permission.user.show', compact('users', 'role', 'userstatus', 'userrequeststatus'));
    }


    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            
            'Firstname' => 'required|string|max:255',
            'Middlename' => 'required|string|max:255',
            'Lastname' => 'required|string|max:255',
            'inputRegionNAO' => 'required|string|max:255',
            'inputProvinceNAO' => 'required|string|max:255',
            'inputCityNAO' => 'required|string|max:255',
            'agency_office_lgu' => 'required|string|max:255',
            'Division_unit' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20', 
            'status' => 'required|string|max:255',
        ]);

        $user = User::create([
                        'Firstname' => $request->Firstname,
                        'Middlename' => $request->Middlename,
                        'Lastname' => $request->Lastname,
                        'Region' => $request->inputRegionNAO,
                        'Province' => $request->inputProvinceNAO,
                        'city_municipal' => $request->inputCityNAO,
                        'agency_office_lgu' => $request->agency_office_lgu,
                        'Division_unit' => $request->Division_unit,
                        'role' => $request->role,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                    ]);
        
        //query fo r permissions
         $roles = DB::table('roles')->where('id', $request->role)->first();
        // dd($roles);
        $user->syncRoles($roles->name);

        return redirect('/adminusers')->with('status','User created successfully with roles');
    }

    public function edit(Request $request)
    {   //dd($_SERVER['REQUEST_URI']);
        $url = $_SERVER['REQUEST_URI'];

        // Split the URL by slashes
        $segments = explode('/', trim($url, '/'));
        //dd($segments[1]);

        $roles = Role::get();
        $users = User::findOrFail($segments[1]);
        //$userRoles = $user->roles->pluck('name','name')->all();
        return view('CentralAdmin.role-permission.user.edit', [
            'users' => $users,
            'roles' => $roles
         ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'Firstname' => 'required|string|max:255',
            'Middlename' => 'required|string|max:255',
            'Lastname' => 'required|string|max:255',
            'Region' => 'required|string|max:255',
            'Province' => 'required|string|max:255',
            'city_municipal' => 'required|string|max:255',
            'agency_office_lgu' => 'required|string|max:255',
            'Division_unit' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20', 
            'status' => 'required|string|max:255',
        ]);

                $data = [
                        'Firstname' => $request->Firstname,
                        'Middlename' => $request->Middlename,
                        'Lastname' => $request->Lastname,
                        'Region' => $request->Region,
                        'Province' => $request->Province,
                        'city_municipal' => $request->city_municipal,
                        'agency_office_lgu' => $request->agency_office_lgu,
                        'Division_unit' => $request->Division_unit,
                        'role' => $request->role,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);

        $roles = DB::table('roles')->where('id', $request->role)->first();
        $user->syncRoles($roles->name); 

        return redirect('/adminusers')->with('status','User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/adminusers')->with('status','User Delete Successfully');
    }

    public function changeuserstatus(Request $request)
    {
        // dd($request);
        $user = User::findOrFail($request->id);
  
        // DB::table('mplgubrgyvisionmissionstracking')->where('mplgubrgyvisionmissions_id', $request->id)->delete();
        // $lguprofile = MellpiproLGUBarangayVisionMission::find($request->id); 
        // $lguprofile->delete();
    
        $rules = [
            'role' => 'required|string',
            'designation' => 'required|string',
            'userrequest' => 'required|string',
            'hiddenuserstatus' => 'required|string',
        ];

        $message = [ 
            'required' => 'The field is required.',
            'integer' => 'The field is number.',
            'string' => 'The field must be a string.',
            'date' => 'The field must be a valid date.',
            'max' => 'The field may not be greater than :max characters.',
        ]; 

        $validator = Validator::make($request->all() , $rules, $message );

        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()->with('error', 'Something went wrong! Please try again.');
        }else {
            $user->update([
                'role' =>  $request->role,
                'designation' =>  $request->designation,
                'status' =>  $request->userrequest,
                'userstatus' =>  $request->hiddenuserstatus,
            ]);
        }
        
        return redirect()->route('CAadmin.show', ['id' => $request->id])->with('success','User data updated successfully!');
    }

    public function changepassword(Request $request)
    {
        $user = Auth::user();

        // // dd($request);
        // $user = User::findOrFail($request->id);
       
        // $validated = $request->validate([
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        // if (!Hash::check($validated['password'], $user->password)) {
        //     return back()->withErrors(['error' => 'Current password is incorrect']);
        //     dd('error!');
        // }

        // $user->password = Hash::make($validated['password']);
        // $user->save();

        $user = User::findOrFail($request->id);

        $rules = [
            'password' => 'required|string|min:8|confirmed',
        ];
        
        $messages = [ 
            'required' => 'The :attribute field is required.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->update([ 
            'password' => Hash::make($request->input('password'))
        ]);
        
        return redirect()->route('CAadmin.show', ['id' => $request->id])->with('success', 'User password updated successfully!');
    }


}