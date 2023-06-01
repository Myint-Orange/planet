<?php

use App\Http\Controllers\AboutUs\AboutUsController;
use App\Http\Controllers\AboutUs\CoreValueController;
use App\Http\Controllers\AboutUs\GroupStructureController;
use App\Http\Controllers\AboutUs\HistoryController;

use App\Http\Controllers\AboutUs\NetworkController;
use App\Http\Controllers\AboutUs\OrgController;
use App\Http\Controllers\AboutUs\PrideController;
use App\Http\Controllers\AboutUs\VisionMissionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ContactUs\ContactFormController;
use App\Http\Controllers\ContactUs\ContactUsController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\IR\AnalysisController;
use App\Http\Controllers\IR\BasicInfoController;
use App\Http\Controllers\IR\FinancialStatemantController;
use App\Http\Controllers\IR\ShareHolderController;
use App\Http\Controllers\Knowledge\ActivityController;
use App\Http\Controllers\Knowledge\InterestController;
use App\Http\Controllers\Knowledge\KnowledgeController;
use App\Http\Controllers\Knowledge\SocialController;
use App\Http\Controllers\MainPage\MainPageController;
use App\Http\Controllers\OurBusiness\BusinessController;
use App\Http\Controllers\OurBusiness\BusinessGroupController;
use App\Http\Controllers\OurBusiness\BusinessPostController;
use App\Http\Controllers\OverView\OverViewController;
use App\Http\Controllers\User\AboutUs\UserBusinessController;
use App\Http\Controllers\User\AboutUs\UserCoreValueController;
use App\Http\Controllers\User\AboutUs\UserVisionMissionController;
use App\Http\Controllers\User\ForAllPageController;
use App\Http\Controllers\User\MainPage\UserController;
use App\Http\Controllers\User\UserKnowledgeController;
use App\Http\Controllers\User\UserOurBusinessController;
use App\Http\Controllers\User\UserOverViewController;
use App\Http\Controllers\User\UserWorkWithUsController;
use App\Http\Controllers\WorkWithUs\BenefitController;
use App\Http\Controllers\WorkWithUs\findJobController;
use App\Http\Controllers\WorkWithUs\WorkWithUsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/clearcache', function () {
        $exitCode = Artisan::call('cache:clear');

        $exitCode = Artisan::call('route:cache');
        $exitCode = Artisan::call('route:clear');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('config:cache');
        return '<h1>Cache facade value cleared</h1>';
    });
    Route::group(['middleware' => ['auth']], function () {


        Route::get('/aboutus/network/index', [NetworkController::class, 'index'])->name('network.index');
        Route::post('/aboutus/network/editImage', [NetworkController::class, 'editImage'])->name('network.editImage');
        Route::post('/aboutus/network/updateType', [NetworkController::class, 'updateType'])->name('network.updateType');
        Route::get('/aboutus/network/create', [NetworkController::class, 'create'])->name('network.create');
        Route::post('/aboutus/network/store', [NetworkController::class, 'store'])->name('network.store');
        Route::get('/aboutus/network/update/{post_id}', [NetworkController::class, 'update'])->name('network.update');
        Route::post('/aboutus/network/edit/{lang}', [NetworkController::class, 'edit'])->name('network.edit');
        Route::get('/aboutus/network/destroyPost/{lang}', [NetworkController::class, 'destroyPost'])->name('network.destroyPost');

        Route::get('/aboutus/corevalue/index', [CoreValueController::class, 'index'])->name('corevalue.index');
        Route::post('/aboutus/corevalue/editImage', [CoreValueController::class, 'editImage'])->name('corevalue.editImage');
        Route::post('/aboutus/corevalue/updateType', [CoreValueController::class, 'updateType'])->name('corevalue.updateType');
        Route::get('/aboutus/corevalue/create', [CoreValueController::class, 'create'])->name('corevalue.create');
        Route::post('/aboutus/corevalue/store', [CoreValueController::class, 'store'])->name('corevalue.store');
        Route::get('/aboutus/corevalue/update/{post_id}', [CoreValueController::class, 'update'])->name('corevalue.update');
        Route::post('/aboutus/corevalue/edit/{lang}', [CoreValueController::class, 'edit'])->name('corevalue.edit');
        Route::get('/aboutus/corevalue/destroy/{lang}', [CoreValueController::class, 'destroy'])->name('corevalue.destroy');

        Route::get('/aboutus/vision/index', [VisionMissionController::class, 'index'])->name('vision.index');
        Route::post('/aboutus/vision/editMissionImage', [VisionMissionController::class, 'editMissionImage'])->name('vision.editMissionImage');
        Route::post('/aboutus/vision/updateVisionAndMission', [VisionMissionController::class, 'updateVisionAndMission'])->name('vision.updateVisionAndMission');
        Route::post('/aboutus/vision/updateVision', [VisionMissionController::class, 'updateVision'])->name('vision.updateVision');
        Route::get('/aboutus/vision/create', [VisionMissionController::class, 'create'])->name('vision.create');
        Route::post('/aboutus/vision/store', [VisionMissionController::class, 'store'])->name('vision.store');
        Route::get('/aboutus/vision/update/{post_id}', [VisionMissionController::class, 'update'])->name('vision.update');
        Route::post('/aboutus/vision/edit', [VisionMissionController::class, 'edit'])->name('vision.edit');
        Route::get('/aboutus/vision/destroyMission/{post_id}', [VisionMissionController::class, 'destroyMission'])->name('vision.destroyMission');

        Route::get('/aboutus/groupstructure/index', [GroupStructureController::class, 'index'])->name('groupstructure.index');
        Route::post('/aboutus/groupstructure/editImage', [GroupStructureController::class, 'editImage'])->name('groupstructure.editImage');
        Route::post('/aboutus/groupstructure/updateType', [GroupStructureController::class, 'updateType'])->name('groupstructure.updateType');
        Route::post('/aboutus/groupstructure/updateTypeDiagram', [GroupStructureController::class, 'updateTypeDiagram'])->name('groupstructure.updateTypeDiagram');
        Route::post('/aboutus/groupstructure/updateTypeContent', [GroupStructureController::class, 'updateTypeContent'])->name('groupstructure.updateTypeContent');
        Route::post('/aboutus/groupstructure/updateLanguageImages', [GroupStructureController::class, 'updateChartImage'])->name('groupstructure.updateLanguageImages');
        Route::get('/aboutus/groupstructure/create', [GroupStructureController::class, 'create'])->name('groupstructure.create');
        Route::post('/aboutus/groupstructure/store', [GroupStructureController::class, 'store'])->name('groupstructure.store');
        Route::get('/aboutus/groupstructure/update/{post_id}', [GroupStructureController::class, 'update'])->name('groupstructure.update');
        Route::post('/aboutus/groupstructure/edit', [GroupStructureController::class, 'edit'])->name('groupstructure.edit');
        Route::get('/aboutus/groupstructure/destroy/{post_id}', [GroupStructureController::class, 'destroy'])->name('groupstructure.destroy');

        Route::get('/aboutus/orgstructure/index', [OrgController::class, 'index'])->name('orgstructure.index');
        Route::post('/aboutus/orgstructure/editImage', [OrgController::class, 'editImage'])->name('orgstructure.editImage');
        Route::post('/aboutus/orgstructure/updateType', [OrgController::class, 'updateType'])->name('orgstructure.updateType');
        Route::get('/aboutus/orgstructure/create', [OrgController::class, 'create'])->name('orgstructure.create');
        Route::post('/aboutus/orgstructure/updateLanguageImages', [OrgController::class, 'updateDiagramImage'])->name('orgstructure.updateLanguageImages');
        Route::post('/aboutus/orgstructure/store', [OrgController::class, 'store'])->name('orgstructure.store');
        Route::get('/aboutus/orgstructure/update/{post_id}', [OrgController::class, 'update'])->name('orgstructure.update');
        Route::post('/aboutus/orgstructure/edit', [OrgController::class, 'edit'])->name('orgstructure.edit');
        Route::get('/aboutus/orgstructure/destroy/{post_id}', [OrgController::class, 'destroy'])->name('orgstructure.destroy');

        Route::get('/aboutus/history/index', [HistoryController::class, 'index'])->name('history.index');
        Route::post('/aboutus/history/editImage', [HistoryController::class, 'editImage'])->name('history.editImage');
        Route::post('/aboutus/history/updateType', [HistoryController::class, 'updateType'])->name('history.updateType');
        Route::post('/aboutus/history/updateObjective', [HistoryController::class, 'updateObjective'])->name('history.updateObjective');
        Route::post('/aboutus/history/updateHistory', [HistoryController::class, 'updateHistory'])->name('history.updateHistory');
        Route::post('/aboutus/history/updateConclusion', [HistoryController::class, 'updateConclusion'])->name('history.updateConclusion');
        Route::get('/aboutus/history/create', [HistoryController::class, 'create'])->name('history.create');
        Route::post('/aboutus/history/store', [HistoryController::class, 'store'])->name('history.store');
        Route::get('/aboutus/history/update/{post_id}', [HistoryController::class, 'update'])->name('history.update');
        Route::post('/aboutus/history/edit', [HistoryController::class, 'edit'])->name('history.edit');
        Route::get('/aboutus/history/destroy/{post_id}', [HistoryController::class, 'destroy'])->name('history.destroy');

        Route::get('/aboutus/pride/index', [PrideController::class, 'index'])->name('pride.index');
        Route::post('/aboutus/pride/editImage', [PrideController::class, 'editImage'])->name('pride.editImage');
        Route::post('/aboutus/pride/updateType', [PrideController::class, 'updateType'])->name('pride.updateType');
        Route::post('/aboutus/pride/edit', [PrideController::class, 'edit'])->name('pride.edit');
        Route::post('/aboutus/pride/updateCertificateImage', [PrideController::class, 'updateCertificateImage'])->name('pride.updateCertificateImage');

        Route::get('/knowledge/activity/index', [ActivityController::class, 'index'])->name('activity.index');
        Route::post('/knowledge/activity/editImage', [ActivityController::class, 'editImage'])->name('activity.editImage');
        Route::post('/knowledge/activity/updateType', [ActivityController::class, 'updateType'])->name('activity.updateType');
        Route::get('/knowledge/activity/update/{post_id}', [ActivityController::class, 'update'])->name('activity.update');
        Route::post('/knowledge/activity/edit', [ActivityController::class, 'edit'])->name('activity.edit');
        Route::get('/knowledge/activity/create', [ActivityController::class, 'create'])->name('activity.create');
        Route::post('/knowledge/activity/store', [ActivityController::class, 'store'])->name('activity.store');
        Route::get('/knowledge/activity/destroyImage/{id}/{post_id}', [ActivityController::class, 'destroyImage'])->name('activity.destroyImage');
        Route::get('/knowledge/activity/destroy/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');
        Route::get('/knowledge/activity/images/{imgId}', [ActivityController::class, 'destroyImage'])->name('images.destroyImage');

        Route::get('/knowledge/social/index', [SocialController::class, 'index'])->name('social.index');
        Route::post('/knowledge/social/editImage', [SocialController::class, 'editImage'])->name('social.editImage');
        Route::post('/knowledge/social/updateType', [SocialController::class, 'updateType'])->name('social.updateType');
        Route::get('/knowledge/social/update/{post_id}', [SocialController::class, 'update'])->name('social.update');
        Route::post('/knowledge/social/edit', [SocialController::class, 'edit'])->name('social.edit');
        Route::get('/knowledge/social/create', [SocialController::class, 'create'])->name('social.create');
        Route::post('/knowledge/social/store', [SocialController::class, 'store'])->name('social.store');
        Route::get('/knowledge/social/destroyImage/{id}/{post_id}', [SocialController::class, 'destroyImage'])->name('social.destroyImage');
        Route::get('/knowledge/social/destroy/{id}', [SocialController::class, 'destroy'])->name('social.destroy');
        // Route::post('/social/destroyVedio', [SocialController::class, 'destroyVedio'])->name('social.destroyVedio');
        // Route::post('/social/destroyYouTubeLink', [SocialController::class, 'destroyYouTubeLink'])->name('social.destroyYouTubeLink');

        Route::get('/knowledge/interest/index', [InterestController::class, 'index'])->name('interest.index');
        Route::post('/knowledge/interest/editImage', [InterestController::class, 'editImage'])->name('interest.editImage');
        Route::post('/knowledge/interest/updateType', [InterestController::class, 'updateType'])->name('interest.updateType');
        Route::get('/knowledge/interest/update/{post_id}', [InterestController::class, 'update'])->name('interest.update');
        Route::post('/knowledge/interest/edit', [InterestController::class, 'edit'])->name('interest.edit');
        Route::get('/knowledge/interest/create', [InterestController::class, 'create'])->name('interest.create');
        Route::post('/knowledge/interest/store', [InterestController::class, 'store'])->name('interest.store');
        Route::get('/knowledge/interest/destroyImage/{id}/{post_id}', [InterestController::class, 'destroyImage'])->name('interest.destroyImage');
        Route::get('/knowledge/interest/destroy/{id}', [InterestController::class, 'destroy'])->name('interest.destroy');

        Route::get('/businessGroup/business/index', [BusinessController::class, 'index'])->name('business.index');
        Route::post('/businessGroup/business/editImage', [BusinessController::class, 'editImage'])->name('business.editImage');
        Route::post('/businessGroup/business/updateType', [BusinessController::class, 'updateType'])->name('business.updateType');
        Route::get('/businessGroup/business/update/{post_id}', [BusinessController::class, 'update'])->name('business.update');
        Route::post('/businessGroup/business/edit', [BusinessController::class, 'edit'])->name('business.edit');
        Route::get('/businessGroup/business/create', [BusinessController::class, 'create'])->name('business.create');
        Route::post('/businessGroup/business/store', [BusinessController::class, 'store'])->name('business.store');
        Route::get('/businessGroup/business/destroyImage/{id}/{post_id}', [BusinessController::class, 'destroyImage'])->name('business.destroyImage');
        Route::get('/businessGroup/business/destroy/{id}/{', [BusinessController::class, 'destroy'])->name('business.destroy');

        Route::get('/businessGroup/businessPost/index/{type_id}', [BusinessPostController::class, 'index'])->name('businesspost.index');
        Route::post('/businessGroup/businessPost/editImage', [BusinessPostController::class, 'editImage'])->name('businesspost.editImage');
        Route::post('/businessGroup/businessPost/updateType', [BusinessPostController::class, 'updateType'])->name('businesspost.updateType');
        Route::get('/businessGroup/businessPost/update/{post_id}/{type_id}', [BusinessPostController::class, 'update'])->name('businesspost.update');
        Route::post('/businessGroup/businessPost/edit', [BusinessPostController::class, 'edit'])->name('businesspost.edit');
        Route::get('/businessGroup/businessPost/create/{type_id}', [BusinessPostController::class, 'create'])->name('businesspost.create');
        Route::post('/businessGroup/businessPost/store', [BusinessPostController::class, 'store'])->name('businesspost.store');
        Route::get('/businessGroup/businessPost/destroy/{post_id}/{type_id}', [BusinessPostController::class, 'destroy'])->name('businesspost.destroy');

        Route::get('/workwithus/benefit/index', [BenefitController::class, 'index'])->name('benefit.index');
        Route::post('/workwithus/benefit/editImage', [BenefitController::class, 'editImage'])->name('benefit.editImage');
        Route::post('/workwithus/benefit/updateType', [BenefitController::class, 'updateType'])->name('benefit.updateType');
        Route::get('/workwithus/benefit/update/{post_id}', [BenefitController::class, 'update'])->name('benefit.update');
        Route::post('/workwithus/benefit/edit', [BenefitController::class, 'edit'])->name('benefit.edit');
        Route::get('/workwithus/benefit/create', [BenefitController::class, 'create'])->name('benefit.create');
        Route::post('/workwithus/benefit/store', [BenefitController::class, 'store'])->name('benefit.store');
        Route::get('/workwithus/benefit/destroyImage/{id}/{post_id}', [BenefitController::class, 'destroyImage'])->name('benefit.destroyImage');
        Route::get('/workwithus/benefit/destroy/{id}', [BenefitController::class, 'destroy'])->name('benefit.destroy');

        Route::get('/contactus/index', [ContactUsController::class, 'index'])->name('contactus.index');
        Route::post('/contactus/editGetThere', [ContactUsController::class, 'editGetThere'])->name('contactus.editGetThere');
        Route::post('/contactus/editFollowUs', [ContactUsController::class, 'editFollowUs'])->name('contactus.editFollowUs');
        Route::post('/contactus/editAddress', [ContactUsController::class, 'editAddress'])->name('contactus.editAddress');
        Route::post('/contactus/editImage', [ContactUsController::class, 'editImage'])->name('contactus.editImage');
        Route::post('/contactus/updateTitle', [ContactUsController::class, 'updateTitle'])->name('contactus.updateTitle');
        Route::get('/contactus/update/{post_id}', [ContactUsController::class, 'update'])->name('contactus.update');
        Route::post('/contactus/edit', [ContactUsController::class, 'edit'])->name('contactus.edit');
        Route::get('/contactus/create', [ContactUsController::class, 'create'])->name('contactus.create');
        Route::post('/contactus/store', [ContactUsController::class, 'store'])->name('contactus.store');
        Route::get('/contactus/destroy/{id}', [ContactUsController::class, 'destroy'])->name('contactus.destroy');

        Route::get('/contactus/contactform/index', [ContactFormController::class, 'index'])->name('contactform.index');

        Route::get('/workwithus/findjob/index', [FindJobController::class, 'index'])->name('findjob.index');
        Route::post('/workwithus/findjob/editImage', [FindJobController::class, 'editImage'])->name('findjob.editImage');
        Route::post('/workwithus/findjob/updateType', [FindJobController::class, 'updateType'])->name('findjob.updateType');
        Route::get('/workwithus/findjob/update/{post_id}', [FindJobController::class, 'update'])->name('findjob.update');
        Route::post('/workwithus/findjob/edit', [FindJobController::class, 'edit'])->name('findjob.edit');
        Route::get('/workwithus/findjob/create', [FindJobController::class, 'create'])->name('findjob.create');
        Route::post('/workwithus/findjob/store', [FindJobController::class, 'store'])->name('findjob.store');
        Route::get('/workwithus/findjob/destroyImage/{id}/{post_id}', [FindJobController::class, 'destroyImage'])->name('findjob.destroyImage');
        Route::get('/workwithus/findjob/destroy/{id}', [FindJobController::class, 'destroy'])->name('findjob.destroy');
        Route::post('/workwithus/findjob/index', [FindJobController::class, 'index'])->name('contact.index');
        Route::post('/workwithus/findjob/editContact', [FindJobController::class, 'editContact'])->name('findjob.editContact');

        Route::get('/mainpage/welcome/index', [MainPageController::class, 'welcomeIndex'])->name('welcome.index');
        Route::post('/mainpage/welcome/editWelcomeTo', [MainPageController::class, 'editWelcomeTo'])->name('welcome.editWelcomeTo');
        Route::get('/mainpage/welcome/destroyImage/{imgId}', [MainPageController::class, 'destroyImage'])->name('welcome.destroyImage');
        Route::get('/mainpage/group/destroyGroupImage/{imgId}', [MainPageController::class, 'destroyImageGroup'])->name('welcome.destroyGroupImage');

        Route::get('/mainpage/service/index', [MainPageController::class, 'serviceIndex'])->name('service.index');
        Route::post('/mainpage/service/servicesEdit', [MainPageController::class, 'servicesEdit'])->name('service.servicesEdit');

        Route::get('/mainpage/OurBusiness/index', [MainPageController::class, 'ourBusinessIndex'])->name('ourBusiness.index');
        Route::post('/mainpage/OurBusiness/edit', [MainPageController::class, 'editOurBusiness'])->name('ourBusiness.editOurBusiness');

        Route::get('/mainpage/awards/index', [MainPageController::class, 'awardsIndex'])->name('awards.index');
        Route::post('/mainpage/awards/edit', [MainPageController::class, 'editAwards'])->name('awards.editAwards');

        Route::get('/mainpage/contact/index', [MainPageController::class, 'contactIndex'])->name('mainpage.contact.index');
        Route::post('/mainpage/contact/edit', [MainPageController::class, 'editContact'])->name('contact.editContact');


        Route::get('/mainpage/awards/index', [MainPageController::class, 'awardsIndex'])->name('awards.index');

        Route::post('/mainpage/destroyVedio', [MainPageController::class, 'destroyVedio'])->name('images.destroyVedio');
        Route::post('/mainpage/destroyYouTubeLink', [MainPageController::class, 'destroyYouTubeLink'])->name('images.destroyYouTubeLink');

        Route::get('/OverView/index', [OverViewController::class, 'index'])->name('overview.index');
        Route::post('/OverView/editGroup', [OverViewController::class, 'editTypeOverView'])->name('overview.editTypeOverView');
        Route::post('/OverView/editHistory', [OverViewController::class, 'editHistory'])->name('overview.editHistory');
        Route::post('/OverView/editCoreValue', [OverViewController::class, 'editCoreValue'])->name('overview.editCoreValue');
        Route::post('/OverView/editGroupStructure', [OverViewController::class, 'editGroupStructure'])->name('overview.editGroupStructure');
        Route::post('/OverView/editEmbryoNetWork', [OverViewController::class, 'editEmbryoNetWork'])->name('overview.editEmbryoNetwork');
        Route::post('/OverView/editOrgStructure', [OverViewController::class, 'editOrgStructure'])->name('overview.editOrgStructure');
        Route::post('/OverView/editAward', [OverViewController::class, 'editAward'])->name('overview.editAward');
        Route::post('/OverView/editVision', [OverViewController::class, 'editVision'])->name('overview.editVision');

        Route::get('/knowledge/index', [KnowledgeController::class, 'index'])->name('knowledge.index');
        Route::post('/knowledge/editImage', [KnowledgeController::class, 'editImage'])->name('knowledge.editImage');
        Route::get('/aboutus/index', [AboutUsController::class, 'index'])->name('aboutus.index');
        Route::post('/aboutus/editImage', [AboutUsController::class, 'editImage'])->name('aboutus.editImage');
        Route::get('/businessGroup/index', [BusinessGroupController::class, 'index'])->name('businessGroup.index');
        Route::post('/businessGroup/editImage', [BusinessGroupController::class, 'editImage'])->name('businessGroup.editImage');
        Route::get('/workwithus/index', [WorkWithUsController::class, 'index'])->name('workwithus.index');
        Route::post('/workwithus/editGroup', [WorkWithUsController::class, 'editGroup'])->name('workwithus.editGroup');
        Route::get('/contactus/indexContact', [ContactUsController::class, 'indexContact'])->name('contactus.indexContact');
        Route::get('/mainpage/index', [MainPageController::class, 'index'])->name('mainpage.index');
        Route::post('/mainpage/editBanner', [MainPageController::class, 'editBanner'])->name('mainpage.editBanner');

        Route::get('/IRBasicInfo/index', [BasicInfoController::class, 'index'])->name('IRBasicInfo.index');
        Route::post('/IRBasicInfo/edit', [BasicInfoController::class, 'edit'])->name('IRBasicInfo.edit');

        Route::get('/IRFinancialStatements/index', [FinancialStatemantController::class,'index'])->name('IRFinancial.index');
        Route::post('/IRFinancialStatements/editBanner', [FinancialStatemantController::class,'editBanner'])->name('IRFinancial.editBanner');
        Route::post('/IRFinancialStatements/editFile', [FinancialStatemantController::class,'editFile'])->name('IRFinancial.editFile');
        Route::get('/IRFinancialStatements/deleteFile/{post_id}',[FinancialStatemantController::class,'destroyFile'])->name('IRFinancial.destroyFile');
        Route::get('/IRFinancialStatements/updateFile/{post_id}',[FinancialStatemantController::class,'updateFile'])->name('IRFinancial.updateFile');
        Route::get('/IRFinancialStatements/createFile',[FinancialStatemantController::class,'createFile'])->name('IRFinancial.createFile');
        Route::post('/IRFinancialStatements/storeFile',[FinancialStatemantController::class,'storeFile'])->name('IRFinancial.storeFile');

        Route::get('/IRAnalysis/index', [AnalysisController::class,'index'])->name('IRAnalysis.index');
        Route::post('/IRAnalysis/editBanner', [AnalysisController::class,'editBanner'])->name('IRAnalysis.editBanner');
        Route::post('/IRAnalysis/editFile', [AnalysisController::class,'editFile'])->name('IRAnalysis.editFile');
        Route::get('/IRAnalysis/deleteFile/{post_id}',[AnalysisController::class,'destroyFile'])->name('IRAnalysis.destroyFile');
        Route::get('/IRAnalysis/updateFile/{post_id}',[AnalysisController::class,'updateFile'])->name('IRAnalysis.updateFile');
        Route::get('/IRAnalysis/createFile',[AnalysisController::class,'createFile'])->name('IRAnalysis.createFile');
        Route::post('/IRAnalysis/storeFile',[AnalysisController::class,'storeFile'])->name('IRAnalysis.storeFile');

        Route::get('/IRShareHolders/index', [ShareHolderController::class,'index'])->name('shareholder.index');
        Route::post('/IRShareHolders/editBanner', [ShareHolderController::class,'editBanner'])->name('shareholder.editBanner');
        Route::post('/IRShareHolders/editFile', [ShareHolderController::class,'editPost'])->name('shareholder.editPost');
        Route::get('/IRShareHolders/deleteFile/{post_id}',[ShareHolderController::class,'destroyPost'])->name('shareholder.destroyPost');
        Route::get('/IRShareHolders/updateFile/{post_id}',[ShareHolderController::class,'updatePost'])->name('shareholder.updatePost');
        Route::get('/IRShareHolders/createFile',[ShareHolderController::class,'createPost'])->name('shareholder.createPost');
        Route::post('/IRShareHolders/storeFile',[ShareHolderController::class,'storePost'])->name('shareholder.storePost');

       
        Route::get('/adminHome', [DashboardController::class, 'index'])->name('dashboard.home');
        Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
        Route::get('/setLang/{lang}', [ForAllPageController::class, 'setLang'])->name('setLang');
    });
        Route::group(['middleware' => ['guest']], function () {
        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::get('/login', [LoginController::class, 'show'])->name('login.show');
        Route::get('/show', [LoginController::class, 'show'])->name('show');
    });
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/home', [UserController::class, 'index'])->name('home.index');
    Route::get('/VisionAndMission', [UserVisionMissionController::class, 'index'])->name('user.vision.index');
    Route::get('/CoreValue', [UserCoreValueController::class, 'index'])->name('user.corevalue.index');
    Route::get('/History', [UserVisionMissionController::class, 'historyIndex'])->name('user.history.index');
    Route::get('/Award', [UserVisionMissionController::class, 'awardIndex'])->name('user.award.index');
    Route::get('/GroupStructure', [UserVisionMissionController::class, 'groupStructureIndex'])->name('user.groupstructure.index');
    Route::get('/OrganizationStructure', [UserVisionMissionController::class, 'orgStructureIndex'])->name('user.orgstructure.index');
    Route::get('/Network', [UserVisionMissionController::class, 'networkIndex'])->name('user.network');
    Route::get('/OverView', [UserOverViewController::class, 'indexOverView'])->name('user.indexOverView');

    Route::get('/Activity', [UserKnowledgeController::class, 'indexActivity'])->name('user.indexActivity');
    Route::get('/DetailActivity/{post_id}', [UserKnowledgeController::class, 'detailActivity'])->name('user.detailActivity');

    Route::get('/workwithus', [UserWorkWithUsController::class, 'indexWorkWithUs'])->name('user.indexWorkWithUs');
    Route::get('/Contact', [UserWorkWithUsController::class, 'indexContact'])->name('user.indexContact');
    Route::get('/DetailWorkWithUs/{post_id}', [UserWorkWithUsController::class, 'detailWorkWithUs'])->name('user.detailWorkWithUs');

    Route::get('/Interest', [UserKnowledgeController::class, 'indexInterest'])->name('user.indexInterest');
    Route::get('/DetailInterest/{post_id}', [UserKnowledgeController::class, 'detailInterest'])->name('user.detailInterest');
    Route::get('/SocialMedia', [UserKnowledgeController::class, 'indexSocial'])->name('user.indexSocial');

    Route::get('/OverView', [UserOverViewController::class, 'indexOverView'])->name('user.indexOverView');

    Route::get('/BusinessType/{type_id}', [UserBusinessController::class, 'businessType'])->name('user.businesstype');
    Route::get('/user/prepareForMenu/{lang}', [ForAllPageController::class, 'prepareForMenu'])->name('user.prepareForMenu');
    Route::get(' /main_menu/ourbusiness', [ForAllPageController::class, 'prepareDataForBusiness'])->name('main_menu.ourbusiness');
    Route::get(' /user/prepareForSubMenu/{lang}', [ForAllPageController::class, 'prepareForSubMenu'])->name('user.prepareForSubMenu');
    Route::get(' /user/prepareForAddress/{lang}', [ForAllPageController::class, 'prepareForAddress'])->name('user.prepareForAddress');
    Route::get(' /user/prepareForLink/{lang}', [ForAllPageController::class, 'prepareForLink'])->name('user.prepareForLink');
    Route::post('/user/contactFrom/store', [ContactFormController::class, 'storeContact'])->name('user.contactform.store');
});
