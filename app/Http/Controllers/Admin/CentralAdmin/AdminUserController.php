<?php

namespace App\Http\Controllers\Admin\CentralAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;  
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $userrole = DB::table('userroles')->get();
        return view('CentralAdmin.role-permission.user.create', compact('roles', 'userrole'));
        
    }

    public function store(Request $request)
    {
 
 
        $rules = [
            'Firstname' => 'required|string|max:255',
            'Middlename' => 'required|string|max:255',
            'Lastname' => 'required|string|max:255',
            'Region' => 'required|string|max:255',
            'Province' => 'required|string|max:255',
            'city_municipal' => 'required|string|max:255',
            'agency_office_lgu' => 'required|string|max:255',
            'Division_unit' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20', 
            'designation' => 'required|string ', 
            'userstatus' => 'required|integer ', 
            'status' => 'required|integer',
            'useractivestatus'=>'required|integer',
            'otherrole' => 'required|integer',
        ];

        $validator = Validator::make($request->all() , $rules);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }
    

        $user = User::create([
                        'Firstname' => $request->Firstname,
                        'Middlename' => $request->Middlename,
                        'Lastname' => $request->Lastname,
                        'Region' => $request->Region,
                        'Province' => $request->Province,
                        'barangay' => $request->barangay,
                        'city_municipal' => $request->city_municipal,
                        'agency_office_lgu' => $request->agency_office_lgu,
                        'Division_unit' => $request->Division_unit,
                        'role' => $request->role,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                        'designation' => $request->designation,
                        'userstatus' => $request->userstatus,
                        'useractivestatus' => $request->useractivestatus,
                        'otherrole' => $request->otherrole,
                    ]);
        
        //query fo r permissions
         //$roles = DB::table('roles')->where('id', $request->role)->first();
        // dd($roles);
        //$user->syncRoles($roles->name);

        return redirect('CentralAdmin/admin')->with('status','User created successfully with roles');
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

    public function show(Request $request)
    {   
     
        $userrequeststatus = DB::table('userrequeststatus')->get();
        $userstatus = DB::table('userstatus')->get();

        $user = User::find($request->id);
        // Barangay
        $barangay = DB::table('psgc_barangays')
        ->where('psgc_code', $user->barangay)
        ->select('psgc_barangays.name as name')
        ->first();
        //dd($barangay);

        // City
        $city = DB::table('psgc_cities')
        ->where('citymun_code', $user->city_municipal)
        ->select('psgc_cities.name as name')
        ->first();

        $municipal = DB::table('psgc_municipalities')
        ->where('citymun_code', $user->city_municipal)
        ->select('psgc_municipalities.name as name')
        ->first();

        $submunicipal = DB::table('psgc_sub_municipalities')
        ->where('citymun_code', $user->city_municipal)
        ->select('psgc_sub_municipalities.name as name')
        ->first();
        //dd($city);

        //Province
        $province = DB::table('psgc_provinces')
        ->where('prov_code', $user->Province)
        ->select('psgc_provinces.name as name')
        ->first();
        // dd($province);

        //Region
        $region = DB::table('psgc_regions')
        ->where('reg_code', $user->Region)
        ->select('psgc_regions.name as name')
        ->first();

        $users = User::findOrFail($request->id); 

        $userroles = DB::table('userroles')
        ->where('id', $user->otherrole)
        ->select('userroles.userrole as name')
        ->first(); 

        $userstatusActive = DB::table('userstatus')
        ->where('id', $user->useractivestatus)
        ->select('userstatus.status as status')
        ->first(); 

        // 1-11
        $userrole = DB::table('userroles')->get();
        $userstatus = DB::table('userrequeststatus')->get();
        $userActivestatus = DB::table('userstatus')->get();

        //$userRoles = $user->roles->pluck('name','name')->all();
        return view('CentralAdmin.role-permission.user.show',  compact('barangay','city','submunicipal','municipal','province','region','users','userrole', 'userroles','userrequeststatus','userstatus','userstatusActive','userActivestatus'));
    }

    public function update(Request $request, User $user)
    {
       
        $request->validate([
            'Firstname' => 'required|string|max:255',
            'Middlename' => 'required|string|max:255',
            'Lastname' => 'required|string|max:255',
            'Region' => 'required|string|max:255',
            'Province' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'city_municipal' => 'required|string|max:255',
            'agency_office_lgu' => 'required|string|max:255',
            'Division_unit' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'otherrole' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20', 
            'status' => 'required|string|max:255',
            'useractivestatus' => 'required|integer',
            'userstatus' => 'required|string|max:255',
        ]);

                $data = [
                        'Firstname' => $request->Firstname,
                        'Middlename' => $request->Middlename,
                        'Lastname' => $request->Lastname,
                        'Region' => $request->Region,
                        'Province' => $request->Province,
                        'barangay' => $request->barangay,
                        'city_municipal' => $request->city_municipal,
                        'agency_office_lgu' => $request->agency_office_lgu,
                        'Division_unit' => $request->Division_unit,
                        'designation' => $request->designation,
                        'role' => $request->role,
                        'otherrole' => $request->otherrole,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                        'useractivestatus' => $request->useractivestatus,
                        'userstatus' => $request->userstatus,
                ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);

        $roles = DB::table('otherrole')->where('id', $request->otherrole)->first();
        $user->syncRoles($roles->name); 

        return redirect('CentralAdmin/admin')->with('status','User Updated Successfully with roles');
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);

    
        return redirect('CentralAdmin/admin')->with('status','User Delete Successfully');
    }


    public function changeuserstatus(Request $request)
    {
        $user = User::findOrFail($request->id);
 

        $rules = [
            'otherrole' => 'required|string',
            'designation' => 'required|string',  
            'userrequest' => 'required|string',
            'hiddenuserstatus' => 'required|string', 
        ];
        $messages = [ 
            'required' => 'The :attribute field is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('error', 'Something went wrong! Please try again.');
        }

        
        // Update the password
        $user->update([ 
            'otherrole' => $request->otherrole,
            'designation' =>   $request->designation,
            'status' =>   $request->userrequest,
            'useractivestatus' =>   $request->hiddenuserstatus, 
        ]);

        return redirect('CentralAdmin/admin')->with('success','User Status Updated Successfully');

    }

    public function changepassword(Request $request)
    {

        $user = User::findOrFail($request->id);

        $request->validate([
            'password' => ['required','confirmed'], 
        ]);
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    
        return redirect('CentralAdmin/admin')->with('success','User Delete Successfully');
    }
}