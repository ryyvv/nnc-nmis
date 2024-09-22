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

use App\Http\Controllers\PersonnelDnaDirectoryController;




// added
use App\Http\Controllers\Admin\User\DashboardController;

use App\Http\Controllers\Admin\CentralAdmin\PermissionController;
use App\Http\Controllers\Admin\CentralAdmin\RolesController;
use App\Http\Controllers\Admin\CentralAdmin\ProfileController;
use App\Http\Controllers\Admin\CentralAdmin\AdminUserController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\CentralAdmin\CADashboardController;
use App\Http\Controllers\Admin\CentralAdmin\FormsBuilderController;
use App\Http\Controllers\Admin\CentralAdmin\Form5PNAOBuilderController;
use App\Http\Controllers\Admin\CentralAdmin\FormFieldController;


use App\Http\Controllers\Admin\CentralOfficer\CODashboardController;

use App\Http\Controllers\Admin\CentralStaff\CSDashboardController;

use App\Http\Controllers\Admin\RegionalOfficer\RODashboardController;

use App\Http\Controllers\Admin\RegionalStaff\RSDashboardController;

use App\Http\Controllers\Admin\ProvincialOfficer\PODashboardController;

use App\Http\Controllers\Admin\ProvincialStaff\PSDashboardController;

// City-Municipal Officer
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMODashboardController;
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayController;
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMOMellpiLGUProfileSummaryBarangayController;
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayBudgetAIPController;
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayChangeNSController;
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayDiscussionQuestionController;
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayGovernanceController;
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayLNCManagementController;
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayNutritionPoliciesController;
use App\Http\Controllers\Admin\CityMunicipalOfficer\CMOMellpiLGUProfileBarangayVisionMissionController;



// City-Municipal Staff
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSPersonnelDnaDirectoryController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSEquipmentInventoryController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSNutritionOfficesController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSDashboardController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSProfileController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSLGUprofileController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSVisionMissionController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSNutritionPoliciesController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSGovernanceController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSNutritionServiceController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSChangeNSController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSDiscussionQuestionController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSBudgetAIPController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSLNCManagementBarangayController;

use App\Http\Controllers\Admin\CityMunicipalStaff\CMSMellpiProForLNFP_barangayController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSMellpiProForLNFP_barangayLGUController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSMellpiProForLNFP_form6Controller;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSMellpiProForLNFP_form8Controller;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSMellpiProForLNFP_InterviewController;
use App\Http\Controllers\Admin\CityMunicipalStaff\CMSMellpiProForLNFP_OverallScoreController;



//BarangayScholar
use App\Http\Controllers\Admin\BarangayScholar\BSPersonnel;
use App\Http\Controllers\Admin\BarangayScholar\BSEquipmentInventoryController;
use App\Http\Controllers\Admin\BarangayScholar\BSNutritionOfficesController;
use App\Http\Controllers\Admin\BarangayScholar\BSDashboardController;
use App\Http\Controllers\Admin\BarangayScholar\BSProfileController;
use App\Http\Controllers\Admin\BarangayScholar\BSLGUprofileController;
use App\Http\Controllers\Admin\BarangayScholar\VisionMissionController;
use App\Http\Controllers\Admin\BarangayScholar\NutritionPoliciesController;
use App\Http\Controllers\Admin\BarangayScholar\GovernanceController;
use App\Http\Controllers\Admin\BarangayScholar\NutritionServiceController;
use App\Http\Controllers\Admin\BarangayScholar\ChangeNSController;
use App\Http\Controllers\Admin\BarangayScholar\DiscussionQuestionController;
use App\Http\Controllers\Admin\BarangayScholar\BudgetAIPController;
use App\Http\Controllers\Admin\BarangayScholar\LNCManagementBarangayController;

use App\Http\Controllers\Admin\BarangayScholar\MellpiProForLNFP_barangayController;
use App\Http\Controllers\Admin\BarangayScholar\MellpiProForLNFP_barangayLGUController;
use App\Http\Controllers\Admin\BarangayScholar\MellpiProForLNFP_form6Controller;
use App\Http\Controllers\Admin\BarangayScholar\MellpiProForLNFP_form8Controller;
use App\Http\Controllers\Admin\BarangayScholar\MellpiProForLNFP_InterviewController;
use App\Http\Controllers\Admin\BarangayScholar\MellpiProForLNFP_OverallScoreController;
use App\Http\Controllers\Admin\BarangayScholar\MellpiProForLNFP_SummaryController;


use App\Http\Controllers\FormController;
use App\Http\Controllers\FormSubmissionController; 
// use App\Http\Controllers\UserController\UserReviewController as UserControllerUserReviewController;
use Faker\Guesser\Name;

use App\Http\Controllers\UserUnderReview\UserReviewController;

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

    Route::get('/lguprofilelnfp', [MellpiProForLNFP_barangayLGUController::class, 'index'])->name('BSLGUprofileLNFPIndex.index');
    Route::get('/lguprofilelnfpCreate', [MellpiProForLNFP_barangayLGUController::class, 'mellpiProLNFP_LGUcreate'])->name('MellpiProForLNFPCreate.create');
    Route::post('/lguprofileLnfpSubmit', [MellpiProForLNFP_barangayLGUController::class, 'storeSubmit'])->name('MellpiProForLNFPSubmit.storeSubmit');
    Route::post('/lguprofileLnfpUpdate/{id}', [MellpiProForLNFP_barangayLGUController::class, 'storeUpdate'])->name('MellpiProForLNFPUpdate.storeUpdate');
    Route::POST('/lguLnfpDeleteProfile', [MellpiProForLNFP_barangayLGUController::class, 'deleteLNFP_lguprofile'])->name('lguLnfpDeleteProfile');
    Route::get('/lguLnfpViewProfile/{id}/view', [MellpiProForLNFP_barangayLGUController::class, 'viewLNFP_lguprofile'])->name('lguLnfpViewProfile');
    Route::get('/lguLnfpEditprofile/{id}', [MellpiProForLNFP_barangayLGUController::class, 'mellpiProLNFP_LGUedit'])->name('lguLnfpEditProfile');

    // Forms samples
    Route::resource('forms', FormController::class);
    Route::post('forms/{form}/submissions', [FormSubmissionController::class, 'store'])->name('form-submissions.store');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // bulk upload - Ryan
    Route::get('/mellpi_pro_LGU',  [MellproLGUController::class, 'index'])->name('mellpi_pro_LGU.index');
    Route::post('/mellpi_pro_LGU/psgc',  [MellproLGUController::class, 'Psgcupload'])->name('mellpi_pro_LGU.Psgcupload');
    Route::post('/mellpi_pro_LGU/region',  [MellproLGUController::class, 'Regionupload'])->name('mellpi_pro_LGU.Regionupload');
    Route::post('/mellpi_pro_LGU/province',  [MellproLGUController::class, 'Provinceupload'])->name('mellpi_pro_LGU.Provinceupload');
    Route::post('/mellpi_pro_LGU/city',  [MellproLGUController::class, 'Cityupload'])->name('mellpi_pro_LGU.Cityupload');
    Route::post('/mellpi_pro_LGU/mun',  [MellproLGUController::class, 'Munupload'])->name('mellpi_pro_LGU.Munupload');
    Route::post('/mellpi_pro_LGU/submun',  [MellproLGUController::class, 'SubMunupload'])->name('mellpi_pro_LGU.SubMunupload');
    Route::post('/mellpi_pro_LGU/brgy',  [MellproLGUController::class, 'Barangayupload'])->name('mellpi_pro_LGU.Barangayupload');
    Route::post('/mellpi_pro_LGU/equipmentInventory',  [MellproLGUController::class, 'EquipmentInventoryupload'])->name('mellpi_pro_LGU.EquipmentInventoryupload');

    // Melpi Pro Controller
    // Route::get('/mellpi_pro', [MellpiProController::class, 'index'])->name('mellpi_pro.view');
    // Route::post('/mellpi_pro',  [MellpiProController::class, 'upload'])->name('mellpi_pro.upload');
    // Route::post('/mellpi_pro_create', [MellpiProController::class, 'create'])->name('mellpi_pro.create');
    // Route::get('/mellpi_pro_summary1b', [MellpiProController::class, 'summary1b'])->name('mellpi_pro.summary1b');
    // Route::get('/mellpi_pro_summary2b', [MellpiProController::class, 'summary2b'])->name('mellpi_pro.summary2b');
    // Route::post('/mellpi_pro_store', [MellpiProController::class, 'store'])->name('mellpi_pro.store');

    //Route::get('/lncFunction' ,  [LNCController::class, 'index' ]->name('LNCIndex.view'));
    Route::resource('/lncFunction', LNCController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // Route::get('/personnelDnaDirectoryIndex' ,[PersonnelDnaDirectoryController::class, 'index'])->name('personnelDnaDirectoryIndex');
    // Route::get('/personnelDnaDirectory' ,[PersonnelDnaDirectoryController::class, 'create'])->name('personnelDnaDirectory.create');
    // Route::post('/personnelDnaDirectory/nao' ,[PersonnelDnaDirectoryController::class, 'storeNAO'])->name('personnelDnaDirectory.storeNAO');
    // Route::post('/personnelDnaDirectory/npc' ,[PersonnelDnaDirectoryController::class, 'storeNPC'])->name('personnelDnaDirectory.storeNPC');
    // Route::post('/personnelDnaDirectory/bns' ,[PersonnelDnaDirectoryController::class, 'storeBNS'])->name('personnelDnaDirectory.storeBNS');


    // action="{{ route('upload.csv') }}" 
    // ->name('upload.csv');

});

require __DIR__ . '/auth.php';

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

    Route::middleware(['auth', 'Admin'])->group(function () {

        //==========================================================================================================================================
            // UserDashboard
            //DashboardController
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index'); 
            Route::get('CMSDashboard/fetchreport', [DashboardController::class, 'rep'])->name('CMSDashboard.rep'); 


            Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
            Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
            Route::get('/dashboard/{admin}', [DashboardController::class, 'update'])->name('dashboard.update');
            Route::get('/dashboard/{admin}/edit', [DashboardController::class, 'create'])->name('dashboard.edit');
            Route::DELETE('/dashboard/{admin}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');

           
         //==========================================================================================================================================
                //AdminUser List Controller
                Route::get('CentralAdmin/admin', [AdminUserController::class, 'index'])->name('CAadmin.index');
                Route::POST('CentralAdmin/admin', [AdminUserController::class, 'store'])->name('CAadmin.store');
                Route::get('CentralAdmin/admin/create', [AdminUserController::class, 'create'])->name('CAadmin.create');
                // Route::put('/admin/{id}', [AdminUserController::class, 'update'])->name('CAadmin.update');
                Route::get('CentralAdmin/admin/{id}', [AdminUserController::class, 'update'])->name('CAadmin.update');  //ajax request check
                Route::get('CentralAdmin/admin/{id}/show', [AdminUserController::class, 'show'])->name('CAadmin.show');
                Route::get('CentralAdmin/admin/{id}/edit', [AdminUserController::class, 'create'])->name('CAadmin.edit');
                Route::get('CentralAdmin/admin/{id}', [AdminUserController::class, 'destroy'])->name('CAadmin.destroy');
                Route::PUT('CentralAdmin/admin/{id}/userstatus', [AdminUserController::class, 'changeuserstatus'])->name('CAadmin.userstatusupdate');
                Route::PUT('CentralAdmin/admin/{id}/changepassword', [AdminUserController::class, 'changepassword'])->name('CAadmin.changepassword');
        
        
                // // // Userprofile
                // Route::get('CentralAdmin/profile', [ProfileController::class, 'index'])->name('CAprofile.index');
                // Route::get('CentralAdmin/profile/{profile}', [ProfileController::class, 'update'])->name('CAprofile.update');  //ajax request check
                // Route::get('CentralAdmin/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('CAprofile.edit');
                // Route::PUT('CentralAdmin/profile/password', [ProfileController::class, 'password'])->name('CAprofile.password');
        
                // forms 5 
                Route::get('/form5', [Form5PNAOBuilderController::class, 'index'])->name('form5.index');
                Route::get('/form5edit/{id}', [Form5PNAOBuilderController::class, 'edit'])->name('form5.edit');
                Route::post('/form5update/{id}', [Form5PNAOBuilderController::class, 'update'])->name('form5.update');
                
                // formb
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

                       // Roles
                Route::GET('/roles', [RolesController::class, 'index'])->name('roles.index');
                Route::POST('/roles', [RolesController::class, 'store'])->name('roles.store');
                Route::GET('/roles/{id}/give-permission', [RolesController::class, 'addPermissionToRole'])->name('roles.addPermissionToRole');
                Route::PUT('/roles/{id}/give-permission', [RolesController::class, 'givePermissionToRole'])->name('roles.givePermissionToRole');
                Route::PUT('/roles/{id}', [RolesController::class, 'update'])->name('roles.update');
                Route::GET('/roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
                Route::DELETE('/roles/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');

                // Permission 
                Route::GET('/permissions', [PermissionController::class, 'index'])->name('permission.index');
                Route::POST('/permissions', [PermissionController::class, 'store'])->name('permission.store');
                Route::PUT('/permissions/{permission}', [PermissionController::class, 'update'])->name('permission.update');
                Route::GET('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
                Route::DELETE('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');

        //==========================================================================================================================================
        
        Route::get('BarangayScholar/lguProfile/report', [CMOMellpiLGUProfileBarangayController::class, 'report'])->name('CMOLGUprofile.fetch');
        Route::get('BarangayScholar/lguProfile/fetchreport', [CMOMellpiLGUProfileBarangayController::class, 'fetchReport'])->name('CMOLGUprofile.fetchreport');
        // Route::get('BarangayScholar/lguProfile/fetchreport', [CMOMellpiLGUProfileSummaryBarangayController::class, 'fetchReport'])->name('CMOLGUprofilesummary.fetchreport');


        //DashboardController
        Route::get('/cmsdashboard', [CMSDashboardController::class, 'index'])->name('CMSdashboard.index');
        Route::POST('/dashboard', [CMSDashboardController::class, 'store'])->name('CMSdashboard.store');
        Route::get('/dashboard/create', [CMSDashboardController::class, 'create'])->name('CMSdashboard.create');
        Route::get('/dashboard/{admin}', [CMSDashboardController::class, 'update'])->name('CMSdashboard.update'); 
        Route::get('/dashboard/{admin}/edit', [CMSDashboardController::class, 'create'])->name('CMSdashboard.edit');
        Route::DELETE('/dashboard/{admin}', [CMSDashboardController::class, 'destroy'])->name('CMSdashboard.destroy');

        //Userprofile
        Route::get('/profile', [CMSProfileController::class, 'index'])->name('CMSprofile.index');
        Route::get('/profile/{profile}', [CMSProfileController::class, 'update'])->name('CMSprofile.update');
        Route::get('/profile/{profile}/edit', [CMSProfileController::class, 'edit'])->name('CMSprofile.edit');
        Route::PUT('/profile/password', [CMSProfileController::class, 'password'])->name('CMSprofile.password');

    
        //==========================================================================================================================================
        //CityMunicipal/lguprofile

      

        //LGUProfileController
        Route::get('/CityMunicipal/lguprofile', [CMSLGUprofileController::class, 'index'])->name('CMSLGUprofile.index'); 
        Route::get('/CityMunicipal/lguprofile/{id}/show', [CMSLGUprofileController::class, 'show'])->name('CMSLGUprofile.show');
        Route::POST('/CityMunicipal/lguprofile', [CMSLGUprofileController::class, 'storeSubmit'])->name('CMSLGUprofilest.storeSubmit');
        Route::get('/CityMunicipal/lguprofile/create', [CMSLGUprofileController::class, 'create'])->name('CMSLGUprofile.create');
        Route::put('/CityMunicipal/lguprofile/{id}', [CMSLGUprofileController::class, 'update'])->name('CMSLGUprofile.update');
        Route::get('/CityMunicipal/lguprofile/{id}/edit', [CMSLGUprofileController::class, 'edit'])->name('CMSLGUprofile.edit');
        Route::POST('/CityMunicipal/lguprofile/delete', [CMSLGUprofileController::class, 'destroy'])->name('CMSLGUprofile.destroy');
        //LGU Profile Downloadable
        Route::POST('/CityMunicipal/lguprofile/{id}/download-pdf', [CMSLGUprofileController::class, 'downloads'])->name('CMSLGUprofile.download');


        //VisionMissionController
        Route::get('/CityMunicipal/visionmission', [CMSVisionMissionController::class, 'index'])->name('CMSvisionmission.index');
        Route::POST('/CityMunicipal/visionmission', [CMSVisionMissionController::class, 'store'])->name('CMSvisionmission.store');
        Route::get('/CityMunicipal/visionmission/create', [CMSVisionMissionController::class, 'create'])->name('CMSvisionmission.create');
        Route::put('/CityMunicipal/visionmission/{id}', [CMSVisionMissionController::class, 'update'])->name('CMSvisionmission.update');
        Route::get('/CityMunicipal/visionmission/{id}/edit', [CMSVisionMissionController::class, 'edit'])->name('CMSvisionmission.edit');
        Route::post('/CityMunicipal/visionmission/delete', [CMSVisionMissionController::class, 'destroy'])->name('CMSvisionmission.destroy');
        Route::get('/CityMunicipal/visionmission/{id}/show', [CMSVisionMissionController::class, 'show'])->name('CMSvisionmission.show');
        Route::POST('/CityMunicipal/visionmission/{id}/download-pdf', [CMSVisionMissionController::class, 'downloads'])->name('CMSvisionmission.download');


        //NutritionPoliciesController
        Route::get('/CityMunicipal/nutritionpolicies', [CMSNutritionPoliciesController::class, 'index'])->name('CMSnutritionpolicies.index');
        Route::POST('/CityMunicipal/nutritionpolicies', [CMSNutritionPoliciesController::class, 'store'])->name('CMSnutritionpolicies.store');
        Route::get('/CityMunicipal/nutritionpolicies/create', [CMSNutritionPoliciesController::class, 'create'])->name('CMSnutritionpolicies.create');
        Route::put('/CityMunicipal/nutritionpolicies/{id}', [CMSNutritionPoliciesController::class, 'update'])->name('CMSnutritionpolicies.update');
        Route::get('/CityMunicipal/nutritionpolicies/{id}/edit', [CMSNutritionPoliciesController::class, 'edit'])->name('CMSnutritionpolicies.edit');
        Route::POST('/CityMunicipal/nutritionpolicies/delete', [CMSNutritionPoliciesController::class, 'destroy'])->name('CMSnutritionpolicies.destroy');
        Route::get('/CityMunicipal/nutritionpolicies/{id}/show', [CMSNutritionPoliciesController::class, 'show'])->name('CMSnutritionpolicies.show');
        Route::POST('/CityMunicipal/nutritionpolicies/{id}/download-pdf', [CMSNutritionPoliciesController::class, 'downloads'])->name('CMSnutritionpolicies.download');


        //GovernanceController
        Route::get('/CityMunicipal/governance', [CMSGovernanceController::class, 'index'])->name('CMSgovernance.index');
        Route::POST('/CityMunicipal/governance', [CMSGovernanceController::class, 'store'])->name('CMSgovernance.store');
        Route::get('/CityMunicipal/governance/create', [CMSGovernanceController::class, 'create'])->name('CMSgovernance.create');
        Route::put('/CityMunicipal/governance/{id}', [CMSGovernanceController::class, 'update'])->name('CMSgovernance.update');
        Route::get('/CityMunicipal/governance/{id}/edit', [CMSGovernanceController::class, 'edit'])->name('CMSgovernance.edit');
        Route::POST('/CityMunicipal/governance/delete', [CMSGovernanceController::class, 'destroy'])->name('CMSgovernance.destroy');
        Route::get('/CityMunicipal/governance/{id}/show', [CMSGovernanceController::class, 'show'])->name('CMSgovernance.show');
        Route::POST('/CityMunicipal/governance/{id}/download-pdf', [CMSGovernanceController::class, 'downloads'])->name('CMSgovernance.download');

        //NutritionServicesController
        Route::get('/CityMunicipal/lncmanagement', [CMSLNCManagementBarangayController::class, 'index'])->name('CMSlncmanagement.index');
        Route::POST('/CityMunicipal/lncmanagement', [CMSLNCManagementBarangayController::class, 'store'])->name('CMSlncmanagement.store');
        Route::get('/CityMunicipal/lncmanagement/create', [CMSLNCManagementBarangayController::class, 'create'])->name('CMSlncmanagement.create');
        Route::put('/CityMunicipal/lncmanagement/{id}', [CMSLNCManagementBarangayController::class, 'update'])->name('CMSlncmanagement.update');
        Route::get('/CityMunicipal/lncmanagement/{id}/edit', [CMSLNCManagementBarangayController::class, 'edit'])->name('CMSlncmanagement.edit');
        Route::POST('/CityMunicipal/lncmanagement/delete', [CMSLNCManagementBarangayController::class, 'destroy'])->name('CMSlncmanagement.destroy');
        Route::get('/CityMunicipal/lncmanagement/{id}/show', [CMSLNCManagementBarangayController::class, 'show'])->name('CMSlncmanagement.show');
        Route::POST('/CityMunicipal/lncmanagement/{id}/download-pdf', [CMSLNCManagementBarangayController::class, 'downloads'])->name('CMSlncmanagement.download');


        //NutritionServicesController
        Route::get('/CityMunicipal/nutritionservice', [CMSNutritionServiceController::class, 'index'])->name('CMSnutritionservice.index');
        Route::POST('/CityMunicipal/nutritionservice', [CMSNutritionServiceController::class, 'store'])->name('CMSnutritionservice.store');
        Route::get('/CityMunicipal/nutritionservice/create', [CMSNutritionServiceController::class, 'create'])->name('CMSnutritionservice.create');
        Route::put('/CityMunicipal/nutritionservice/{id}', [CMSNutritionServiceController::class, 'update'])->name('CMSnutritionservice.update');
        Route::get('/CityMunicipal/nutritionservice/{id}/edit', [CMSNutritionServiceController::class, 'edit'])->name('CMSnutritionservice.edit');
        Route::POST('/CityMunicipal/nutritionservice/delete', [CMSNutritionServiceController::class, 'destroy'])->name('CMSnutritionservice.destroy');
        Route::get('/CityMunicipal/nutritionservice/{id}/show', [CMSNutritionServiceController::class, 'show'])->name('CMSnutritionservice.show');
        Route::POST('/CityMunicipal/nutritionservice/{id}/download-pdf', [CMSNutritionServiceController::class, 'downloads'])->name('CMSnutritionservice.download');

        //ChangeNSController
        Route::get('/CityMunicipal/changeNS', [CMSChangeNSController::class, 'index'])->name('CMSchangeNS.index');
        Route::POST('/CityMunicipal/changeNS', [CMSChangeNSController::class, 'store'])->name('CMSchangeNS.store');
        Route::get('/CityMunicipal/changeNS/create', [CMSChangeNSController::class, 'create'])->name('CMSchangeNS.create');
        Route::put('/CityMunicipal/changeNS/{id}', [CMSChangeNSController::class, 'update'])->name('CMSchangeNS.update');
        Route::get('/CityMunicipal/changeNS/{id}/edit', [CMSChangeNSController::class, 'edit'])->name('CMSchangeNS.edit');
        Route::POST('/CityMunicipal/changeNS/delete', [CMSChangeNSController::class, 'destroy'])->name('CMSchangeNS.destroy');
        Route::get('/CityMunicipal/changeNS/{id}/show', [CMSChangeNSController::class, 'show'])->name('CMSchangeNS.show');
        Route::POST('/CityMunicipal/changeNS/{id}/download-pdf', [CMSChangeNSController::class, 'downloads'])->name('CMSchangeNS.download');

        //DiscussionQuestionController
        Route::get('/CityMunicipal/discussionquestion', [CMSDiscussionQuestionController::class, 'index'])->name('CMSdiscussionquestion.index');
        Route::POST('/CityMunicipal/discussionquestion', [CMSDiscussionQuestionController::class, 'store'])->name('CMSdiscussionquestion.store');
        Route::get('/CityMunicipal/discussionquestion/create', [CMSDiscussionQuestionController::class, 'create'])->name('CMSdiscussionquestion.create');
        Route::put('/CityMunicipal/discussionquestion/{id}', [CMSDiscussionQuestionController::class, 'update'])->name('CMSdiscussionquestion.update');
        Route::get('/CityMunicipal/discussionquestion/{id}/edit', [CMSDiscussionQuestionController::class, 'edit'])->name('CMSdiscussionquestion.edit');
        Route::POST('/CityMunicipal/discussionquestion/delete', [CMSDiscussionQuestionController::class, 'destroy'])->name('CMSdiscussionquestion.destroy');
        Route::get('/CityMunicipal/discussionquestion/{id}/show', [CMSDiscussionQuestionController::class, 'show'])->name('CMSdiscussionquestion.show');


        //BudgetController
        Route::get('/CityMunicipal/budgetAIP', [CMSBudgetAIPController::class, 'index'])->name('CMSbudgetAIP.index');
        Route::POST('/CityMunicipal/budgetAIP', [CMSBudgetAIPController::class, 'store'])->name('CMSbudgetAIP.store');
        Route::get('/CityMunicipal/budgetAIP/create', [CMSBudgetAIPController::class, 'create'])->name('CMSbudgetAIP.create');
        Route::put('/CityMunicipal/budgetAIP/{id}', [CMSBudgetAIPController::class, 'update'])->name('CMSbudgetAIP.update');
        Route::get('/CityMunicipal/budgetAIP/{id}/edit', [CMSBudgetAIPController::class, 'edit'])->name('CMSbudgetAIP.edit');
        Route::DELETE('/CityMunicipal/budgetAIP/{id}', [CMSBudgetAIPController::class, 'destroy'])->name('CMSbudgetAIP.destroy');

        // Resources Link
        //Nutrition Office
        Route::get('/personnelDnaDirectoryIndex', [CMSPersonnelDnaDirectoryController::class, 'index'])->name('CMSpersonnelDnaDirectory.index');
        Route::get('/personnelDnaDirectory', [CMSPersonnelDnaDirectoryController::class, 'create'])->name('CMSpersonnelDnaDirectory.create');
        Route::post('/personnelDnaDirectory/nao', [CMSPersonnelDnaDirectoryController::class, 'storeNAO'])->name('CMSpersonnelDnaDirectory.storeNAO');
        Route::post('/personnelDnaDirectory/npc', [CMSPersonnelDnaDirectoryController::class, 'storeNPC'])->name('CMSpersonnelDnaDirectory.storeNPC');
        Route::post('/personnelDnaDirectory/bns', [CMSPersonnelDnaDirectoryController::class, 'storeBNS'])->name('CMSpersonnelDnaDirectory.storeBNS');

       
        // Route::get('/nutritionOfficesIndex', [App\Http\Controllers\Admin\CityMunicipalStaff\CMSNutritionOfficesController::class, 'index'])->name('nutrition.index');
        Route::get('/nutritionOfficesC', [CMSNutritionOfficesController::class, 'create'])->name('CMSnutritionOffices.create');
        Route::get('/nutriOfficeIndexC', [CMSNutritionOfficesController::class, 'nutriOfficeIndex'])->name('CMSnutritionOffices.nutriOfficeIndex');
        Route::get('/nutritionOfficesIndexC', [CMSNutritionOfficesController::class, 'create'])->name('nutrition');


        Route::get('/nutritioffices', [CMSNutritionOfficesController::class, 'Index'])->name('CMSnutritionffices.indexB');
        Route::get('/nutritioffices/create', [CMSNutritionOfficesController::class, 'create'])->name('CMSnutritionffices.create');
        Route::post('/nutritioffices/store', [CMSNutritionOfficesController::class, 'store'])->name('CMSnutritionffices.store');
        Route::get('/nutritiofficesIndex', [CMSNutritionOfficesController::class, 'nutriOfficeIndex'])->name('CMSnutritionffices.indexA');

        Route::get('CityMunicipal/nutritioffices', [CMSNutritionOfficesController::class, 'Index'])->name('CMEnutritionffices.indexB');
        
        Route::get('/equipmentInventoryIndexC', [CMSEquipmentInventoryController::class, 'index'])->name('CMSequipmentInventory.index');
        Route::get('/equipmentInventoryC', [CMSEquipmentInventoryController::class, 'create'])->name('CMSequipmentInventory.create');
        Route::post('/equipmentInventoryC', [CMSEquipmentInventoryController::class, 'store'])->name('CMSequipmentInventory.store');

        //    Review
        Route::get('/provinces/{region}', [CMSEquipmentInventoryController::class, 'getProvincesByRegion'])->name('equipment.provinces.byRegion.get');
        Route::get('/cities/{provcode}', [CMSEquipmentInventoryController::class, 'getCitiesByProvince'])->name('equipment.cities.byProvince.get');
        Route::get('/regions', [CMSEquipmentInventoryController::class, 'getRegions'])->name('equipment.regions.get');

        Route::get('/provinces/{region}', [CMSPersonnelDnaDirectoryController::class, 'getProvincesByRegion'])->name('personneldnadirectory.provinces.byRegion.get');
        Route::get('/cities/{provcode}', [CMSPersonnelDnaDirectoryController::class, 'getCitiesByProvince'])->name('personneldnadirectory.cities.byProvince.get');
        Route::get('/regions', [CMSPersonnelDnaDirectoryController::class, 'getRegions'])->name('personneldnadirectory.regions.get');






        //BarangayScholar
        //============================================================================================================================================================
        //MellpiPro LGUProfile  
        //LGUProfile 
        Route::get('BarangayScholar/lguprofile', [BSLGUprofileController::class, 'index'])->name('BSLGUprofile.index');
        //Route::POST('/lguprofile', [BSLGUprofileController::class, 'storeDraft'])->name('BSLGUprofile.storeDraft');
        Route::get('BarangayScholar/lguprofile/{id}/show', [BSLGUprofileController::class, 'show'])->name('BSLGUprofile.show');
        Route::POST('BarangayScholar/lguprofile', [BSLGUprofileController::class, 'storeSubmit'])->name('BSLGUprofilest.storeSubmit');
        Route::get('BarangayScholar/lguprofile/create', [BSLGUprofileController::class, 'create'])->name('BSLGUprofile.create');
        Route::put('BarangayScholar/lguprofile/{id}', [BSLGUprofileController::class, 'update'])->name('BSLGUprofile.update');
        Route::get('BarangayScholar/lguprofile/{id}/edit', [BSLGUprofileController::class, 'edit'])->name('BSLGUprofile.edit');
        Route::POST('BarangayScholar/lguprofile/delete', [BSLGUprofileController::class, 'destroy'])->name('BSLGUprofile.destroy'); 
        Route::POST('BarangayScholar/lguprofile/{id}/download-pdf', [BSLGUprofileController::class, 'downloads'])->name('BSLGUprofile.download');

        //VisionMissionController
        Route::get('BarangayScholar/visionmission', [VisionMissionController::class, 'index'])->name('visionmission.index');
        Route::POST('BarangayScholar/visionmission', [VisionMissionController::class, 'store'])->name('visionmission.store');
        Route::get('BarangayScholar/visionmission/create', [VisionMissionController::class, 'create'])->name('visionmission.create');
        Route::put('BarangayScholar/visionmission/{id}', [VisionMissionController::class, 'update'])->name('visionmission.update');
        Route::get('BarangayScholar/visionmission/{id}/edit', [VisionMissionController::class, 'edit'])->name('visionmission.edit');
        Route::post('BarangayScholar/visionmission/delete', [VisionMissionController::class, 'destroy'])->name('visionmission.destroy');
        Route::get('BarangayScholar/visionmission/{id}/show', [VisionMissionController::class, 'show'])->name('visionmission.show');
        Route::POST('BarangayScholar/visionmission/{id}/download-pdf', [VisionMissionController::class, 'downloads'])->name('visionmission.download');

        //NutritionPoliciesController
        Route::get('BarangayScholar/nutritionpolicies', [NutritionPoliciesController::class, 'index'])->name('nutritionpolicies.index');
        Route::POST('BarangayScholar/nutritionpolicies', [NutritionPoliciesController::class, 'store'])->name('nutritionpolicies.store');
        Route::get('BarangayScholar/nutritionpolicies/create', [NutritionPoliciesController::class, 'create'])->name('nutritionpolicies.create');
        Route::put('BarangayScholar/nutritionpolicies/{id}', [NutritionPoliciesController::class, 'update'])->name('nutritionpolicies.update');
        Route::get('BarangayScholar/nutritionpolicies/{id}/edit', [NutritionPoliciesController::class, 'edit'])->name('nutritionpolicies.edit');
        Route::POST('BarangayScholar/nutritionpolicies/delete', [NutritionPoliciesController::class, 'destroy'])->name('nutritionpolicies.destroy');
        Route::get('BarangayScholar/nutritionpolicies/{id}/show', [NutritionPoliciesController::class, 'show'])->name('nutritionpolicies.show');
        Route::POST('BarangayScholar/nutritionpolicies/{id}/download-pdf', [NutritionPoliciesController::class, 'downloads'])->name('nutritionpolicies.download');

        //GovernanceController
        Route::get('BarangayScholar/governance', [GovernanceController::class, 'index'])->name('governance.index');
        Route::POST('BarangayScholar/governance', [GovernanceController::class, 'store'])->name('governance.store');
        Route::get('BarangayScholar/governance/create', [GovernanceController::class, 'create'])->name('governance.create');
        Route::put('BarangayScholar/governance/{id}', [GovernanceController::class, 'update'])->name('governance.update');
        Route::get('BarangayScholar/governance/{id}/edit', [GovernanceController::class, 'edit'])->name('governance.edit');
        Route::POST('BarangayScholar/governance/delete', [GovernanceController::class, 'destroy'])->name('governance.destroy');
        Route::get('BarangayScholar/governance/{id}/show', [GovernanceController::class, 'show'])->name('governance.show');
        Route::POST('BarangayScholar/governance/{id}/download-pdf', [GovernanceController::class, 'downloads'])->name('governance.download');

        //NutritionServicesController
        Route::get('BarangayScholar/lncmanagement', [LNCManagementBarangayController::class, 'index'])->name('lncmanagement.index');
        Route::POST('BarangayScholar/lncmanagement', [LNCManagementBarangayController::class, 'store'])->name('lncmanagement.store');
        Route::get('BarangayScholar/lncmanagement/create', [LNCManagementBarangayController::class, 'create'])->name('lncmanagement.create');
        Route::put('BarangayScholar/lncmanagement/{id}', [LNCManagementBarangayController::class, 'update'])->name('lncmanagement.update');
        Route::get('BarangayScholar/lncmanagement/{id}/edit', [LNCManagementBarangayController::class, 'edit'])->name('lncmanagement.edit');
        Route::POST('BarangayScholar/lncmanagement/delete', [LNCManagementBarangayController::class, 'destroy'])->name('lncmanagement.destroy');
        Route::get('BarangayScholar/lncmanagement/{id}/show', [LNCManagementBarangayController::class, 'show'])->name('lncmanagement.show');
        Route::POST('BarangayScholar/lncmanagement/{id}/download-pdf', [LNCManagementBarangayController::class, 'downloads'])->name('lncmanagement.download');

        //NutritionServicesController
        Route::get('BarangayScholar/nutritionservice', [NutritionServiceController::class, 'index'])->name('nutritionservice.index');
        Route::POST('BarangayScholar/nutritionservice', [NutritionServiceController::class, 'store'])->name('nutritionservice.store');
        Route::get('BarangayScholar/nutritionservice/create', [NutritionServiceController::class, 'create'])->name('nutritionservice.create');
        Route::put('BarangayScholar/nutritionservice/{id}', [NutritionServiceController::class, 'update'])->name('nutritionservice.update');
        Route::get('BarangayScholar/nutritionservice/{id}/edit', [NutritionServiceController::class, 'edit'])->name('nutritionservice.edit');
        Route::POST('BarangayScholar/nutritionservice/delete', [NutritionServiceController::class, 'destroy'])->name('nutritionservice.destroy');
        Route::get('BarangayScholar/nutritionservice/{id}/show', [NutritionServiceController::class, 'show'])->name('nutritionservice.show');
        Route::POST('BarangayScholar/nutritionservice/{id}/download-pdf', [NutritionServiceController::class, 'downloads'])->name('nutritionservice.download');

        //ChangeNSController
        Route::get('BarangayScholar/changeNS', [ChangeNSController::class, 'index'])->name('changeNS.index');
        Route::POST('BarangayScholar/changeNS', [ChangeNSController::class, 'store'])->name('changeNS.store');
        Route::get('BarangayScholar/changeNS/create', [ChangeNSController::class, 'create'])->name('changeNS.create');
        Route::put('BarangayScholar/changeNS/{id}', [ChangeNSController::class, 'update'])->name('changeNS.update');
        Route::get('BarangayScholar/changeNS/{id}/edit', [ChangeNSController::class, 'edit'])->name('changeNS.edit');
        Route::POST('BarangayScholar/changeNS/delete', [ChangeNSController::class, 'destroy'])->name('changeNS.destroy');
        Route::get('BarangayScholar/changeNS/{id}/show', [ChangeNSController::class, 'show'])->name('changeNS.show');
        Route::POST('BarangayScholar/changeNS/{id}/download-pdf', [ChangeNSController::class, 'downloads'])->name('changeNS.download');

        //DiscussionQuestionController
        Route::get('BarangayScholar/discussionquestion', [DiscussionQuestionController::class, 'index'])->name('discussionquestion.index');
        Route::POST('BarangayScholar/discussionquestion', [DiscussionQuestionController::class, 'store'])->name('discussionquestion.store');
        Route::get('BarangayScholar/discussionquestion/create', [DiscussionQuestionController::class, 'create'])->name('discussionquestion.create');
        Route::put('BarangayScholar/discussionquestion/{id}', [DiscussionQuestionController::class, 'update'])->name('discussionquestion.update');
        Route::get('BarangayScholar/discussionquestion/{id}/edit', [DiscussionQuestionController::class, 'edit'])->name('discussionquestion.edit');
        Route::POST('BarangayScholar/discussionquestion/delete', [DiscussionQuestionController::class, 'destroy'])->name('discussionquestion.destroy');
        Route::get('BarangayScholar/discussionquestion/{id}/show', [DiscussionQuestionController::class, 'show'])->name('discussionquestion.show');

        //BudgetController
        Route::get('BarangayScholar/budgetAIP', [BudgetAIPController::class, 'index'])->name('budgetAIP.index');
        Route::POST('BarangayScholar/budgetAIP', [BudgetAIPController::class, 'store'])->name('budgetAIP.store');
        Route::get('BarangayScholar/budgetAIP/create', [BudgetAIPController::class, 'create'])->name('budgetAIP.create');
        Route::put('BarangayScholar/budgetAIP/{id}', [BudgetAIPController::class, 'update'])->name('budgetAIP.update');
        Route::get('BarangayScholar/budgetAIP/{id}/edit', [BudgetAIPController::class, 'edit'])->name('budgetAIP.edit');
        Route::DELETE('BarangayScholar/budgetAIP/{id}', [BudgetAIPController::class, 'destroy'])->name('budgetAIP.destroy');


        //MellpiPro LNFP  ============================================================================================================================================================
        //Form 5 Monitoring
        Route::get('/lguform5Index', [MellpiProForLNFP_barangayController::class, 'monitoringForm5'])->name('MellpiProMonitoringIndex.index');
        Route::get('/lguform5Create', [MellpiProForLNFP_barangayController::class, 'monitoringForm5create'])->name(('MellpiProMonitoringCreate.create'));
        Route::post('/lguLnfpUpdate/{id}', [MellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdate');
        Route::post('/lguLnfpUpdate', [MellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdates');
        Route::put('/lguLnfpUpdate', [MellpiProForLNFP_barangayController::class, 'editForm5a'])->name('lguLnfpUpdateRemarks');
        Route::POST('/lguLnfpDelete', [MellpiProForLNFP_barangayController::class, 'deleteForm5arr'])->name('lguLnfpDeleteForm5a');
        Route::get('/lguLnfpEdit/{id}', [MellpiProForLNFP_barangayController::class, 'monitoringForm5edit'])->name('lguLnfpEditForm5');
        Route::get('/lguform5createdata', [MellpiProForLNFP_barangayController::class, 'createdata'])->name('form5CreateData');
        Route::get('/lguForm5addForm/{id}', [MellpiProForLNFP_barangayController::class, 'addForm'])->name('lguForm5addForm');
        Route::get('/lguForm5ViewForm/{id}', [MellpiProForLNFP_barangayController::class, 'monitoringForm5view'])->name('lguForm5ViewForm');
        Route::post('/toggle-switch', [MellpiProForLNFP_barangayController::class, 'handleSwitch'])->name('toggle.switch');


        //Form 5 dynamic forms
        // Route::post('/fetch-form-data', [MellpiProForLNFP_barangayController::class, 'fetchFormData'])->name('fetch.form.data'); 
        
        //Form 6 Radial Diagram
        Route::get('/lguform6Index', [MellpiProForLNFP_form6Controller::class, 'radialForm6'])->name('MellpiProRadialIndex.index');
        Route::get('lguform6Create', [MellpiProForLNFP_form6Controller::class, 'radialForm6Create'])->name('MellpiProRadialCreate.create');
        Route::get('/lguform6Edit/{id}', [MellpiProForLNFP_form6Controller::class, 'radialForm6Create'])->name('lguLnfpEditForm6');
        Route::get('/lguform6View/{id}', [MellpiProForLNFP_form6Controller::class, 'radialForm6View'])->name('lguLnfpViewForm6');
        //   Route::post('/lguform7Update/{id}', [MellpiProForLNFP_form6Controller::class, 'storeform7'])->name('lnfpUpdateform7');
        Route::post('BarangayScholar/lguform7Update/{id}', [MellpiProForLNFP_form6Controller::class, 'storeform7'])->name('lnfpUpdateform7');
        
        //Form 8 Action Sheet
        Route::get('/lguform8Index', [MellpiProForLNFP_form8Controller::class, 'ActionSheetForm8'])->name('lnfpForm8Index');
        Route::get('/lguform8Create', [MellpiProForLNFP_form8Controller::class, 'ActionSheetForm8Create'])->name('lnfpForm8Create');
        Route::post('/lguform8Store', [MellpiProForLNFP_form8Controller::class, 'storeASForm8'])->name('lnfpForm8Store');
        Route::get('/lguLnfpDeleteForm8/{id}', [MellpiProForLNFP_form8Controller::class, 'deleteForm8'])->name('deleteForm8');
        Route::get('/lguLnfpEditForm8/{id}', [MellpiProForLNFP_form8Controller::class, 'ActionSheetForm8Edit'])->name('editForm8');
        Route::get('/lguLnfpViewForm8/{id}', [MellpiProForLNFP_form8Controller::class, 'ActionSheetForm8View'])->name('viewForm8');
        Route::post('/lguLnfpUpdateForm8/{id}', [MellpiProForLNFP_form8Controller::class, 'storeUpdateASForm8'])->name('MellpiProForLNFPUpdate.storeUpdateASForm8');
        
        //Interview Form
        Route::get('/lguformInterviewIndex', [MellpiProForLNFP_InterviewController::class, 'InterviewFormLNFP'])->name('lnfpFormInterviewIndex');
        Route::get('/lguformInterviewCreate', [MellpiProForLNFP_InterviewController::class, 'InterviewFormLNFPCreate'])->name('lnfpFormInterviewCreate');
        Route::post('/lguLnfpInterviewStore', [MellpiProForLNFP_InterviewController::class, 'storeInterviewForm'])->name('lnfpInterviewStore');
        Route::get('/lguLnfpDeleteInterview/{id}', [MellpiProForLNFP_InterviewController::class, 'deleteIntForm'])->name('deleteIntForm');
        Route::get('/lguLnfpEditInterview/{id}', [MellpiProForLNFP_InterviewController::class, 'InterviewFormLNFPEdit'])->name('editIntForm');
        Route::get('/lguLnfpViewInterview/{id}', [MellpiProForLNFP_InterviewController::class, 'InterviewFormLNFPView'])->name('viewIntForm');
        Route::post('/lguLnfpUpdateInterview/{id}', [MellpiProForLNFP_InterviewController::class, 'storeInterviewFormUpdate'])->name('MellpiProForLNFPUpdate.storeUpdateIntForm');
        
        //Overall Score
        Route::get('/lguformOverallScoreIndex', [MellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFP'])->name('lnfpFormOverallScoreIndex');
        Route::get('/lguLnfpOverallScoreCreate', [MellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFPCreate'])->name('lnfpFormOverallScoreCreate');
        Route::get('/lguLnfpEditOverall/{id}', [MellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFPEdit'])->name('editOSForm');
        Route::get('/lguLnfpViewOverall/{id}', [MellpiProForLNFP_OverallScoreController::class, 'OverallScoreFormLNFPView'])->name('viewOSForm');
        Route::post('/lguLnfpUpdateOverall', [MellpiProForLNFP_OverallScoreController::class, 'update'])->name('updateOSForm');
       
        //Summary
        Route::get('/mellpi-pro-lnfp-summary', [MellpiProForLNFP_SummaryController::class, 'index'])->name('MellpiProLNFPSummary.index');

        //Resources  ============================================================================================================================================================
        // Equipment Inventory
        Route::get('/equipmentInventoryIndex', [BSEquipmentInventoryController::class, 'index'])->name('BSequipmentInventory.index');
        Route::get('/equipmentInventory/create', [BSEquipmentInventoryController::class, 'create'])->name('BSequipmentInventory.create');
        Route::get('/equipmentInventory/edit', [BSEquipmentInventoryController::class, 'edit'])->name('BSequipmentInventory.edit');
        Route::put('/equipmentInventory/update', [BSEquipmentInventoryController::class, 'update'])->name('BSequipmentInventory.update');
        Route::delete('/equipmentInventory/delete', [BSEquipmentInventoryController::class, 'destroy'])->name('BSequipmentInventory.delete');
        Route::post('/equipmentInventory', [BSEquipmentInventoryController::class, 'store'])->name('BSequipmentInventory.store');
        Route::get('/equipmentInventory/cities-municipalities', [BSEquipmentInventoryController::class, 'getCitiesAndMunicipalitiesInventory'])->name('BSequipmentInventory.CMInventory.get');
    
        //Nutrition Offices
        Route::get('/nutritionOfficesIndex', [BSNutritionOfficesController::class, 'index'])->name('BSnutritionOffices.index');
        Route::get('/nutritionOffices', [BSNutritionOfficesController::class, 'create'])->name('BSnutritionOffices.create');
        Route::post('/nutritionOffices', [BSNutritionOfficesController::class, 'store'])->name('BSnutritionOffices.store');
        Route::get('/nutriOfficeIndex', [BSNutritionOfficesController::class, 'nutriOfficeIndex'])->name('nutriOfficeIndex');

        //Nutrition Office
        Route::get('/bspersonnelDnaDirectory', [BSPersonnel::class, 'index'])->name('BSpersonnel.index');
        Route::get('/bspersonnelDnaDirectory/personnel', [BSPersonnel::class, 'getPersonel'])->name('BSpersonnel.get');
        Route::get('/bspersonnelDnaDirectory/create', [BSPersonnel::class, 'create'])->name('BSpersonnel.create');
        Route::put('/bspersonnelDnaDirectory/edit', [BSPersonnel::class, 'edit'])->name('BSpersonnel.edit');
        Route::delete('/bspersonnelDnaDirectory/delete', [BSPersonnel::class, 'destroy'])->name('BSpersonnel.delete');
        Route::post('/bspersonnelDnaDirectory/nao', [BSPersonnel::class, 'storeNAO'])->name('BSpersonnel.storeNAO');
        Route::post('/bspersonnelDnaDirectory/npc', [BSPersonnel::class, 'storeNPC'])->name('BSpersonnel.storeNPC');
        Route::post('/bspersonnelDnaDirectory/bns', [BSPersonnel::class, 'storeBNS'])->name('BSpersonnel.storeBNS');
    });


    //userRequestReview
    Route::middleware(['auth', 'PublicUser'])->group(function () {

    });



    //userRequestReview
    Route::prefix('UserUnderReview')->middleware(['auth', 'UserUnderReview'])->group(function () {
        Route::get('/requestdashboard', [UserReviewController::class, 'index'])->name('UURdashboard.index');
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

// Location
Route::prefix('location')->group(function () {
    Route::get('/regions', [EquipmentInventoryController::class, 'getRegions'])->name('location.regions.get');
    Route::get('/provinces', [EquipmentInventoryController::class, 'getProvinces'])->name('location.provinces.get');
    Route::get('/cities', [EquipmentInventoryController::class, 'getCities'])->name('location.cities.get');
    Route::get('/highly-urbanized-cities', [EquipmentInventoryController::class, 'getHighlyUrbanizedCities'])->name('location.highlyUrbanizedCities.get');
    Route::get('/independent-component-cities', [EquipmentInventoryController::class, 'getIndependentComponentCities'])->name('location.independentComponentCities.get');
    Route::get('/component-cities', [EquipmentInventoryController::class, 'getComponentCities'])->name('location.componentCities.get');
    Route::get('/municipalities', [EquipmentInventoryController::class, 'getMunicipalities'])->name('location.municipalities.get');
    Route::get('/sub-municipalities', [EquipmentInventoryController::class, 'getSubMunicipalities'])->name('location.subMunicipalities.get');
    Route::get('/barangays', [EquipmentInventoryController::class, 'getBarangays'])->name('location.barangays.get');
    Route::get('/cities-municipalities', [EquipmentInventoryController::class, 'getCitiesAndMunicipalities'])->name('location.citiesAndMunicipalities.get');
});

 