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
use App\Http\Controllers\Knowledge\ActivityController;
use App\Http\Controllers\knowledge\InterestController;
use App\Http\Controllers\Knowledge\KnowledgeController;
use App\Http\Controllers\knowledge\SocialController;
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
use App\Http\Controllers\WorkWithUs\FindJobController;
use App\Http\Controllers\WorkWithUs\WorkWithUsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/clearcache', function () {
        $exitCode = Artisan::call('cache:clear');
        //$exitCode = Artisan::call('optimize');
        $exitCode = Artisan::call('route:cache');
        $exitCode = Artisan::call('route:clear');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('config:cache');
        return '<h1>Cache facade value cleared</h1>';
    });
    Route::group(['middleware' => ['auth']], function () {


        Route::get('/network/index', [NetworkController::class, 'index'])->name('network.index');
        Route::post('/network/editImage', [NetworkController::class, 'editImage'])->name('network.editImage');
        Route::post('/network/updateType', [NetworkController::class, 'updateType'])->name('network.updateType');
        Route::get('/network/create', [NetworkController::class, 'create'])->name('network.create');
        Route::post('/network/store', [NetworkController::class, 'store'])->name('network.store');
        Route::get('/network/update/{post_id}', [NetworkController::class, 'update'])->name('network.update');
        Route::post('/network/edit/{lang}', [NetworkController::class, 'edit'])->name('network.edit');

        Route::get('/corevalue/index', [CoreValueController::class, 'index'])->name('corevalue.index');
        Route::post('/corevalue/editImage', [CoreValueController::class, 'editImage'])->name('corevalue.editImage');
        Route::post('/corevalue/updateType', [CoreValueController::class, 'updateType'])->name('corevalue.updateType');
        Route::get('/corevalue/create', [CoreValueController::class, 'create'])->name('corevalue.create');
        Route::post('/corevalue/store', [CoreValueController::class, 'store'])->name('corevalue.store');
        Route::get('/corevalue/update/{post_id}', [CoreValueController::class, 'update'])->name('corevalue.update');
        Route::post('/corevalue/edit/{lang}', [CoreValueController::class, 'edit'])->name('corevalue.edit');
        Route::get('/corevalue/destroy/{lang}', [CoreValueController::class, 'destroy'])->name('corevalue.destroy');

        Route::get('/vision/index', [VisionMissionController::class, 'index'])->name('vision.index');
        Route::post('/vision/editMissionImage', [VisionMissionController::class, 'editMissionImage'])->name('vision.editMissionImage');
        Route::post('/vision/updateVisionAndMission', [VisionMissionController::class, 'updateVisionAndMission'])->name('vision.updateVisionAndMission');
        Route::post('/vision/updateVision', [VisionMissionController::class, 'updateVision'])->name('vision.updateVision');
        Route::get('/vision/create', [VisionMissionController::class, 'create'])->name('vision.create');
        Route::post('/vision/store', [VisionMissionController::class, 'store'])->name('vision.store');
        Route::get('/vision/update/{post_id}', [VisionMissionController::class, 'update'])->name('vision.update');
        Route::post('/vision/edit', [VisionMissionController::class, 'edit'])->name('vision.edit');
        Route::get('/vision/destroyMission/{post_id}', [VisionMissionController::class, 'destroyMission'])->name('vision.destroyMission');

        Route::get('/groupstructure/index', [GroupStructureController::class, 'index'])->name('groupstructure.index');
        Route::post('/groupstructure/editImage', [GroupStructureController::class, 'editImage'])->name('groupstructure.editImage');
        Route::post('/groupstructure/updateType', [GroupStructureController::class, 'updateType'])->name('groupstructure.updateType');
        Route::post('/groupstructure/updateTypeDiagram', [GroupStructureController::class, 'updateTypeDiagram'])->name('groupstructure.updateTypeDiagram');
        Route::post('/groupstructure/updateTypeContent', [GroupStructureController::class, 'updateTypeContent'])->name('groupstructure.updateTypeContent');
        Route::post('/groupstructure/updateLanguageImages', [GroupStructureController::class, 'updateChartImage'])->name('groupstructure.updateLanguageImages');
        Route::get('/groupstructure/create', [GroupStructureController::class, 'create'])->name('groupstructure.create');
        Route::post('/groupstructure/store', [GroupStructureController::class, 'store'])->name('groupstructure.store');
        Route::get('/groupstructure/update/{post_id}', [GroupStructureController::class, 'update'])->name('groupstructure.update');
        Route::post('/groupstructure/edit', [GroupStructureController::class, 'edit'])->name('groupstructure.edit');
        Route::get('/groupstructure/destroy/{post_id}', [GroupStructureController::class, 'destroy'])->name('groupstructure.destroy');

        Route::get('/orgstructure/index', [OrgController::class, 'index'])->name('orgstructure.index');
        Route::post('/orgstructure/editImage', [OrgController::class, 'editImage'])->name('orgstructure.editImage');
        Route::post('/orgstructure/updateType', [OrgController::class, 'updateType'])->name('orgstructure.updateType');
        Route::get('/orgstructure/create', [OrgController::class, 'create'])->name('orgstructure.create');
        Route::post('/orgstructure/updateLanguageImages', [OrgController::class, 'updateDiagramImage'])->name('orgstructure.updateLanguageImages');
        Route::post('/orgstructure/store', [OrgController::class, 'store'])->name('orgstructure.store');
        Route::get('/orgstructure/update/{post_id}', [OrgController::class, 'update'])->name('orgstructure.update');
        Route::post('/orgstructure/edit', [OrgController::class, 'edit'])->name('orgstructure.edit');
        Route::get('/orgstructure/destroy/{post_id}', [OrgController::class, 'destroy'])->name('orgstructure.destroy');

        Route::get('/history/index', [HistoryController::class, 'index'])->name('history.index');
        Route::post('/history/editImage', [HistoryController::class, 'editImage'])->name('history.editImage');
        Route::post('/history/updateType', [HistoryController::class, 'updateType'])->name('history.updateType');
        Route::post('/history/updateObjective', [HistoryController::class, 'updateObjective'])->name('history.updateObjective');
        Route::post('/history/updateHistory', [HistoryController::class, 'updateHistory'])->name('history.updateHistory');
        Route::post('/history/updateConclusion', [HistoryController::class, 'updateConclusion'])->name('history.updateConclusion');
        Route::get('/history/create', [HistoryController::class, 'create'])->name('history.create');
        Route::post('/history/store', [HistoryController::class, 'store'])->name('history.store');
        Route::get('/history/update/{post_id}', [HistoryController::class, 'update'])->name('history.update');
        Route::post('/history/edit', [HistoryController::class, 'edit'])->name('history.edit');
        Route::get('/history/destroy/{post_id}', [HistoryController::class, 'destroy'])->name('history.destroy');

        Route::get('/pride/index', [PrideController::class, 'index'])->name('pride.index');
        Route::post('/pride/editImage', [PrideController::class, 'editImage'])->name('pride.editImage');
        Route::post('/pride/updateType', [PrideController::class, 'updateType'])->name('pride.updateType');
        Route::post('/pride/edit', [PrideController::class, 'edit'])->name('pride.edit');
        Route::post('/pride/updateCertificateImage', [PrideController::class, 'updateCertificateImage'])->name('pride.updateCertificateImage');

        Route::get('/activity/index', [ActivityController::class, 'index'])->name('activity.index');
        Route::post('/activity/editImage', [ActivityController::class, 'editImage'])->name('activity.editImage');
        Route::post('/activity/updateType', [ActivityController::class, 'updateType'])->name('activity.updateType');
        Route::get('/activity/update/{post_id}', [ActivityController::class, 'update'])->name('activity.update');
        Route::post('/activity/edit', [ActivityController::class, 'edit'])->name('activity.edit');
        Route::get('/activity/create', [ActivityController::class, 'create'])->name('activity.create');
        Route::post('/activity/store', [ActivityController::class, 'store'])->name('activity.store');
        Route::get('/activity/destroyImage/{id}/{post_id}', [ActivityController::class, 'destroyImage'])->name('activity.destroyImage');
        Route::get('/activity/destroy/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');
        Route::delete('/activity/images/{imgId}', [ActivityController::class, 'destroyImage'])->name('images.destroyImage');

        Route::get('/social/index', [SocialController::class, 'index'])->name('social.index');
        Route::post('/social/editImage', [SocialController::class, 'editImage'])->name('social.editImage');
        Route::post('/social/updateType', [SocialController::class, 'updateType'])->name('social.updateType');
        Route::get('/social/update/{post_id}', [SocialController::class, 'update'])->name('social.update');
        Route::post('/social/edit', [SocialController::class, 'edit'])->name('social.edit');
        Route::get('/social/create', [SocialController::class, 'create'])->name('social.create');
        Route::post('/social/store', [SocialController::class, 'store'])->name('social.store');
        Route::get('/social/destroyImage/{id}/{post_id}', [SocialController::class, 'destroyImage'])->name('social.destroyImage');
        Route::get('/social/destroy/{id}', [SocialController::class, 'destroy'])->name('social.destroy');
        // Route::post('/social/destroyVedio', [SocialController::class, 'destroyVedio'])->name('social.destroyVedio');
        // Route::post('/social/destroyYouTubeLink', [SocialController::class, 'destroyYouTubeLink'])->name('social.destroyYouTubeLink');

        Route::get('/interest/index', [InterestController::class, 'index'])->name('interest.index');
        Route::post('/interest/editImage', [InterestController::class, 'editImage'])->name('interest.editImage');
        Route::post('/interest/updateType', [InterestController::class, 'updateType'])->name('interest.updateType');
        Route::get('/interest/update/{post_id}', [InterestController::class, 'update'])->name('interest.update');
        Route::post('/interest/edit', [InterestController::class, 'edit'])->name('interest.edit');
        Route::get('/interest/create', [InterestController::class, 'create'])->name('interest.create');
        Route::post('/interest/store', [InterestController::class, 'store'])->name('interest.store');
        Route::get('/interest/destroyImage/{id}/{post_id}', [InterestController::class, 'destroyImage'])->name('interest.destroyImage');
        Route::get('/interest/destroy/{id}', [InterestController::class, 'destroy'])->name('interest.destroy');

        Route::get('/business/index', [BusinessController::class, 'index'])->name('business.index');
        Route::post('/business/editImage', [BusinessController::class, 'editImage'])->name('business.editImage');
        Route::post('/business/updateType', [BusinessController::class, 'updateType'])->name('business.updateType');
        Route::get('/business/update/{post_id}', [BusinessController::class, 'update'])->name('business.update');
        Route::post('/business/edit', [BusinessController::class, 'edit'])->name('business.edit');
        Route::get('/business/create', [BusinessController::class, 'create'])->name('business.create');
        Route::post('/business/store', [BusinessController::class, 'store'])->name('business.store');
        Route::get('/business/destroyImage/{id}/{post_id}', [BusinessController::class, 'destroyImage'])->name('business.destroyImage');
        Route::get('/business/destroy/{id}/{', [BusinessController::class, 'destroy'])->name('business.destroy');

        Route::get('/businessPost/index/{type_id}', [BusinessPostController::class, 'index'])->name('businesspost.index');
        Route::post('/businessPost/editImage', [BusinessPostController::class, 'editImage'])->name('businesspost.editImage');
        Route::post('/businessPost/updateType', [BusinessPostController::class, 'updateType'])->name('businesspost.updateType');
        Route::get('/businessPost/update/{post_id}/{type_id}', [BusinessPostController::class, 'update'])->name('businesspost.update');
        Route::post('/businessPost/edit', [BusinessPostController::class, 'edit'])->name('businesspost.edit');
        Route::get('/businessPost/create/{type_id}', [BusinessPostController::class, 'create'])->name('businesspost.create');
        Route::post('/businessPost/store', [BusinessPostController::class, 'store'])->name('businesspost.store');
        Route::get('/businessPost/destroy/{post_id}/{type_id}', [BusinessPostController::class, 'destroy'])->name('businesspost.destroy');

        Route::get('/benefit/index', [BenefitController::class, 'index'])->name('benefit.index');
        Route::post('/benefit/editImage', [BenefitController::class, 'editImage'])->name('benefit.editImage');
        Route::post('/benefit/updateType', [BenefitController::class, 'updateType'])->name('benefit.updateType');
        Route::get('/benefit/update/{post_id}', [BenefitController::class, 'update'])->name('benefit.update');
        Route::post('/benefit/edit', [BenefitController::class, 'edit'])->name('benefit.edit');
        Route::get('/benefit/create', [BenefitController::class, 'create'])->name('benefit.create');
        Route::post('/benefit/store', [BenefitController::class, 'store'])->name('benefit.store');
        Route::get('/benefit/destroyImage/{id}/{post_id}', [BenefitController::class, 'destroyImage'])->name('benefit.destroyImage');
        Route::get('/benefit/destroy/{id}', [BenefitController::class, 'destroy'])->name('benefit.destroy');

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

        Route::get('/contactform/index', [ContactFormController::class, 'index'])->name('contactform.index');

        Route::get('/findjob/index', [FindJobController::class, 'index'])->name('findjob.index');
        Route::post('/findjob/editImage', [FindJobController::class, 'editImage'])->name('findjob.editImage');
        Route::post('/findjob/updateType', [FindJobController::class, 'updateType'])->name('findjob.updateType');
        Route::get('/findjob/update/{post_id}', [FindJobController::class, 'update'])->name('findjob.update');
        Route::post('/findjob/edit', [FindJobController::class, 'edit'])->name('findjob.edit');
        Route::get('/findjob/create', [FindJobController::class, 'create'])->name('findjob.create');
        Route::post('/findjob/store', [FindJobController::class, 'store'])->name('findjob.store');
        Route::get('/findjob/destroyImage/{id}/{post_id}', [FindJobController::class, 'destroyImage'])->name('findjob.destroyImage');
        Route::get('/findjob/destroy/{id}', [FindJobController::class, 'destroy'])->name('findjob.destroy');
        Route::post('/findjob/index', [FindJobController::class, 'index'])->name('contact.index');
        Route::post('/findjob/editContact', [FindJobController::class, 'editContact'])->name('findjob.editContact');

        Route::get('/mainpage/welcome/index', [MainPageController::class, 'welcomeIndex'])->name('welcome.index');
        Route::post('/mainpage/welcome/editWelcomeTo', [MainPageController::class, 'editWelcomeTo'])->name('welcome.editWelcomeTo');
        Route::delete('/mainpage/welcome/destroyImage/{imgId}', [MainPageController::class, 'destroyImage'])->name('welcome.destroyImage');
        Route::delete('/mainpage/group/destroyGroupImage/{imgId}', [MainPageController::class, 'destroyImageGroup'])->name('welcome.destroyGroupImage');

        Route::get('/mainpage/service/index', [MainPageController::class, 'serviceIndex'])->name('service.index');
        Route::post('/mainpage/service/servicesEdit', [MainPageController::class, 'servicesEdit'])->name('service.servicesEdit');

        Route::get('/mainpage/OurBusiness/index', [MainPageController::class, 'ourBusinessIndex'])->name('ourBusiness.index');
        Route::post('/mainpage/OurBusiness/edit', [MainPageController::class, 'editOurBusiness'])->name('ourBusiness.editOurBusiness');

        Route::get('/mainpage/awards/index', [MainPageController::class, 'awardsIndex'])->name('awards.index');
        Route::post('/mainpage/awards/edit', [MainPageController::class, 'editAwards'])->name('awards.editAwards');

        //   Route::get('/mainpage/contact/index', [MainPageController::class, 'contactIndex'])->name('contact.index');
        Route::post('/mainpage/contact/edit', [MainPageController::class, 'editContact'])->name('contact.editContact');


        Route::get('/mainpage/awards/index', [MainPageController::class, 'awardsIndex'])->name('awards.index');

        Route::post('/mainpage/destroyVedio', [MainPageController::class, 'destroyVedio'])->name('images.destroyVedio');
        Route::post('/mainpage/destroyYouTubeLink', [MainPageController::class, 'destroyYouTubeLink'])->name('images.destroyYouTubeLink');

        Route::get('/OverView/index', [OverViewController::class, 'index'])->name('overview.index');
        Route::post('/OverView/editHistory', [OverViewController::class, 'editHistory'])->name('overview.editHistory');
        Route::get('/OverView/editCoreValue', [OverViewController::class, 'editCoreValue'])->name('overview.editCoreValue');
        Route::get('/OverView/editGroupStructure', [OverViewController::class, 'editGroupStructure'])->name('overview.editGroupStructure');
        Route::get('/OverView/editEmbryoNetWork', [OverViewController::class, 'editEmbryoNetWork'])->name('overview.editEmbryoNetWork');
        Route::get('/OverView/editOrgStructure', [OverViewController::class, 'editOrgStructure'])->name('overview.editOrgStructure');
        Route::get('/OverView/editAward', [OverViewController::class, 'editAward'])->name('overview.editAward');

        Route::get('/knowledge/index', [KnowledgeController::class, 'index'])->name('knowledge.index');
        Route::post('/knowledge/editImage', [KnowledgeController::class, 'editImage'])->name('knowledge.editImage');
        Route::get('/aboutus/index', [AboutUsController::class, 'index'])->name('aboutus.index');
        Route::post('/aboutus/editImage', [AboutUsController::class, 'editImage'])->name('aboutus.editImage');
        Route::get('/businessGroup/index', [BusinessGroupController::class, 'index'])->name('businessGroup.index');
        Route::post('/businessGroup/editImage', [BusinessGroupController::class, 'editImage'])->name('businessGroup.editImage');
        Route::get('/workWithUs/index', [WorkWithUsController::class, 'index'])->name('workwithus.index');
        Route::post('/workWithUs/editGroup', [WorkWithUsController::class, 'editGroup'])->name('workwithus.editGroup');
        Route::get('/contactus/indexContact', [ContactUsController::class, 'indexContact'])->name('contactus.indexContact');
        Route::get('/mainpage/index', [MainPageController::class, 'index'])->name('mainpage.index');
        Route::post('/mainpage/editBanner', [MainPageController::class, 'editBanner'])->name('mainpage.editBanner');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.home');
        Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
        Route::get('/setLang/{lang}', [ForAllPageController::class, 'setLang'])->name('setLang');
    });
    Route::group(['middleware' => ['guest']], function () {
        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::get('/login', [LoginController::class, 'show'])->name('login.show');
        Route::get('/show', [LoginController::class, 'show'])->name('show');
    });
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/vision', [UserVisionMissionController::class, 'index'])->name('user.vision.index');
    Route::get('/user/coreValue', [UserCoreValueController::class, 'index'])->name('user.corevalue.index');
    Route::get('/user/history', [UserVisionMissionController::class, 'historyIndex'])->name('user.history.index');
    Route::get('/user/award', [UserVisionMissionController::class, 'awardIndex'])->name('user.award.index');
    Route::get('/user/groupstructure', [UserVisionMissionController::class, 'groupStructureIndex'])->name('user.groupstructure.index');
    Route::get('/user/orgStructure', [UserVisionMissionController::class, 'orgStructureIndex'])->name('user.orgstructure.index');
    Route::get('/user/network', [UserVisionMissionController::class, 'networkIndex'])->name('user.network');
    Route::get('/user/indexOverView', [UserOverViewController::class, 'indexOverView'])->name('user.indexOverView');

    Route::get('/user/activity', [UserKnowledgeController::class, 'indexActivity'])->name('user.indexActivity');
    Route::get('/user/detailActivity/{post_id}', [UserKnowledgeController::class, 'detailActivity'])->name('user.detailActivity');

    Route::get('/user/indexWorkWithUs', [UserWorkWithUsController::class, 'indexWorkWithUs'])->name('user.indexWorkWithUs');
    Route::get('/user/indexContact', [UserWorkWithUsController::class, 'indexContact'])->name('user.indexContact');
    Route::get('/user/detailWorkWithUs/{post_id}', [UserWorkWithUsController::class, 'detailWorkWithUs'])->name('user.detailWorkWithUs');

    Route::get('/user/interest', [UserKnowledgeController::class, 'indexInterest'])->name('user.indexInterest');
    Route::get('/user/detailInterest/{post_id}', [UserKnowledgeController::class, 'detailInterest'])->name('user.detailInterest');
    Route::get('/user/indexSocial', [UserKnowledgeController::class, 'indexSocial'])->name('user.indexSocial');


    Route::get('/user/businessType/{type_id}', [UserBusinessController::class, 'businessType'])->name('user.businesstype');
    Route::get('/user/prepareForMenu/{lang}', [ForAllPageController::class, 'prepareForMenu'])->name('user.prepareForMenu');
    Route::get(' /main_menu/ourbusiness', [ForAllPageController::class, 'prepareDataForBusiness'])->name('main_menu.ourbusiness');
    Route::get(' /user/prepareForSubMenu/{lang}', [ForAllPageController::class, 'prepareForSubMenu'])->name('user.prepareForSubMenu');
    Route::get(' /user/prepareForAddress/{lang}', [ForAllPageController::class, 'prepareForAddress'])->name('user.prepareForAddress');
    Route::get(' /user/prepareForLink/{lang}', [ForAllPageController::class, 'prepareForLink'])->name('user.prepareForLink');
    Route::post('/user/contactFrom/store', [ContactFormController::class, 'store'])->name('user.contactform.store');
});
