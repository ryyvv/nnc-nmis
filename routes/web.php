<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LNCController;
use App\Http\Controllers\MellpiPro\MellpiProController;
use App\Http\Controllers\MellproLGUController;
use App\Http\Controllers\RequestPortalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\publicDashboardController;
use App\Http\Controllers\EquipmentInventoryController;
use App\Http\Controllers\NutritionOfficesController;
use App\Http\Controllers\PersonnelDnaDirectoryController;

// added
use App\Http\Controllers\CentralAdmin\PermissionController;
use App\Http\Controllers\CentralAdmin\RolesController;
use App\Http\Controllers\CentralAdmin\ProfileController;
use App\Http\Controllers\CentralAdmin\AdminUserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CentralAdmin\CADashboardController;
use App\Http\Controllers\CentralAdmin\FormsBuilderController; 
 
use App\Http\Controllers\CentralAdmin\FormFieldController;


use App\Http\Controllers\CentralOfficer\CODashboardController;

use App\Http\Controllers\CentralStaff\CSDashboardController;

use App\Http\Controllers\RegionalOfficer\RODashboardController;

use App\Http\Controllers\RegionalStaff\RSDashboardController;

use App\Http\Controllers\ProvincialOfficer\PODashboardController;

use App\Http\Controllers\ProvincialStaff\PSDashboardController;


// City-Municipal Staff
use App\Http\Controllers\CityMunicipalStaff\MellpiLGUProfileBarangayController;
use App\Http\Controllers\CityMunicipalStaff\DashboardController;
 


// BarangayScholar
use App\Http\Controllers\BarangayScholar\BSDashboardController;
use App\Http\Controllers\BarangayScholar\BSProfileController;
use App\Http\Controllers\BarangayScholar\BSLGUprofileController;
use App\Http\Controllers\BarangayScholar\VisionMissionController;
use App\Http\Controllers\BarangayScholar\NutritionPoliciesController;
use App\Http\Controllers\BarangayScholar\GovernanceController;
use App\Http\Controllers\BarangayScholar\NutritionServiceController;
use App\Http\Controllers\BarangayScholar\ChangeNSController;
use App\Http\Controllers\BarangayScholar\DiscussionQuestionController;
use App\Http\Controllers\BarangayScholar\BudgetAIPController;
use App\Http\Controllers\BarangayScholar\LNCManagementBarangayController;

use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_barangayController;
use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_barangayLGUController;
use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_form6Controller;
use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_form8Controller;
use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_InterviewController;
use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_OverallScoreController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormSubmissionController;
use Faker\Guesser\Name;

use function PHPSTORM_META\map;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');  
});



// Please Check
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// For review
Route::middleware('auth')->group(function () {
 
    // Forms samples
    Route::resource('forms', FormController::class);
    Route::post('forms/{form}/submissions', [FormSubmissionController::class, 'store'])->name('form-submissions.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // bulk upload - Ryan
    Route::get('/mellpi_pro_LGU' ,  [MellproLGUController::class, 'index'])->name('mellpi_pro_LGU.index');
    Route::post('/mellpi_pro_LGU' ,  [MellproLGUController::class, 'Regionupload'])->name('mellpi_pro_LGU.Regionupload');
    Route::post('/mellpi_pro_LGU/province' ,  [MellproLGUController::class, 'Provinceupload'])->name('mellpi_pro_LGU.Provinceupload');
    Route::post('/mellpi_pro_LGU/city' ,  [MellproLGUController::class, 'Cityupload'])->name('mellpi_pro_LGU.Cityupload');
    Route::post('/mellpi_pro_LGU/mun' ,  [MellproLGUController::class, 'Munupload'])->name('mellpi_pro_LGU.Munupload');
    Route::post('/mellpi_pro_LGU/brgy' ,  [MellproLGUController::class, 'Barangayupload'])->name('mellpi_pro_LGU.Barangayupload'); 
    
    // Melpi Pro Controller
    Route::get('/mellpi_pro', [MellpiProController::class, 'index'])->name('mellpi_pro.view');
    Route::post('/mellpi_pro' ,  [MellpiProController::class, 'upload'])->name('mellpi_pro.upload');
    Route::post('/mellpi_pro_create', [MellpiProController::class, 'create'])->name('mellpi_pro.create');
    Route::get('/mellpi_pro_summary1b', [MellpiProController::class, 'summary1b'])->name('mellpi_pro.summary1b');
    Route::get('/mellpi_pro_summary2b', [MellpiProController::class, 'summary2b'])->name('mellpi_pro.summary2b');
    Route::post('/mellpi_pro_store', [MellpiProController::class, 'store'])->name('mellpi_pro.store');

    //Route::get('/lncFunction' ,  [LNCController::class, 'index' ]->name('LNCIndex.view'));
    Route::resource('/lncFunction', LNCController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('/personnelDnaDirectoryIndex' ,[PersonnelDnaDirectoryController::class, 'index'])->name('personnelDnaDirectoryIndex');
    Route::get('/personnelDnaDirectory' ,[PersonnelDnaDirectoryController::class, 'create'])->name('personnelDnaDirectory.create');
    Route::post('/personnelDnaDirectory/nao' ,[PersonnelDnaDirectoryController::class, 'storeNAO'])->name('personnelDnaDirectory.storeNAO');
    Route::post('/personnelDnaDirectory/npc' ,[PersonnelDnaDirectoryController::class, 'storeNPC'])->name('personnelDnaDirectory.storeNPC');
    Route::post('/personnelDnaDirectory/bns' ,[PersonnelDnaDirectoryController::class, 'storeBNS'])->name('personnelDnaDirectory.storeBNS');

    Route::get('/nutritionOfficesIndex' ,[NutritionOfficesController::class, 'index'])->name('nutritionOfficesIndex');
    Route::get('/nutritionOffices', [NutritionOfficesController::class, 'create'])->name('nutritionOffices');
    Route::post('/nutritionOffices', [NutritionOfficesController::class, 'store'])->name('nutritionOffices.store');
    Route::get('/equipmentInventoryIndex' ,[EquipmentInventoryController::class, 'index'])->name('equipmentInventoryIndex');
    Route::get('/equipmentInventory' ,[EquipmentInventoryController::class, 'create'])->name('equipmentInventory');
    Route::post('/equipmentInventory', [EquipmentInventoryController::class, 'store'])->name('equipmentInventory.store');

    // action="{{ route('upload.csv') }}" 
    // ->name('upload.csv');

});

require __DIR__.'/auth.php';


Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@ind kex')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

	// Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
    // Route::get('users',[UserController::class,'index']);
    // Route::post('users', [UserController::class, 'store'])->name('users.store');

     
    Route::prefix('CentralAdmin')->middleware(['auth', 'CentralAdmin'])->group(function () {
    
        //=======================================================================================================================================================
        // Roles
        Route::GET('/roles', [RolesController::class, 'index'])->name('roles.index');
        Route::POST('/roles', [RolesController::class, 'store'])->name('roles.store');
        Route::GET('/roles/{id}/give-permission' ,[RolesController::class,'addPermissionToRole'])->name('roles.addPermissionToRole');
        Route::PUT('/roles/{id}/give-permission' ,[RolesController::class,'givePermissionToRole'])->name('roles.givePermissionToRole');
        Route::PUT('/roles/{id}' ,[RolesController::class,'update'])->name('roles.update');
        Route::GET('/roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
        Route::DELETE('/roles/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');

        // Permission 
        Route::GET('/permissions', [PermissionController::class, 'index'])->name('permission.index');
        Route::POST('/permissions', [PermissionController::class, 'store'])->name('permission.store');
        Route::PUT('/permissions/{permission}' ,[PermissionController::class,'update'])->name('permission.update');
        Route::GET('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::DELETE('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    
        //==========================================================================================================================================

        //AdminUser List Controller
        Route::get('/admin', [AdminUserController::class, 'index'])->name('CAadmin.index');
        Route::POST('/admin', [AdminUserController::class, 'store'])->name('CAadmin.store');
        Route::get('/admin/create', [AdminUserController::class, 'create'])->name('CAadmin.create');
        Route::get('/admin/{admin}', [AdminUserController::class, 'update'])->name('CAadmin.update');
        Route::get('/admin/{admin}/edit', [AdminUserController::class, 'create'])->name('CAadmin.edit');
        Route::get('/admin/{admin}', [AdminUserController::class, 'destroy'])->name('CAadmin.destroy');
       
        //DashboardController
        Route::get('/dashboard', [CADashboardController::class, 'index'])->name('CAdashboard.index');
        Route::POST('/dashboard', [CADashboardController::class, 'store'])->name('CAdashboard.store');
        Route::get('/dashboard/create', [CADashboardController::class, 'create'])->name('CAdashboard.create');
        Route::get('/dashboard/{admin}', [CADashboardController::class, 'update'])->name('CAdashboard.update');
        Route::get('/dashboard/{admin}/edit', [CADashboardController::class, 'edit'])->name('CAdashboard.edit');
        Route::DELETE('/dashboard/{admin}', [CADashboardController::class, 'destroy'])->name('CAdashboard.destroy');

        // // Userprofile
        Route::get('/profile', [ProfileController::class, 'index'])->name('CAprofile.index'); 
        Route::get('/profile/{profile}', [ProfileController::class, 'update'])->name('CAprofile.update');
        Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('CAprofile.edit'); 
        Route::PUT('/profile/password', [ProfileController::class, 'password'])->name('CAprofile.password');

        // forms Creator A
       Route::get('/formsb', [FormsBuilderController::class, 'index'])->name('formsb.index');
       Route::POST('/formsb', [FormsBuilderController::class, 'store'])->name('formsb.store');
       Route::get('/formsb/create', [FormsBuilderController::class, 'create'])->name('formsb.create');
       Route::PUT('/formsb/{id}', [FormsBuilderController::class, 'updateA'])->name('formsb.update');
       Route::get('/formsb/{id}/edit', [FormsBuilderController::class, 'edit'])->name('formsb.edit');
       Route::get('/formsb/{id}', [FormsBuilderController::class, 'destroy'])->name('formsb.destroy');
    
       // forms Creator B
       Route::get('/formsb/{id}/formslist', [FormsBuilderController::class, 'formIndex'])->name('formsb.formList');
       Route::get('/formsb/{id}/createForms', [FormsBuilderController::class, 'createForms'])->name('formsb.createForms');
       Route::POST('/formsb/{id}storeForm', [FormsBuilderController::class, 'storeFormB'])->name('formsb.storeFormB');
       Route::DELETE('/formsb/{id}/formslist/{idb}', [FormsBuilderController::class, 'destroyFormB'])->name('formsb.destroyFormB');
       
       // forms Creator C
       Route::get('/formsb/{id}/formslist/{idb}', [FormsBuilderController::class, 'ViewFields'])->name('formsb.fieldList');
       Route::get('/formsb/{id}/formslist/{idb}/createFormFields', [FormsBuilderController::class, 'createFormsFields'])->name('formsb.createFormsFields');
       
       Route::POST('/formsb/{id}storeForm/{idb}/formC', [FormsBuilderController::class, 'storeFormC'])->name('formsb.storeFormC');
       Route::DELETE('/formsb/{id}/formslist/{idb}', [FormsBuilderController::class, 'destroyFormB'])->name('formsb.destroyFormB');
    });

    Route::prefix('CentralOfficer')->middleware(['auth', 'CentralOfficer'])->group(function () {
         //UserProfile
        //DashboardController
        Route::get('/dashboard', [CODashboardController::class, 'index'])->name('COdashboard.index');
        Route::POST('/dashboard', [CODashboardController::class, 'store'])->name('COdashboard.store');
        Route::get('/dashboard/create', [CODashboardController::class, 'create'])->name('COdashboard.create');
        Route::get('/dashboard/{admin}', [CODashboardController::class, 'update'])->name('COdashboard.update');
        Route::get('/dashboard/{admin}/edit', [CODashboardController::class, 'create'])->name('COdashboard.edit');
        Route::DELETE('/dashboard/{admin}', [CODashboardController::class, 'destroy'])->name('COdashboard.destroy');

        //AdminUserController
        Route::get('/admin', [AdminUserController::class, 'index'])->name('COadmin.index');
        Route::POST('/admin', [AdminUserController::class, 'store'])->name('COadmin.store');
        Route::get('/admin/create', [AdminUserController::class, 'create'])->name('COadmin.create');
        Route::get('/admin/{admin}', [AdminUserController::class, 'update'])->name('COadmin.update');
        Route::get('/admin/{admin}/edit', [AdminUserController::class, 'create'])->name('COadmin.edit');
        Route::get('/admin/{admin}', [AdminUserController::class, 'destroy'])->name('COadmin.destroy');
        

    });

    Route::prefix('CentralStaff')->middleware(['auth', 'CentralStaff'])->group(function () {
        //UserProfile
        //DashboardController 
        Route::get('/dashboard', [CSDashboardController::class, 'index'])->name('CSdashboard.index');
        Route::POST('/dashboard', [CSDashboardController::class, 'store'])->name('CSdashboard.store');
        Route::get('/dashboard/create', [CSDashboardController::class, 'create'])->name('CSdashboard.create');
        Route::get('/dashboard/{admin}', [CSDashboardController::class, 'update'])->name('CSdashboard.update');
        Route::get('/dashboard/{admin}/edit', [CSDashboardController::class, 'create'])->name('CSdashboard.edit');
        Route::DELETE('/dashboard/{admin}', [CSDashboardController::class, 'destroy'])->name('CSdashboard.destroy');


    });

    Route::prefix('RegionalOfficer')->middleware(['auth', 'RegionalOfficer'])->group(function () {
        
               //DashboardController
               Route::get('/dashboard', [RODashboardController::class, 'index'])->name('ROdashboard.index');
               Route::POST('/dashboard', [RODashboardController::class, 'store'])->name('ROdashboard.store');
               Route::get('/dashboard/create', [RODashboardController::class, 'create'])->name('ROdashboard.create');
               Route::get('/dashboard/{admin}', [RODashboardController::class, 'update'])->name('ROdashboard.update');
               Route::get('/dashboard/{admin}/edit', [RODashboardController::class, 'create'])->name('ROdashboard.edit');
               Route::DELETE('/dashboard/{admin}', [RODashboardController::class, 'destroy'])->name('ROdashboard.destroy');

    });

    Route::prefix('RegionalStaff')->middleware(['auth', 'RegionalStaff'])->group(function () {

        //DashboardController
        Route::get('/dashboard', [RSDashboardController::class, 'index'])->name('RSdashboard.index');
        Route::POST('/dashboard', [RSDashboardController::class, 'store'])->name('RSdashboard.store');
        Route::get('/dashboard/create', [RSDashboardController::class, 'create'])->name('RSdashboard.create');
        Route::get('/dashboard/{admin}', [RSDashboardController::class, 'update'])->name('RSdashboard.update');
        Route::get('/dashboard/{admin}/edit', [RSDashboardController::class, 'create'])->name('RSdashboard.edit');
        Route::DELETE('/dashboard/{admin}', [RSDashboardController::class, 'destroy'])->name('RSdashboard.destroy');

        //AdminUserController
        // Route::get('/admin', [AdminUserController::class, 'index'])->name('admin.index');
        // Route::POST('/admin', [AdminUserController::class, 'store'])->name('admin.store');
        // Route::get('/admin/create', [AdminUserController::class, 'create'])->name('admin.create');
        // Route::get('/admin/{admin}', [AdminUserController::class, 'update'])->name('admin.update');
        // Route::get('/admin/{admin}/edit', [AdminUserController::class, 'create'])->name('admin.edit');
        // Route::get('/admin/{admin}', [AdminUserController::class, 'destroy'])->name('admin.destroy');

    });

    Route::prefix('ProvincialOfficer')->middleware(['auth', 'ProvincialOfficer'])->group(function () {
        
          //DashboardController
          Route::get('/dashboard', [PODashboardController::class, 'index'])->name('POdashboard.index');
          Route::POST('/dashboard', [PODashboardController::class, 'store'])->name('POdashboard.store');
          Route::get('/dashboard/create', [PODashboardController::class, 'create'])->name('POdashboard.create');
          Route::get('/dashboard/{admin}', [PODashboardController::class, 'update'])->name('POdashboard.update');
          Route::get('/dashboard/{admin}/edit', [PODashboardController::class, 'create'])->name('POdashboard.edit');
          Route::DELETE('/dashboard/{admin}', [PODashboardController::class, 'destroy'])->name('POdashboard.destroy');
        
        //AdminUserController
        // Route::get('/admin', [AdminUserController::class, 'index'])->name('admin.index');
        // Route::POST('/admin', [AdminUserController::class, 'store'])->name('admin.store');
        // Route::get('/admin/create', [AdminUserController::class, 'create'])->name('admin.create');
        // Route::get('/admin/{admin}', [AdminUserController::class, 'update'])->name('admin.update');
        // Route::get('/admin/{admin}/edit', [AdminUserController::class, 'create'])->name('admin.edit');
        // Route::get('/admin/{admin}', [AdminUserController::class, 'destroy'])->name('admin.destroy');

    });

    Route::prefix('ProvincialStaff')->middleware(['auth', 'ProvincialStaff'])->group(function () {
        
            //DashboardController
            Route::get('/dashboard', [PSDashboardController::class, 'index'])->name('PSdashboard.index');
            Route::POST('/dashboard', [PSDashboardController::class, 'store'])->name('PSdashboard.store');
            Route::get('/dashboard/create', [PSDashboardController::class, 'create'])->name('PSdashboard.create');
            Route::get('/dashboard/{admin}', [PSDashboardController::class, 'update'])->name('PSdashboard.update');
            Route::get('/dashboard/{admin}/edit', [PSDashboardController::class, 'create'])->name('PSdashboard.edit');
            Route::DELETE('/dashboard/{admin}', [PSDashboardController::class, 'destroy'])->name('PSdashboard.destroy');
        
        //AdminUserController
        // Route::get('/admin', [AdminUserController::class, 'index'])->name('admin.index');
        // Route::POST('/admin', [AdminUserController::class, 'store'])->name('admin.store');
        // Route::get('/admin/create', [AdminUserController::class, 'create'])->name('admin.create');
        // Route::get('/admin/{admin}', [AdminUserController::class, 'update'])->name('admin.update');
        // Route::get('/admin/{admin}/edit', [AdminUserController::class, 'create'])->name('admin.edit');
        // Route::get('/admin/{admin}', [AdminUserController::class, 'destroy'])->name('admin.destroy');

    });
    Route::prefix('CityMunicipalStaff')->middleware(['auth', 'CityMunicipalStaff'])->group(function () {

        // DashBoard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('CMSdashboard.index');

        //LGUProfileController
        Route::get('/lguProfile/fetchreport', [MellpiLGUProfileBarangayController::class, 'fetchReport'])->name('CMSLGUprofile.fetch');
        Route::get('/lguProfile/report', [MellpiLGUProfileBarangayController::class, 'report'])->name('CMSLGUprofile.report');
        Route::get('/lguProfile', [MellpiLGUProfileBarangayController::class, 'index'])->name('CMSLGUprofile.index');
        Route::get('/lguProfile/{id}/show', [MellpiLGUProfileBarangayController::class, 'show'])->name('CMSLGUprofile.show');
        Route::get('/lguProfile/create', [MellpiLGUProfileBarangayController::class, 'create'])->name('CMSLGUprofile.create');
        Route::POST('/lguProfile/approved', [MellpiLGUProfileBarangayController::class, 'approvedReport'])->name('CMSLGUprofile.approved');
        Route::POST('/lguProfile/declined', [MellpiLGUProfileBarangayController::class, 'Declined'])->name('CMSLGUprofile.declined');

        //VisionMissionController
        Route::get('/visionmission/fetchreport', [VisionMissionController::class, 'fetchReport'])->name('visionmission.fetch');
        Route::get('/visionmission/report', [VisionMissionController::class, 'report'])->name('visionmission.report');
        
        Route::get('/visionmission', [VisionMissionController::class, 'index'])->name('visionmission.index');
        Route::POST('/visionmission', [VisionMissionController::class, 'store'])->name('visionmission.store');
        Route::get('/visionmission/create', [VisionMissionController::class, 'create'])->name('visionmission.create');  
        Route::get('/visionmission/{id}/show', [VisionMissionController::class, 'show'])->name('visionmission.show'); 
        Route::POST('/visionmission/approved', [VisionMissionController::class, 'approvedReport'])->name('visionmission.approved');
        Route::POST('/visionmission/declined', [VisionMissionController::class, 'Declined'])->name('visionmission.declined');
         

    });

    Route::prefix('BarangayScholar')->middleware(['auth', 'BarangayScholar'])->group(function () {
          //DashboardController
          Route::get('/dashboard', [BSDashboardController::class, 'index'])->name('BSdashboard.index');
          Route::POST('/dashboard', [BSDashboardController::class, 'store'])->name('BSdashboard.store');
          Route::get('/dashboard/create', [BSDashboardController::class, 'create'])->name('BSdashboard.create');
          Route::get('/dashboard/{admin}', [BSDashboardController::class, 'update'])->name('BSdashboard.update');
          Route::get('/dashboard/{admin}/edit', [BSDashboardController::class, 'create'])->name('BSdashboard.edit');
          Route::DELETE('/dashboard/{admin}', [BSDashboardController::class, 'destroy'])->name('BSdashboard.destroy');
        
          // // Userprofile
          Route::get('/profile', [BSProfileController::class, 'index'])->name('BSprofile.index'); 
          Route::get('/profile/{profile}', [BSProfileController::class, 'update'])->name('BSprofile.update');
          Route::get('/profile/{profile}/edit', [BSProfileController::class, 'edit'])->name('BSprofile.edit'); 
          Route::PUT('/profile/password', [BSProfileController::class, 'password'])->name('BSprofile.password');
        
          //LGUProfileController
          Route::get('/lguprofile', [BSLGUprofileController::class, 'index'])->name('BSLGUprofile.index');
          //Route::POST('/lguprofile', [BSLGUprofileController::class, 'storeDraft'])->name('BSLGUprofile.storeDraft');
          Route::get('/lguprofile/{id}/show', [BSLGUprofileController::class, 'show'])->name('BSLGUprofile.show');
          Route::POST('/lguprofile', [BSLGUprofileController::class, 'storeSubmit'])->name('BSLGUprofilest.storeSubmit');
          Route::get('/lguprofile/create', [BSLGUprofileController::class, 'create'])->name('BSLGUprofile.create');
          Route::put('/lguprofile/{id}', [BSLGUprofileController::class, 'update'])->name('BSLGUprofile.update');
          Route::get('/lguprofile/{id}/edit', [BSLGUprofileController::class, 'edit'])->name('BSLGUprofile.edit');
          Route::POST('/lguprofile/delete', [BSLGUprofileController::class, 'destroy'])->name('BSLGUprofile.destroy');  
          //LGU Profile Downloadable
          Route::POST('/lguprofile/{id}/download-pdf',[BSLGUprofileController::class , 'downloads'])->name('BSLGUprofile.download');


        //VisionMissionController
        Route::get('/visionmission', [VisionMissionController::class, 'index'])->name('visionmission.index');
        Route::POST('/visionmission', [VisionMissionController::class, 'store'])->name('visionmission.store');
        Route::get('/visionmission/create', [VisionMissionController::class, 'create'])->name('visionmission.create');
        Route::put('/visionmission/{id}', [VisionMissionController::class, 'update'])->name('visionmission.update');
        Route::get('/visionmission/{id}/edit', [VisionMissionController::class, 'edit'])->name('visionmission.edit');
        Route::post('/visionmission/delete', [VisionMissionController::class, 'destroy'])->name('visionmission.destroy');  
        Route::get('/visionmission/{id}/show', [VisionMissionController::class, 'show'])->name('visionmission.show');
        Route::POST('/visionmission/{id}/download-pdf',[VisionMissionController::class , 'downloads'])->name('visionmission.download');


        //NutritionPoliciesController
        Route::get('/nutritionpolicies', [NutritionPoliciesController::class, 'index'])->name('nutritionpolicies.index');
        Route::POST('/nutritionpolicies', [NutritionPoliciesController::class, 'store'])->name('nutritionpolicies.store');
        Route::get('/nutritionpolicies/create', [NutritionPoliciesController::class, 'create'])->name('nutritionpolicies.create');
        Route::put('/nutritionpolicies/{id}', [NutritionPoliciesController::class, 'update'])->name('nutritionpolicies.update');
        Route::get('/nutritionpolicies/{id}/edit', [NutritionPoliciesController::class, 'edit'])->name('nutritionpolicies.edit');
        Route::POST('/nutritionpolicies/delete', [NutritionPoliciesController::class, 'destroy'])->name('nutritionpolicies.destroy');  
        Route::get('/nutritionpolicies/{id}/show', [NutritionPoliciesController::class, 'show'])->name('nutritionpolicies.show');
        Route::POST('/nutritionpolicies/{id}/download-pdf',[NutritionPoliciesController::class , 'downloads'])->name('nutritionpolicies.download');


        //GovernanceController
        Route::get('/governance', [GovernanceController::class, 'index'])->name('governance.index');
        Route::POST('/governance', [GovernanceController::class, 'store'])->name('governance.store');
        Route::get('/governance/create', [GovernanceController::class, 'create'])->name('governance.create');
        Route::put('/governance/{id}', [GovernanceController::class, 'update'])->name('governance.update');
        Route::get('/governance/{id}/edit', [GovernanceController::class, 'edit'])->name('governance.edit');
        Route::POST('/governance/delete', [GovernanceController::class, 'destroy'])->name('governance.destroy');  
        Route::get('/governance/{id}/show', [GovernanceController::class, 'show'])->name('governance.show');
        Route::POST('/governance/{id}/download-pdf',[GovernanceController::class , 'downloads'])->name('governance.download');

        //NutritionServicesController
        Route::get('/lncmanagement', [LNCManagementBarangayController::class, 'index'])->name('lncmanagement.index');
        Route::POST('/lncmanagement', [LNCManagementBarangayController::class, 'store'])->name('lncmanagement.store');
        Route::get('/lncmanagement/create', [LNCManagementBarangayController::class, 'create'])->name('lncmanagement.create');
        Route::put('/lncmanagement/{id}', [LNCManagementBarangayController::class, 'update'])->name('lncmanagement.update');
        Route::get('/lncmanagement/{id}/edit', [LNCManagementBarangayController::class, 'edit'])->name('lncmanagement.edit');
        Route::POST('/lncmanagement/delete', [LNCManagementBarangayController::class, 'destroy'])->name('lncmanagement.destroy');  
        Route::get('/lncmanagement/{id}/show', [LNCManagementBarangayController::class, 'show'])->name('lncmanagement.show');
        Route::POST('/lncmanagement/{id}/download-pdf',[LNCManagementBarangayController::class , 'downloads'])->name('lncmanagement.download');


        //NutritionServicesController
        Route::get('/nutritionservice', [NutritionServiceController::class, 'index'])->name('nutritionservice.index');
        Route::POST('/nutritionservice', [NutritionServiceController::class, 'store'])->name('nutritionservice.store');
        Route::get('/nutritionservice/create', [NutritionServiceController::class, 'create'])->name('nutritionservice.create');
        Route::put('/nutritionservice/{id}', [NutritionServiceController::class, 'update'])->name('nutritionservice.update');
        Route::get('/nutritionservice/{id}/edit', [NutritionServiceController::class, 'edit'])->name('nutritionservice.edit');
        Route::DELETE('/nutritionservice/{id}', [NutritionServiceController::class, 'destroy'])->name('nutritionservice.destroy');  


           //ChangeNSController
           Route::get('/changeNS', [ChangeNSController::class, 'index'])->name('changeNS.index');
           Route::POST('/changeNS', [ChangeNSController::class, 'store'])->name('changeNS.store');
           Route::get('/changeNS/create', [ChangeNSController::class, 'create'])->name('changeNS.create');
           Route::put('/changeNS/{id}', [ChangeNSController::class, 'update'])->name('changeNS.update');
           Route::get('/changeNS/{id}/edit', [ChangeNSController::class, 'edit'])->name('changeNS.edit');
           Route::DELETE('/changeNS/{id}', [ChangeNSController::class, 'destroy'])->name('changeNS.destroy');  
   
           //DiscussionQuestionController
           Route::get('/discussionquestion', [DiscussionQuestionController::class, 'index'])->name('discussionquestion.index');
           Route::POST('/discussionquestion', [DiscussionQuestionController::class, 'store'])->name('discussionquestion.store');
           Route::get('/discussionquestion/create', [DiscussionQuestionController::class, 'create'])->name('discussionquestion.create');
           Route::put('/discussionquestion/{id}', [DiscussionQuestionController::class, 'update'])->name('discussionquestion.update');
           Route::get('/discussionquestion/{id}/edit', [DiscussionQuestionController::class, 'edit'])->name('discussionquestion.edit');
           Route::DELETE('/discussionquestion/{id}', [DiscussionQuestionController::class, 'destroy'])->name('discussionquestion.destroy');  
           Route::get('/discussionquestion/{id}/show', [DiscussionQuestionController::class, 'show'])->name('discussionquestion.show');


           //BudgetController
           Route::get('/budgetAIP', [BudgetAIPController::class, 'index'])->name('budgetAIP.index');
           Route::POST('/budgetAIP', [BudgetAIPController::class, 'store'])->name('budgetAIP.store');
           Route::get('/budgetAIP/create', [BudgetAIPController::class, 'create'])->name('budgetAIP.create');
           Route::put('/budgetAIP/{id}', [BudgetAIPController::class, 'update'])->name('budgetAIP.update');
           Route::get('/budgetAIP/{id}/edit', [BudgetAIPController::class, 'edit'])->name('budgetAIP.edit');
           Route::DELETE('/budgetAIP/{id}', [BudgetAIPController::class, 'destroy'])->name('budgetAIP.destroy');  


          //Mellpi pro for LNFP
          //LGU Profile
          Route::get('/lguprofilelnfp', [MellpiProForLNFP_barangayLGUController::class, 'index'])->name('BSLGUprofileLNFPIndex.index');
          Route::get('/lguprofilelnfpCreate', [MellpiProForLNFP_barangayLGUController::class, 'mellpiProLNFP_LGUcreate'])->name('MellpiProForLNFPCreate.create');
          Route::post('/lguprofileLnfpSubmit', [MellpiProForLNFP_barangayLGUController::class, 'storeSubmit'])->name('MellpiProForLNFPSubmit.storeSubmit');
          Route::post('/lguprofileLnfpUpdate/{id}', [MellpiProForLNFP_barangayLGUController::class, 'storeUpdate'])->name('MellpiProForLNFPUpdate.storeUpdate');
          Route::get('/lguLnfpDeleteProfile/{id}', [MellpiProForLNFP_barangayLGUController::class, 'deleteLNFP_lguprofile'])->name('lguLnfpDeleteProfile');
          Route::get('/lguLnfpEditprofile/{id}', [MellpiProForLNFP_barangayLGUController::class, 'mellpiProLNFP_LGUedit'])->name('lguLnfpEditProfile');

          //Form 5 Monitoring
          Route::get('/lguform5Index', [MellpiProForLNFP_barangayController::class, 'monitoringForm5'])->name('MellpiProMonitoringIndex.index');
          Route::get('/lguform5Create', [MellpiProForLNFP_barangayController::class, 'monitoringForm5create'])->name(('MellpiProMonitoringCreate.create'));
          Route::post('/lguLnfpUpdate/{id}', [MellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdate');
          Route::post('/lguLnfpUpdate', [MellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdates');
          Route::put('/lguLnfpUpdate', [MellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdateRemarks');
          Route::POST('/lguLnfpDelete', [MellpiProForLNFP_barangayController::class, 'deleteForm5arr'])->name('lguLnfpDeleteForm5a');
          Route::get('/lguLnfpEdit/{id}', [MellpiProForLNFP_barangayController::class, 'monitoringForm5edit'])->name('lguLnfpEdit');
          //Form 6 Radial Diagram
          Route::get('/lguform6Index', [MellpiProForLNFP_form6Controller::class, 'radialForm6'])->name('MellpiProRadialIndex.index');
          Route::get('lguform6Create', [MellpiProForLNFP_form6Controller::class, 'radialForm6Create'])->name('MellpiProRadialCreate.create');
          Route::get('/lguform6Edit/{id}', [MellpiProForLNFP_form6Controller::class, 'radialForm6Create'])->name('lguLnfpEditForm6');
        //   Route::post('/lguform7Update/{id}', [MellpiProForLNFP_form6Controller::class, 'storeform7'])->name('lnfpUpdateform7');
        Route::post('BarangayScholar/lguform7Update/{id}', [MellpiProForLNFP_form6Controller::class, 'storeform7'])->name('lnfpUpdateform7');
        //Form 8 Action Sheet
        Route::get('/lguform8Index', [MellpiProForLNFP_form8Controller::class, 'ActionSheetForm8'])->name('lnfpForm8Index');
        Route::get('/lguform8Create', [MellpiProForLNFP_form8Controller::class, 'ActionSheetForm8Create'])->name('lnfpForm8Create');
        Route::post('/lguform8Store', [MellpiProForLNFP_form8Controller::class, 'storeASForm8'])->name('lnfpForm8Store');
        Route::get('/lguLnfpDeleteForm8/{id}', [MellpiProForLNFP_form8Controller::class, 'deleteForm8'])->name('deleteForm8');
        Route::get('/lguLnfpEditForm8/{id}', [MellpiProForLNFP_form8Controller::class, 'ActionSheetForm8Edit'])->name('editForm8');
        Route::post('/lguLnfpUpdateForm8/{id}', [MellpiProForLNFP_form8Controller::class, 'storeUpdateASForm8'])->name('MellpiProForLNFPUpdate.storeUpdateASForm8');
        //Interview Form
        Route::get('/lguformInterviewIndex', [MellpiProForLNFP_InterviewController::class, 'InterviewFormLNFP'])->name('lnfpFormInterviewIndex');
        Route::get('/lguformInterviewCreate', [MellpiProForLNFP_InterviewController::class, 'InterviewFormLNFPCreate'])->name('lnfpFormInterviewCreate');
        Route::post('/lguLnfpInterviewStore', [MellpiProForLNFP_InterviewController::class, 'storeInterviewForm'])->name('lnfpInterviewStore');
        Route::get('/lguLnfpDeleteInterview/{id}', [MellpiProForLNFP_InterviewController::class, 'deleteIntForm'])->name('deleteIntForm');
        Route::get('/lguLnfpEditInterview/{id}', [MellpiProForLNFP_InterviewController::class, 'InterviewFormLNFPEdit'])->name('editIntForm');
        Route::post('/lguLnfpUpdateInterview/{id}', [MellpiProForLNFP_InterviewController::class, 'storeInterviewFormUpdate'])->name('MellpiProForLNFPUpdate.storeUpdateIntForm');
        //Overall Score
        Route::get('/lguformOverallScoreIndex', [MellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFP'])->name('lnfpFormOverallScoreIndex');
        Route::get('/lguLnfpOverallScoreCreate', [MellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFPCreate'])->name('lnfpFormOverallScoreCreate');

    });

    Route::prefix('PublicUser')->middleware(['auth', 'PublicUser'])->group(function () {
        // userProfile and history download only
        //AdminUserController
        // Route::get('/admin', [AdminUserController::class, 'index'])->name('COadmin.index');
        // Route::POST('/admin', [AdminUserController::class, 'store'])->name('COadmin.store');
        // Route::get('/admin/create', [AdminUserController::class, 'create'])->name('COadmin.create');
        // Route::get('/admin/{admin}', [AdminUserController::class, 'update'])->name('COadmin.update');
        // Route::get('/admin/{admin}/edit', [AdminUserController::class, 'create'])->name('COadmin.edit');
        // Route::get('/admin/{admin}', [AdminUserController::class, 'destroy'])->name('COadmin.destroy');

    });

});

// Route::get('/UserDashboard',[DashboardController::class,'index'])->name('accountDashboard');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/request-portal', [RequestPortalController::class, 'index'])->name('requestportal.view');
Route::get('/publicDashboard', [publicDashboardController::class, 'index'])->name('guest');

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/provinces/{region}', [AdminUserController::class, 'getProvincesByRegion'])->name('admin.provinces.byRegion.get');
    Route::get('/cities/{provcode}', [AdminUserController::class, 'getCitiesByProvince'])->name('admin.cities.byProvince.get');
    Route::get('/regions', [AdminUserController::class, 'getRegions'])->name('admin.regions.get');
});

// Equipment Inventory
Route::prefix('equipment')->group(function () {
    Route::get('/provinces/{region}', [EquipmentInventoryController::class, 'getProvincesByRegion'])->name('equipment.provinces.byRegion.get');
    Route::get('/cities/{provcode}', [EquipmentInventoryController::class, 'getCitiesByProvince'])->name('equipment.cities.byProvince.get');
    Route::get('/regions', [EquipmentInventoryController::class, 'getRegions'])->name('equipment.regions.get');
});

// Mellpi
Route::prefix('mellpi')->group(function () {
    Route::get('/regions', [MellpiProController::class, 'getRegions'])->name('mellpi.regions.get');
    Route::get('/provinces/{region}', [MellpiProController::class, 'getProvinces'])->name('mellpi.provinces.get');
    Route::get('/cities/{province}', [MellpiProController::class, 'getCities'])->name('mellpi.cities.get');
});

// Personnel DNA Directory
Route::prefix('personneldnadirectory')->group(function () {
    Route::get('/provinces/{region}', [PersonnelDnaDirectoryController::class, 'getProvincesByRegion'])->name('personneldnadirectory.provinces.byRegion.get');
    Route::get('/cities/{provcode}', [PersonnelDnaDirectoryController::class, 'getCitiesByProvince'])->name('personneldnadirectory.cities.byProvince.get');
    Route::get('/regions', [PersonnelDnaDirectoryController::class, 'getRegions'])->name('personneldnadirectory.regions.get');
});

// Register
Route::get('/provinces/{region}', [RegisterController::class, 'getProvincesByRegion'])->name('provinces.byRegion.get');
Route::get('/barangays/{city}', [RegisterController::class, 'getBarangays'])->name('barangays.get');
Route::get('/cities/{provcode}', [RegisterController::class, 'getCitiesByProvince'])->name('cities.byProvince.get');
Route::get('/regions', [RegisterController::class, 'getRegions'])->name('regions.get');

