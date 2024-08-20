<?php

namespace App\Http\Controllers\CityMunicipalStaff;

use Gate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;

class CMSProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */

     public function index()
     {      
        $user = Auth()->user();
         return view('BarangayScholar.Profile.index',['user' => $user]);
     }

    public function edit()
    {
        return view('BarangayScholar.Profile.edit');
    }


    
    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request, User $user)
    {
        $request->validate([
            'Firstname' => 'required|string|max:255',
            'Middlename' => 'required|string|max:255',
            'Lastname' => 'required|string|max:255',
            'Region' => 'required|string|max:255',
            'Province' => 'required|string|max:255',
            'city_municipal' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
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
            'barangay' => $request->barangay,
            'agency_office_lgu' => $request->agency_office_lgu,
            'Division_unit' => $request->Division_unit,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
    ];

 
    $user->update($data);
    $user->syncRoles($request->roles);

    return redirect('/profile')->with('status','Ypur profile updated Successfully with roles');
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function password(PasswordRequest $request)
    // {
    //     auth()->user()->update(['password' => Hash::make($request->get('password'))]);

    //     return back()->withPasswordStatus(__('Password successfully updated.'));
    // }
}
