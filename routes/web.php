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

// City-Municipal Officer
use App\Http\Controllers\CityMunicipalOfficer\CMODashboardController;
use App\Http\Controllers\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayController;
use App\Http\Controllers\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayBudgetAIPController;
use App\Http\Controllers\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayChangeNSController;
use App\Http\Controllers\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayDiscussionQuestionController;
use App\Http\Controllers\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayGovernanceController;
use App\Http\Controllers\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayLNCMagementController;
use App\Http\Controllers\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayNutritionPoliciesController;
use App\Http\Controllers\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayVisionMissionController;



// City-Municipal Staff
use App\Http\Controllers\CityMunicipalStaff\CMSDashboardController;
use App\Http\Controllers\CityMunicipalStaff\CMSProfileController;
use App\Http\Controllers\CityMunicipalStaff\CMSLGUprofileController;
use App\Http\Controllers\CityMunicipalStaff\CMSVisionMissionController;
use App\Http\Controllers\CityMunicipalStaff\CMSNutritionPoliciesController;
use App\Http\Controllers\CityMunicipalStaff\CMSGovernanceController;
use App\Http\Controllers\CityMunicipalStaff\CMSNutritionServiceController;
use App\Http\Controllers\CityMunicipalStaff\CMSChangeNSController;
use App\Http\Controllers\CityMunicipalStaff\CMSDiscussionQuestionController;
use App\Http\Controllers\CityMunicipalStaff\CMSBudgetAIPController;
use App\Http\Controllers\CityMunicipalStaff\CMSLNCManagementBarangayController;

use App\Http\Controllers\CityMunicipalStaff\CMSMellpiProForLNFP_barangayController;
use App\Http\Controllers\CityMunicipalStaff\CMSMellpiProForLNFP_barangayLGUController;
use App\Http\Controllers\CityMunicipalStaff\CMSMellpiProForLNFP_form6Controller;
use App\Http\Controllers\CityMunicipalStaff\CMSMellpiProForLNFP_form8Controller;
use App\Http\Controllers\CityMunicipalStaff\CMSMellpiProForLNFP_InterviewController;
use App\Http\Controllers\CityMunicipalStaff\CMSMellpiProForLNFP_OverallScoreController;
 


// BarangayScholar
// use App\Http\Controllers\BarangayScholar\BSDashboardController;
// use App\Http\Controllers\BarangayScholar\BSProfileController;
// use App\Http\Controllers\BarangayScholar\BSLGUprofileController;
// use App\Http\Controllers\BarangayScholar\VisionMissionController;
// use App\Http\Controllers\BarangayScholar\NutritionPoliciesController;
// use App\Http\Controllers\BarangayScholar\GovernanceController;
// use App\Http\Controllers\BarangayScholar\NutritionServiceController;
// use App\Http\Controllers\BarangayScholar\ChangeNSController;
// use App\Http\Controllers\BarangayScholar\DiscussionQuestionController;
// use App\Http\Controllers\BarangayScholar\BudgetAIPController;
// use App\Http\Controllers\BarangayScholar\LNCManagementBarangayController;

// use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_barangayController;
// use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_barangayLGUController;
// use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_form6Controller;
// use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_form8Controller;
// use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_InterviewController;
// use App\Http\Controllers\BarangayScholar\MellpiProForLNFP_OverallScoreController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormSubmissionController;
use App\Http\Controllers\UserController\UserReviewController as UserControllerUserReviewController;
use Faker\Guesser\Name;

Use App\Http\Controllers\UserUnderReview\UserReviewController;

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

    //Nutrition Office
    Route::get('/nutritionOfficesIndex' ,[NutritionOfficesController::class, 'index'])->name('nutritionOfficesIndex');
    Route::get('/nutritionOffices', [NutritionOfficesController::class, 'create'])->name('nutritionOffices');
    Route::post('/nutritionOffices', [NutritionOfficesController::class, 'store'])->name('nutritionOffices.store');
    Route::get('/equipmentInventoryIndex' ,[EquipmentInventoryController::class, 'index'])->name('equipmentInventoryIndex');
    Route::get('/equipmentInventory' ,[EquipmentInventoryController::class, 'create'])->name('equipmentInventory');
    Route::post('/equipmentInventory', [EquipmentInventoryController::class, 'store'])->name('equipmentInventory.store');
  
    Route::get('/nutriOfficeIndex', [NutritionOfficesController::class, 'nutriOfficeIndex'])->name('nutriOfficeIndex');

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

    Route::prefix('CityMunicipalOfficer')->middleware(['auth', 'CityMunicipalOfficer'])->group(function () {

        // DashBoard
        Route::get('/dashboard', [CMODashboardController::class, 'index'])->name('CMOdashboard.index');

        //LGUProfileController
        Route::get('/lguProfile/fetchreport', [CMOMellpiLGUProfileBarangayController::class, 'fetchReport'])->name('CMOLGUprofile.fetch');
        Route::get('/lguProfile/report', [CMOMellpiLGUProfileBarangayController::class, 'report'])->name('CMOLGUprofile.report');
        Route::get('/lguProfile', [CMOMellpiLGUProfileBarangayController::class, 'index'])->name('CMOLGUprofile.index');
        Route::get('/lguProfile/{id}/show', [CMOMellpiLGUProfileBarangayController::class, 'show'])->name('CMOLGUprofile.show');
        Route::get('/lguProfile/create', [CMOMellpiLGUProfileBarangayController::class, 'create'])->name('CMOLGUprofile.create');
        Route::POST('/lguProfile/approved', [CMOMellpiLGUProfileBarangayController::class, 'approvedReport'])->name('CMOLGUprofile.approved');
        Route::POST('/lguProfile/declined', [CMOMellpiLGUProfileBarangayController::class, 'Declined'])->name('CMOLGUprofile.declined');

        //VisionMissionController
        Route::get('/visionmission/fetchreport', [CMOMellpiLGUProfileBarangayVisionMissionController::class, 'fetchReport'])->name('CMOvisionmission.fetch');
        Route::get('/visionmission/report', [CMOMellpiLGUProfileBarangayVisionMissionController::class, 'report'])->name('CMOvisionmission.report');
        Route::get('/visionmission', [CMOMellpiLGUProfileBarangayVisionMissionController::class, 'index'])->name('CMOvisionmission.index');
        Route::POST('/visionmission', [CMOMellpiLGUProfileBarangayVisionMissionController::class, 'store'])->name('CMOvisionmission.store');
        Route::get('/visionmission/create', [CMOMellpiLGUProfileBarangayVisionMissionController::class, 'create'])->name('CMOvisionmission.create');  
        Route::get('/visionmission/{id}/show', [CMOMellpiLGUProfileBarangayVisionMissionController::class, 'show'])->name('CMOvisionmission.show'); 
        Route::POST('/visionmission/approved', [CMOMellpiLGUProfileBarangayVisionMissionController::class, 'approvedReport'])->name('CMOvisionmission.approved');
        Route::POST('/visionmission/declined', [CMOMellpiLGUProfileBarangayVisionMissionController::class, 'Declined'])->name('CMOvisionmission.declined');
         
          //NutritionPoliciesController
          Route::get('/nutritionpolicies/fetchreport', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'fetchReport'])->name('CMOnutritionpolicies.fetch');
          Route::get('/nutritionpolicies/report', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'report'])->name('CMOnutritionpolicies.report');
          Route::get('/nutritionpolicies', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'index'])->name('CMOnutritionpolicies.index');
          Route::POST('/nutritionpolicies', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'store'])->name('CMOnutritionpolicies.store');
          Route::get('/nutritionpolicies/create', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'create'])->name('CMOnutritionpolicies.create');  
          Route::get('/nutritionpolicies/{id}/show', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'show'])->name('CMOnutritionpolicies.show'); 
          Route::POST('/nutritionpolicies/approved', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'approvedReport'])->name('CMOnutritionpolicies.approved');
          Route::POST('/nutritionpolicies/declined', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'Declined'])->name('CMOnutritionpolicies.declined');

        //GovernanceController
        Route::get('/governance/fetchreport', [CMOMellpiLGUProfileBarangayGovernanceController::class, 'fetchReport'])->name('CMOgovernance.fetch');
        Route::get('/governance/report', [CMOMellpiLGUProfileBarangayGovernanceController::class, 'report'])->name('CMOgovernance.report');
        Route::get('/governance', [CMOMellpiLGUProfileBarangayGovernanceController::class, 'index'])->name('CMOgovernance.index');
        Route::POST('/governance', [CMOMellpiLGUProfileBarangayGovernanceController::class, 'store'])->name('CMOgovernance.store');
        Route::get('/governance/create', [CMOMellpiLGUProfileBarangayGovernanceController::class, 'create'])->name('CMOgovernance.create');  
        Route::get('/governance/{id}/show', [CMOMellpiLGUProfileBarangayGovernanceController::class, 'show'])->name('CMOgovernance.show'); 
        Route::POST('/governance/approved', [CMOMellpiLGUProfileBarangayGovernanceController::class, 'approvedReport'])->name('CMOgovernance.approved');
        Route::POST('/governance/declined', [CMOMellpiLGUProfileBarangayGovernanceController::class, 'Declined'])->name('CMOgovernance.declined');
        
        //LNCManagementController
        Route::get('/lncmanagement/fetchreport', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'fetchReport'])->name('CMOlncmanagement.fetch');
        Route::get('/lncmanagement/report', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'report'])->name('CMOlncmanagement.report');
        Route::get('/lncmanagement', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'index'])->name('CMOlncmanagement.index');
        Route::POST('/lncmanagement', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'store'])->name('CMOlncmanagement.store');
        Route::get('/lncmanagement/create', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'create'])->name('CMOlncmanagement.create');  
        Route::get('/lncmanagement/{id}/show', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'show'])->name('CMOlncmanagement.show'); 
        Route::POST('/lncmanagement/approved', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'approvedReport'])->name('CMOlncmanagement.approved');
        Route::POST('/lncmanagement/declined', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'Declined'])->name('CMOlncmanagement.declined');

         //NutritionServiceController
         Route::get('/nutritionservice/fetchreport', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'fetchReport'])->name('CMOnutritionservice.fetch');
         Route::get('/nutritionservice/report', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'report'])->name('CMOnutritionservice.report');
         Route::get('/nutritionservice', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'index'])->name('CMOnutritionservice.index');
         Route::POST('/nutritionservice', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'store'])->name('CMOnutritionservice.store');
         Route::get('/nutritionservice/create', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'create'])->name('CMOnutritionservice.create');  
         Route::get('/nutritionservice/{id}/show', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'show'])->name('CMOnutritionservice.show'); 
         Route::POST('/nutritionservice/approved', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'approvedReport'])->name('CMOnutritionservice.approved');
         Route::POST('/nutritionservice/declined', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'Declined'])->name('CMOnutritionservice.declined');

        //ChangeNSController
        Route::get('/changeNS/fetchreport', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'fetchReport'])->name('CMOchangeNS.fetch');
        Route::get('/changeNS/report', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'report'])->name('CMOchangeNS.report');
        Route::get('/changeNS', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'index'])->name('CMOchangeNS.index');
        Route::POST('/changeNS', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'store'])->name('CMOchangeNS.store');
        Route::get('/changeNS/create', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'create'])->name('CMOchangeNS.create');  
        Route::get('/changeNS/{id}/show', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'show'])->name('CMOchangeNS.show'); 
        Route::POST('/changeNS/approved', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'approvedReport'])->name('CMOchangeNS.approved');
        Route::POST('/changeNS/declined', [CMOMellpiLGUProfileBarangayNutritionPoliciesController::class, 'Declined'])->name('CMOchangeNS.declined');
 
    });


    Route::prefix('CityMunicipalStaff')->middleware(['auth', 'CityMunicipalStaff'])->group(function () {

       //DashboardController
       Route::get('/dashboard', [CMSDashboardController::class, 'index'])->name('CMSdashboard.index');
       Route::POST('/dashboard', [CMSDashboardController::class, 'store'])->name('CMSdashboard.store');
       Route::get('/dashboard/create', [CMSDashboardController::class, 'create'])->name('CMSdashboard.create');
       Route::get('/dashboard/{admin}', [CMSDashboardController::class, 'update'])->name('CMSdashboard.update');
       Route::get('/dashboard/{admin}/edit', [CMSDashboardController::class, 'create'])->name('CMSdashboard.edit');
       Route::DELETE('/dashboard/{admin}', [CMSDashboardController::class, 'destroy'])->name('CMSdashboard.destroy');
     
    //    // // Userprofile
       Route::get('/profile', [CMSProfileController::class, 'index'])->name('CMSprofile.index'); 
       Route::get('/profile/{profile}', [CMSProfileController::class, 'update'])->name('CMSprofile.update');
       Route::get('/profile/{profile}/edit', [CMSProfileController::class, 'edit'])->name('CMSprofile.edit'); 
       Route::PUT('/profile/password', [CMSProfileController::class, 'password'])->name('CMSprofile.password');
     
       //LGUProfileController
       Route::get('/lguprofile', [CMSLGUprofileController::class, 'index'])->name('CMSLGUprofile.index');
       //Route::POST('/lguprofile', [CMSLGUprofileController::class, 'storeDraft'])->name('CMSLGUprofile.storeDraft');
       Route::get('/lguprofile/{id}/show', [CMSLGUprofileController::class, 'show'])->name('CMSLGUprofile.show');
       Route::POST('/lguprofile', [CMSLGUprofileController::class, 'storeSubmit'])->name('CMSLGUprofilest.storeSubmit');
       Route::get('/lguprofile/create', [CMSLGUprofileController::class, 'create'])->name('CMSLGUprofile.create');
       Route::put('/lguprofile/{id}', [CMSLGUprofileController::class, 'update'])->name('CMSLGUprofile.update');
       Route::get('/lguprofile/{id}/edit', [CMSLGUprofileController::class, 'edit'])->name('CMSLGUprofile.edit');
       Route::POST('/lguprofile/delete', [CMSLGUprofileController::class, 'destroy'])->name('CMSLGUprofile.destroy');  
       //LGU Profile Downloadable
       Route::POST('/lguprofile/{id}/download-pdf',[CMSLGUprofileController::class , 'downloads'])->name('CMSLGUprofile.download');


     //VisionMissionController
     Route::get('/visionmission', [CMSVisionMissionController::class, 'index'])->name('CMSvisionmission.index');
     Route::POST('/visionmission', [CMSVisionMissionController::class, 'store'])->name('CMSvisionmission.store');
     Route::get('/visionmission/create', [CMSVisionMissionController::class, 'create'])->name('CMSvisionmission.create');
     Route::put('/visionmission/{id}', [CMSVisionMissionController::class, 'update'])->name('CMSvisionmission.update');
     Route::get('/visionmission/{id}/edit', [CMSVisionMissionController::class, 'edit'])->name('CMSvisionmission.edit');
     Route::post('/visionmission/delete', [CMSVisionMissionController::class, 'destroy'])->name('CMSvisionmission.destroy');  
     Route::get('/visionmission/{id}/show', [CMSVisionMissionController::class, 'show'])->name('CMSvisionmission.show');
     Route::POST('/visionmission/{id}/download-pdf',[CMSVisionMissionController::class , 'downloads'])->name('CMSvisionmission.download');


     //NutritionPoliciesController
     Route::get('/nutritionpolicies', [CMSNutritionPoliciesController::class, 'index'])->name('CMSnutritionpolicies.index');
     Route::POST('/nutritionpolicies', [CMSNutritionPoliciesController::class, 'store'])->name('CMSnutritionpolicies.store');
     Route::get('/nutritionpolicies/create', [CMSNutritionPoliciesController::class, 'create'])->name('CMSnutritionpolicies.create');
     Route::put('/nutritionpolicies/{id}', [CMSNutritionPoliciesController::class, 'update'])->name('CMSnutritionpolicies.update');
     Route::get('/nutritionpolicies/{id}/edit', [CMSNutritionPoliciesController::class, 'edit'])->name('CMSnutritionpolicies.edit');
     Route::POST('/nutritionpolicies/delete', [CMSNutritionPoliciesController::class, 'destroy'])->name('CMSnutritionpolicies.destroy');  
     Route::get('/nutritionpolicies/{id}/show', [CMSNutritionPoliciesController::class, 'show'])->name('CMSnutritionpolicies.show');
     Route::POST('/nutritionpolicies/{id}/download-pdf',[CMSNutritionPoliciesController::class , 'downloads'])->name('CMSnutritionpolicies.download');


     //GovernanceController
     Route::get('/governance', [CMSGovernanceController::class, 'index'])->name('CMSgovernance.index');
     Route::POST('/governance', [CMSGovernanceController::class, 'store'])->name('CMSgovernance.store');
     Route::get('/governance/create', [CMSGovernanceController::class, 'create'])->name('CMSgovernance.create');
     Route::put('/governance/{id}', [CMSGovernanceController::class, 'update'])->name('CMSgovernance.update');
     Route::get('/governance/{id}/edit', [CMSGovernanceController::class, 'edit'])->name('CMSgovernance.edit');
     Route::POST('/governance/delete', [CMSGovernanceController::class, 'destroy'])->name('CMSgovernance.destroy');  
     Route::get('/governance/{id}/show', [CMSGovernanceController::class, 'show'])->name('CMSgovernance.show');
     Route::POST('/governance/{id}/download-pdf',[CMSGovernanceController::class , 'downloads'])->name('CMSgovernance.download');

     //NutritionServicesController
     Route::get('/lncmanagement', [CMSLNCManagementBarangayController::class, 'index'])->name('CMSlncmanagement.index');
     Route::POST('/lncmanagement', [CMSLNCManagementBarangayController::class, 'store'])->name('CMSlncmanagement.store');
     Route::get('/lncmanagement/create', [CMSLNCManagementBarangayController::class, 'create'])->name('CMSlncmanagement.create');
     Route::put('/lncmanagement/{id}', [CMSLNCManagementBarangayController::class, 'update'])->name('CMSlncmanagement.update');
     Route::get('/lncmanagement/{id}/edit', [CMSLNCManagementBarangayController::class, 'edit'])->name('CMSlncmanagement.edit');
     Route::POST('/lncmanagement/delete', [CMSLNCManagementBarangayController::class, 'destroy'])->name('CMSlncmanagement.destroy');  
     Route::get('/lncmanagement/{id}/show', [CMSLNCManagementBarangayController::class, 'show'])->name('CMSlncmanagement.show');
     Route::POST('/lncmanagement/{id}/download-pdf',[CMSLNCManagementBarangayController::class , 'downloads'])->name('CMSlncmanagement.download');


     //NutritionServicesController
     Route::get('/nutritionservice', [CMSNutritionServiceController::class, 'index'])->name('CMSnutritionservice.index');
     Route::POST('/nutritionservice', [CMSNutritionServiceController::class, 'store'])->name('CMSnutritionservice.store');
     Route::get('/nutritionservice/create', [CMSNutritionServiceController::class, 'create'])->name('CMSnutritionservice.create');
     Route::put('/nutritionservice/{id}', [CMSNutritionServiceController::class, 'update'])->name('CMSnutritionservice.update');
     Route::get('/nutritionservice/{id}/edit', [CMSNutritionServiceController::class, 'edit'])->name('CMSnutritionservice.edit');
     Route::POST('/nutritionservice/delete', [CMSNutritionServiceController::class, 'destroy'])->name('CMSnutritionservice.destroy');  
     Route::get('/nutritionservice/{id}/show', [CMSNutritionServiceController::class, 'show'])->name('CMSnutritionservice.show');
     Route::POST('/nutritionservice/{id}/download-pdf',[CMSNutritionServiceController::class , 'downloads'])->name('CMSnutritionservice.download');

        //ChangeNSController
        Route::get('/changeNS', [CMSChangeNSController::class, 'index'])->name('CMSchangeNS.index');
        Route::POST('/changeNS', [CMSChangeNSController::class, 'store'])->name('CMSchangeNS.store');
        Route::get('/changeNS/create', [CMSChangeNSController::class, 'create'])->name('CMSchangeNS.create');
        Route::put('/changeNS/{id}', [CMSChangeNSController::class, 'update'])->name('CMSchangeNS.update');
        Route::get('/changeNS/{id}/edit', [CMSChangeNSController::class, 'edit'])->name('CMSchangeNS.edit');
        Route::POST('/changeNS/delete', [CMSChangeNSController::class, 'destroy'])->name('CMSchangeNS.destroy');
        Route::get('/changeNS/{id}/show', [CMSChangeNSController::class, 'show'])->name('CMSchangeNS.show');
        Route::POST('/changeNS/{id}/download-pdf',[CMSChangeNSController::class , 'downloads'])->name('CMSchangeNS.download');  

        //DiscussionQuestionController
        Route::get('/discussionquestion', [CMSDiscussionQuestionController::class, 'index'])->name('CMSdiscussionquestion.index');
        Route::POST('/discussionquestion', [CMSDiscussionQuestionController::class, 'store'])->name('CMSdiscussionquestion.store');
        Route::get('/discussionquestion/create', [CMSDiscussionQuestionController::class, 'create'])->name('CMSdiscussionquestion.create');
        Route::put('/discussionquestion/{id}', [CMSDiscussionQuestionController::class, 'update'])->name('CMSdiscussionquestion.update');
        Route::get('/discussionquestion/{id}/edit', [CMSDiscussionQuestionController::class, 'edit'])->name('CMSdiscussionquestion.edit');
        Route::POST('/discussionquestion/delete', [CMSDiscussionQuestionController::class, 'destroy'])->name('CMSdiscussionquestion.destroy');  
        Route::get('/discussionquestion/{id}/show', [CMSDiscussionQuestionController::class, 'show'])->name('CMSdiscussionquestion.show');


        //BudgetController
        Route::get('/budgetAIP', [CMSBudgetAIPController::class, 'index'])->name('CMSbudgetAIP.index');
        Route::POST('/budgetAIP', [CMSBudgetAIPController::class, 'store'])->name('CMSbudgetAIP.store');
        Route::get('/budgetAIP/create', [CMSBudgetAIPController::class, 'create'])->name('CMSbudgetAIP.create');
        Route::put('/budgetAIP/{id}', [CMSBudgetAIPController::class, 'update'])->name('CMSbudgetAIP.update');
        Route::get('/budgetAIP/{id}/edit', [CMSBudgetAIPController::class, 'edit'])->name('CMSbudgetAIP.edit');
        Route::DELETE('/budgetAIP/{id}', [CMSBudgetAIPController::class, 'destroy'])->name('CMSbudgetAIP.destroy');  


       //Mellpi pro for LNFP
       //LGU Profile
       Route::get('/lguprofilelnfp', [CMSMellpiProForLNFP_barangayLGUController::class, 'index'])->name('BSLGUprofileLNFPIndex.index');
       Route::get('/lguprofilelnfpCreate', [CMSMellpiProForLNFP_barangayLGUController::class, 'mellpiProLNFP_LGUcreate'])->name('MellpiProForLNFPCreate.create');
       Route::post('/lguprofileLnfpSubmit', [CMSMellpiProForLNFP_barangayLGUController::class, 'storeSubmit'])->name('MellpiProForLNFPSubmit.storeSubmit');
       Route::post('/lguprofileLnfpUpdate/{id}', [CMSMellpiProForLNFP_barangayLGUController::class, 'storeUpdate'])->name('MellpiProForLNFPUpdate.storeUpdate');
       Route::get('/lguLnfpDeleteProfile/{id}', [CMSMellpiProForLNFP_barangayLGUController::class, 'deleteLNFP_lguprofile'])->name('lguLnfpDeleteProfile');
       Route::get('/lguLnfpViewProfile/{id}/view', [CMSMellpiProForLNFP_barangayLGUController::class, 'viewLNFP_lguprofile'])->name('lguLnfpViewProfile');
       Route::get('/lguLnfpEditprofile/{id}', [CMSMellpiProForLNFP_barangayLGUController::class, 'mellpiProLNFP_LGUedit'])->name('lguLnfpEditProfile');

       //Form 5 Monitoring
       Route::get('/lguform5Index', [CMSMellpiProForLNFP_barangayController::class, 'monitoringForm5'])->name('MellpiProMonitoringIndex.index');
       Route::get('/lguform5Create', [CMSMellpiProForLNFP_barangayController::class, 'monitoringForm5create'])->name(('MellpiProMonitoringCreate.create'));
       Route::post('/lguLnfpUpdate/{id}', [CMSMellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdate');
       Route::post('/lguLnfpUpdate', [CMSMellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdates');
       Route::put('/lguLnfpUpdate', [CMSMellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdateRemarks');
       Route::POST('/lguLnfpDelete', [CMSMellpiProForLNFP_barangayController::class, 'deleteForm5arr'])->name('lguLnfpDeleteForm5a');
       Route::get('/lguLnfpEdit/{id}', [CMSMellpiProForLNFP_barangayController::class, 'monitoringForm5edit'])->name('lguLnfpEdit');
       Route::get('/lguform5createdata', [CMSMellpiProForLNFP_barangayController::class, 'createdata'])->name('form5CreateData');
       Route::get('/lguForm5addForm/{id}', [CMSMellpiProForLNFP_barangayController::class, 'addForm'])->name('lguForm5addForm');
       //Form 6 Radial Diagram
       Route::get('/lguform6Index', [CMSMellpiProForLNFP_form6Controller::class, 'radialForm6'])->name('MellpiProRadialIndex.index');
       Route::get('lguform6Create', [CMSMellpiProForLNFP_form6Controller::class, 'radialForm6Create'])->name('MellpiProRadialCreate.create');
       Route::get('/lguform6Edit/{id}', [CMSMellpiProForLNFP_form6Controller::class, 'radialForm6Create'])->name('lguLnfpEditForm6');
     //   Route::post('/lguform7Update/{id}', [MellpiProForLNFP_form6Controller::class, 'storeform7'])->name('lnfpUpdateform7');
     Route::post('BarangayScholar/lguform7Update/{id}', [CMSMellpiProForLNFP_form6Controller::class, 'storeform7'])->name('lnfpUpdateform7');
     //Form 8 Action Sheet
     Route::get('/lguform8Index', [CMSMellpiProForLNFP_form8Controller::class, 'ActionSheetForm8'])->name('lnfpForm8Index');
     Route::get('/lguform8Create', [CMSMellpiProForLNFP_form8Controller::class, 'ActionSheetForm8Create'])->name('lnfpForm8Create');
     Route::post('/lguform8Store', [CMSMellpiProForLNFP_form8Controller::class, 'storeASForm8'])->name('lnfpForm8Store');
     Route::get('/lguLnfpDeleteForm8/{id}', [CMSMellpiProForLNFP_form8Controller::class, 'deleteForm8'])->name('deleteForm8');
     Route::get('/lguLnfpEditForm8/{id}', [CMSMellpiProForLNFP_form8Controller::class, 'ActionSheetForm8Edit'])->name('editForm8');
     Route::post('/lguLnfpUpdateForm8/{id}', [CMSMellpiProForLNFP_form8Controller::class, 'storeUpdateASForm8'])->name('MellpiProForLNFPUpdate.storeUpdateASForm8');
     //Interview Form
     Route::get('/lguformInterviewIndex', [CMSMellpiProForLNFP_InterviewController::class, 'InterviewFormLNFP'])->name('lnfpFormInterviewIndex');
     Route::get('/lguformInterviewCreate', [CMSMellpiProForLNFP_InterviewController::class, 'InterviewFormLNFPCreate'])->name('lnfpFormInterviewCreate');
     Route::post('/lguLnfpInterviewStore', [CMSMellpiProForLNFP_InterviewController::class, 'storeInterviewForm'])->name('lnfpInterviewStore');
     Route::get('/lguLnfpDeleteInterview/{id}', [CMSMellpiProForLNFP_InterviewController::class, 'deleteIntForm'])->name('deleteIntForm');
     Route::get('/lguLnfpEditInterview/{id}', [CMSMellpiProForLNFP_InterviewController::class, 'InterviewFormLNFPEdit'])->name('editIntForm');
     Route::post('/lguLnfpUpdateInterview/{id}', [CMSMellpiProForLNFP_InterviewController::class, 'storeInterviewFormUpdate'])->name('MellpiProForLNFPUpdate.storeUpdateIntForm');
     //Overall Score
     Route::get('/lguformOverallScoreIndex', [CMSMellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFP'])->name('lnfpFormOverallScoreIndex');
     Route::get('/lguLnfpOverallScoreCreate', [CMSMellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFPCreate'])->name('lnfpFormOverallScoreCreate');
     Route::get('/lguLnfpEditOverall/{id}', [CMSMellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFPEdit'])->name('editOSForm');

    });

    // Route::prefix('BarangayScholar')->middleware(['auth', 'BarangayScholar'])->group(function () {
        
    //       //DashboardController
    //       Route::get('/dashboard', [BSDashboardController::class, 'index'])->name('BSdashboard.index');
    //       Route::POST('/dashboard', [BSDashboardController::class, 'store'])->name('BSdashboard.store');
    //       Route::get('/dashboard/create', [BSDashboardController::class, 'create'])->name('BSdashboard.create');
    //       Route::get('/dashboard/{admin}', [BSDashboardController::class, 'update'])->name('BSdashboard.update');
    //       Route::get('/dashboard/{admin}/edit', [BSDashboardController::class, 'create'])->name('BSdashboard.edit');
    //       Route::DELETE('/dashboard/{admin}', [BSDashboardController::class, 'destroy'])->name('BSdashboard.destroy');
        
    //       // // Userprofile
    //       Route::get('/profile', [BSProfileController::class, 'index'])->name('BSprofile.index'); 
    //       Route::get('/profile/{profile}', [BSProfileController::class, 'update'])->name('BSprofile.update');
    //       Route::get('/profile/{profile}/edit', [BSProfileController::class, 'edit'])->name('BSprofile.edit'); 
    //       Route::PUT('/profile/password', [BSProfileController::class, 'password'])->name('BSprofile.password');
        
    //       //LGUProfileController
    //       Route::get('/lguprofile', [BSLGUprofileController::class, 'index'])->name('BSLGUprofile.index');
    //       //Route::POST('/lguprofile', [BSLGUprofileController::class, 'storeDraft'])->name('BSLGUprofile.storeDraft');
    //       Route::get('/lguprofile/{id}/show', [BSLGUprofileController::class, 'show'])->name('BSLGUprofile.show');
    //       Route::POST('/lguprofile', [BSLGUprofileController::class, 'storeSubmit'])->name('BSLGUprofilest.storeSubmit');
    //       Route::get('/lguprofile/create', [BSLGUprofileController::class, 'create'])->name('BSLGUprofile.create');
    //       Route::put('/lguprofile/{id}', [BSLGUprofileController::class, 'update'])->name('BSLGUprofile.update');
    //       Route::get('/lguprofile/{id}/edit', [BSLGUprofileController::class, 'edit'])->name('BSLGUprofile.edit');
    //       Route::POST('/lguprofile/delete', [BSLGUprofileController::class, 'destroy'])->name('BSLGUprofile.destroy');  
    //       //LGU Profile Downloadable
    //       Route::POST('/lguprofile/{id}/download-pdf',[BSLGUprofileController::class , 'downloads'])->name('BSLGUprofile.download');


    //     //VisionMissionController
    //     Route::get('/visionmission', [VisionMissionController::class, 'index'])->name('visionmission.index');
    //     Route::POST('/visionmission', [VisionMissionController::class, 'store'])->name('visionmission.store');
    //     Route::get('/visionmission/create', [VisionMissionController::class, 'create'])->name('visionmission.create');
    //     Route::put('/visionmission/{id}', [VisionMissionController::class, 'update'])->name('visionmission.update');
    //     Route::get('/visionmission/{id}/edit', [VisionMissionController::class, 'edit'])->name('visionmission.edit');
    //     Route::post('/visionmission/delete', [VisionMissionController::class, 'destroy'])->name('visionmission.destroy');  
    //     Route::get('/visionmission/{id}/show', [VisionMissionController::class, 'show'])->name('visionmission.show');
    //     Route::POST('/visionmission/{id}/download-pdf',[VisionMissionController::class , 'downloads'])->name('visionmission.download');


    //     //NutritionPoliciesController
    //     Route::get('/nutritionpolicies', [NutritionPoliciesController::class, 'index'])->name('nutritionpolicies.index');
    //     Route::POST('/nutritionpolicies', [NutritionPoliciesController::class, 'store'])->name('nutritionpolicies.store');
    //     Route::get('/nutritionpolicies/create', [NutritionPoliciesController::class, 'create'])->name('nutritionpolicies.create');
    //     Route::put('/nutritionpolicies/{id}', [NutritionPoliciesController::class, 'update'])->name('nutritionpolicies.update');
    //     Route::get('/nutritionpolicies/{id}/edit', [NutritionPoliciesController::class, 'edit'])->name('nutritionpolicies.edit');
    //     Route::POST('/nutritionpolicies/delete', [NutritionPoliciesController::class, 'destroy'])->name('nutritionpolicies.destroy');  
    //     Route::get('/nutritionpolicies/{id}/show', [NutritionPoliciesController::class, 'show'])->name('nutritionpolicies.show');
    //     Route::POST('/nutritionpolicies/{id}/download-pdf',[NutritionPoliciesController::class , 'downloads'])->name('nutritionpolicies.download');


    //     //GovernanceController
    //     Route::get('/governance', [CMSGovernanceController::class, 'index'])->name('governance.index');
    //     Route::POST('/governance', [CMSGovernanceController::class, 'store'])->name('governance.store');
    //     Route::get('/governance/create', [CMSGovernanceController::class, 'create'])->name('governance.create');
    //     Route::put('/governance/{id}', [CMSGovernanceController::class, 'update'])->name('governance.update');
    //     Route::get('/governance/{id}/edit', [CMSGovernanceController::class, 'edit'])->name('governance.edit');
    //     Route::POST('/governance/delete', [CMSGovernanceController::class, 'destroy'])->name('governance.destroy');  
    //     Route::get('/governance/{id}/show', [CMSGovernanceController::class, 'show'])->name('governance.show');
    //     Route::POST('/governance/{id}/download-pdf',[CMSGovernanceController::class , 'downloads'])->name('governance.download');

    //     //NutritionServicesController
    //     Route::get('/lncmanagement', [CMSLNCManagementBarangayController::class, 'index'])->name('lncmanagement.index');
    //     Route::POST('/lncmanagement', [CMSLNCManagementBarangayController::class, 'store'])->name('lncmanagement.store');
    //     Route::get('/lncmanagement/create', [CMSLNCManagementBarangayController::class, 'create'])->name('lncmanagement.create');
    //     Route::put('/lncmanagement/{id}', [CMSLNCManagementBarangayController::class, 'update'])->name('lncmanagement.update');
    //     Route::get('/lncmanagement/{id}/edit', [CMSLNCManagementBarangayController::class, 'edit'])->name('lncmanagement.edit');
    //     Route::POST('/lncmanagement/delete', [CMSLNCManagementBarangayController::class, 'destroy'])->name('lncmanagement.destroy');  
    //     Route::get('/lncmanagement/{id}/show', [CMSLNCManagementBarangayController::class, 'show'])->name('lncmanagement.show');
    //     Route::POST('/lncmanagement/{id}/download-pdf',[CMSLNCManagementBarangayController::class , 'downloads'])->name('lncmanagement.download');


    //     //NutritionServicesController
    //     Route::get('/nutritionservice', [CMSNutritionServiceController::class, 'index'])->name('nutritionservice.index');
    //     Route::POST('/nutritionservice', [CMSNutritionServiceController::class, 'store'])->name('nutritionservice.store');
    //     Route::get('/nutritionservice/create', [CMSNutritionServiceController::class, 'create'])->name('nutritionservice.create');
    //     Route::put('/nutritionservice/{id}', [CMSNutritionServiceController::class, 'update'])->name('nutritionservice.update');
    //     Route::get('/nutritionservice/{id}/edit', [CMSNutritionServiceController::class, 'edit'])->name('nutritionservice.edit');
    //     Route::POST('/nutritionservice/delete', [CMSNutritionServiceController::class, 'destroy'])->name('nutritionservice.destroy');  
    //     Route::get('/nutritionservice/{id}/show', [CMSNutritionServiceController::class, 'show'])->name('nutritionservice.show');
    //     Route::POST('/nutritionservice/{id}/download-pdf',[CMSNutritionServiceController::class , 'downloads'])->name('nutritionservice.download');

    //        //ChangeNSController
    //        Route::get('/changeNS', [CMSChangeNSController::class, 'index'])->name('changeNS.index');
    //        Route::POST('/changeNS', [CMSChangeNSController::class, 'store'])->name('changeNS.store');
    //        Route::get('/changeNS/create', [CMSChangeNSController::class, 'create'])->name('changeNS.create');
    //        Route::put('/changeNS/{id}', [CMSChangeNSController::class, 'update'])->name('changeNS.update');
    //        Route::get('/changeNS/{id}/edit', [CMSChangeNSController::class, 'edit'])->name('changeNS.edit');
    //        Route::POST('/changeNS/delete', [CMSChangeNSController::class, 'destroy'])->name('changeNS.destroy');
    //        Route::get('/changeNS/{id}/show', [CMSChangeNSController::class, 'show'])->name('changeNS.show');
    //        Route::POST('/changeNS/{id}/download-pdf',[CMSChangeNSController::class , 'downloads'])->name('changeNS.download');  
   
    //        //DiscussionQuestionController
    //        Route::get('/discussionquestion', [CMSDiscussionQuestionController::class, 'index'])->name('discussionquestion.index');
    //        Route::POST('/discussionquestion', [CMSDiscussionQuestionController::class, 'store'])->name('discussionquestion.store');
    //        Route::get('/discussionquestion/create', [CMSDiscussionQuestionController::class, 'create'])->name('discussionquestion.create');
    //        Route::put('/discussionquestion/{id}', [CMSDiscussionQuestionController::class, 'update'])->name('discussionquestion.update');
    //        Route::get('/discussionquestion/{id}/edit', [CMSDiscussionQuestionController::class, 'edit'])->name('discussionquestion.edit');
    //        Route::POST('/discussionquestion/delete', [CMSDiscussionQuestionController::class, 'destroy'])->name('discussionquestion.destroy');  
    //        Route::get('/discussionquestion/{id}/show', [CMSDiscussionQuestionController::class, 'show'])->name('discussionquestion.show');


    //        //BudgetController
    //        Route::get('/budgetAIP', [CMSBudgetAIPController::class, 'index'])->name('budgetAIP.index');
    //        Route::POST('/budgetAIP', [CMSBudgetAIPController::class, 'store'])->name('budgetAIP.store');
    //        Route::get('/budgetAIP/create', [CMSBudgetAIPController::class, 'create'])->name('budgetAIP.create');
    //        Route::put('/budgetAIP/{id}', [CMSBudgetAIPController::class, 'update'])->name('budgetAIP.update');
    //        Route::get('/budgetAIP/{id}/edit', [CMSBudgetAIPController::class, 'edit'])->name('budgetAIP.edit');
    //        Route::DELETE('/budgetAIP/{id}', [CMSBudgetAIPController::class, 'destroy'])->name('budgetAIP.destroy');  


    //       //Mellpi pro for LNFP
    //       //LGU Profile
    //       Route::get('/lguprofilelnfp', [CMSMellpiProForLNFP_barangayLGUController::class, 'index'])->name('BSLGUprofileLNFPIndex.index');
    //       Route::get('/lguprofilelnfpCreate', [CMSMellpiProForLNFP_barangayLGUController::class, 'mellpiProLNFP_LGUcreate'])->name('MellpiProForLNFPCreate.create');
    //       Route::post('/lguprofileLnfpSubmit', [CMSMellpiProForLNFP_barangayLGUController::class, 'storeSubmit'])->name('MellpiProForLNFPSubmit.storeSubmit');
    //       Route::post('/lguprofileLnfpUpdate/{id}', [CMSMellpiProForLNFP_barangayLGUController::class, 'storeUpdate'])->name('MellpiProForLNFPUpdate.storeUpdate');
    //       Route::get('/lguLnfpDeleteProfile/{id}', [CMSMellpiProForLNFP_barangayLGUController::class, 'deleteLNFP_lguprofile'])->name('lguLnfpDeleteProfile');
    //       Route::get('/lguLnfpViewProfile/{id}/view', [CMSMellpiProForLNFP_barangayLGUController::class, 'viewLNFP_lguprofile'])->name('lguLnfpViewProfile');
    //       Route::get('/lguLnfpEditprofile/{id}', [CMSMellpiProForLNFP_barangayLGUController::class, 'mellpiProLNFP_LGUedit'])->name('lguLnfpEditProfile');

    //       //Form 5 Monitoring
    //       Route::get('/lguform5Index', [CMSMellpiProForLNFP_barangayController::class, 'monitoringForm5'])->name('MellpiProMonitoringIndex.index');
    //       Route::get('/lguform5Create', [CMSMellpiProForLNFP_barangayController::class, 'monitoringForm5create'])->name(('MellpiProMonitoringCreate.create'));
    //       Route::post('/lguLnfpUpdate/{id}', [CMSMellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdate');
    //       Route::post('/lguLnfpUpdate', [CMSMellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdates');
    //       Route::put('/lguLnfpUpdate', [CMSMellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdateRemarks');
    //       Route::POST('/lguLnfpDelete', [CMSMellpiProForLNFP_barangayController::class, 'deleteForm5arr'])->name('lguLnfpDeleteForm5a');
    //       Route::get('/lguLnfpEdit/{id}', [CMSMellpiProForLNFP_barangayController::class, 'monitoringForm5edit'])->name('lguLnfpEdit');
    //       Route::get('/lguform5createdata', [CMSMellpiProForLNFP_barangayController::class, 'createdata'])->name('form5CreateData');
    //       Route::get('/lguForm5addForm/{id}', [CMSMellpiProForLNFP_barangayController::class, 'addForm'])->name('lguForm5addForm');
    //       //Form 6 Radial Diagram
    //       Route::get('/lguform6Index', [CMSMellpiProForLNFP_form6Controller::class, 'radialForm6'])->name('MellpiProRadialIndex.index');
    //       Route::get('lguform6Create', [CMSMellpiProForLNFP_form6Controller::class, 'radialForm6Create'])->name('MellpiProRadialCreate.create');
    //       Route::get('/lguform6Edit/{id}', [CMSMellpiProForLNFP_form6Controller::class, 'radialForm6Create'])->name('lguLnfpEditForm6');
    //     //   Route::post('/lguform7Update/{id}', [MellpiProForLNFP_form6Controller::class, 'storeform7'])->name('lnfpUpdateform7');
    //     Route::post('BarangayScholar/lguform7Update/{id}', [CMSMellpiProForLNFP_form6Controller::class, 'storeform7'])->name('lnfpUpdateform7');
    //     //Form 8 Action Sheet
    //     Route::get('/lguform8Index', [CMSMellpiProForLNFP_form8Controller::class, 'ActionSheetForm8'])->name('lnfpForm8Index');
    //     Route::get('/lguform8Create', [CMSMellpiProForLNFP_form8Controller::class, 'ActionSheetForm8Create'])->name('lnfpForm8Create');
    //     Route::post('/lguform8Store', [CMSMellpiProForLNFP_form8Controller::class, 'storeASForm8'])->name('lnfpForm8Store');
    //     Route::get('/lguLnfpDeleteForm8/{id}', [CMSMellpiProForLNFP_form8Controller::class, 'deleteForm8'])->name('deleteForm8');
    //     Route::get('/lguLnfpEditForm8/{id}', [CMSMellpiProForLNFP_form8Controller::class, 'ActionSheetForm8Edit'])->name('editForm8');
    //     Route::post('/lguLnfpUpdateForm8/{id}', [CMSMellpiProForLNFP_form8Controller::class, 'storeUpdateASForm8'])->name('MellpiProForLNFPUpdate.storeUpdateASForm8');
    //     //Interview Form
    //     Route::get('/lguformInterviewIndex', [CMSMellpiProForLNFP_InterviewController::class, 'InterviewFormLNFP'])->name('lnfpFormInterviewIndex');
    //     Route::get('/lguformInterviewCreate', [CMSMellpiProForLNFP_InterviewController::class, 'InterviewFormLNFPCreate'])->name('lnfpFormInterviewCreate');
    //     Route::post('/lguLnfpInterviewStore', [CMSMellpiProForLNFP_InterviewController::class, 'storeInterviewForm'])->name('lnfpInterviewStore');
    //     Route::get('/lguLnfpDeleteInterview/{id}', [CMSMellpiProForLNFP_InterviewController::class, 'deleteIntForm'])->name('deleteIntForm');
    //     Route::get('/lguLnfpEditInterview/{id}', [CMSMellpiProForLNFP_InterviewController::class, 'InterviewFormLNFPEdit'])->name('editIntForm');
    //     Route::post('/lguLnfpUpdateInterview/{id}', [CMSMellpiProForLNFP_InterviewController::class, 'storeInterviewFormUpdate'])->name('MellpiProForLNFPUpdate.storeUpdateIntForm');
    //     //Overall Score
    //     Route::get('/lguformOverallScoreIndex', [CMSMellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFP'])->name('lnfpFormOverallScoreIndex');
    //     Route::get('/lguLnfpOverallScoreCreate', [CMSMellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFPCreate'])->name('lnfpFormOverallScoreCreate');
    //     Route::get('/lguLnfpEditOverall/{id}', [CMSMellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFPEdit'])->name('editOSForm');

    // });

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

    Route::prefix('UserUnderReview')->middleware(['auth', 'UserUnderReview'])->group(function () {
        Route::get('/dashboard',[UserReviewController::class, 'index'])->name('UURdashboard.index');
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

