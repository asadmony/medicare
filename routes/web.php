<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'Welcome\WelcomeController@welcome',
    'as' => 'welcome.welcome'
]);
Route::get('/search', [
    'uses' => 'Welcome\WelcomeController@search',
    'as' => 'welcome.search'
]);

//pdf generator testing route
// Route::get('/pdf', [
//     'uses' => 'Welcome\WelcomeController@pdf',
//     'as' => 'welcome.pdf'
// ]);

Route::get('/course/details/course/{course}',[
    'uses' => 'Welcome\WelcomeController@courseDetails',
    'as' => 'welcome.courseDetails'
]);

Route::get('/course/{course}/face-to-face',[
    'uses' => 'Welcome\WelcomeController@faceToFace',
    'as' => 'welcome.faceToFace'
]);


Route::get('all/courses/mode/{mode}',[
    'uses' => 'Welcome\WelcomeController@allCoursesQualificationByMode',
    'as' => 'welcome.allCoursesQualificationByMode'
]);

Route::get('/package/details/package/{package}',[
    'uses' => 'Welcome\WelcomeController@packageDetails',
    'as' => 'welcome.packageDetails'
]);

//page
Route::get('pages/{page}-{route_name?}', [
    'uses' => 'Welcome\WelcomeController@page',
    'as' => 'welcome.page'
]);
//page


Auth::routes();

Route::get('registration-option',[
    'uses' => 'Welcome\WelcomeController@registrationOption',
    'as' => 'welcome.registrationOption'
]);


Route::get('register-company',[
    'uses' => 'Auth\RegisterController@registerBusiness',
    'as' => 'registerBusiness'
]);

Route::post('register-business-post',[
    'uses' => 'Auth\RegisterController@registerBusinessPost',
    'as' => 'registerBusinessPost'
]);



Route::get('/home', 'User\UserDashboardController@dashboard')->name('home');



Route::get('select/user', [
    'uses' => 'HomeController@selectUser',
    'as' => 'home.selectUser',
]);


// users

    Route::get('package/checkout/package/{package}',[
        'uses' => 'User\UserOrderController@checkoutPackage',
        'as' => 'user.checkoutPackage'
    ])->middleware('auth');
    
    Route::get('checkout/credit',[
        'uses' => 'User\UserOrderController@checkoutCredit',
        'as' => 'user.checkoutCredit'
    ])->middleware('auth');

    Route::post('checkout/credit/payment', [
        'uses' => 'Welcome\WelcomeController@checkoutPost',
        'as' => 'user.checkoutCreditPost',
    ])->middleware('auth');

    Route::get('package-chechout/company/package/{package}',[
        'uses'=> 'User\UserOrderController@checkoutPackageCompany',
        'as' =>  'user.checkoutPackageCompany'
    ])->middleware('auth');

    Route::post('/company/add/new',[
        'uses' => 'Welcome\WelcomeController@addNewCompany',
        'as' => 'welcome.addNewCompany'
    ])->middleware('auth');

    Route::post('checkout/post/package/{package}/company/{company?}', [
        'uses' => 'Welcome\WelcomeController@checkoutPost',
        'as' => 'welcome.checkoutPost',
    ])->middleware('auth');

    Route::post('complete/payment/{item}',[
        'uses' => 'User\UserOrderController@paymentDone',
        'as' => 'welcome.paymentDone'
    ]);

    Route::post('course/take/using/credit/course/{course}',[
        'uses' => 'User\UserOrderController@takeCourseUsingCredit',
        'as' => 'user.takeCourseUsingCredit'
    ])->middleware('auth');

//admin
Route::group(['middleware' => ['role:admin','auth'] ,'prefix' => 'admin'], function () {

 	Route::get('dashboard', [
    'uses' =>'Admin\AdminController@dashboard',
    'as' => 'admin.dashboard'
    ]);
 	Route::get('messages', [
    'uses' =>'Admin\AdminController@messages',
    'as' => 'admin.messages'
    ]);
 	Route::get('message/user/{messageTo}', [
    'uses' =>'Admin\AdminController@message',
    'as' => 'admin.message'
    ]);

    Route::get('report/{type}', [
        'uses' =>'Admin\AdminController@report',
        'as' => 'admin.report'
        ]);
    
    Route::get('report-search/filter', [
        'uses' =>'Admin\AdminController@reportFilter',
        'as' => 'admin.report.filter'
        ]);
    
    Route::any('device/search', [
        'uses' =>'Admin\AdminController@deviceSearch',
        'as' => 'admin.deviceSearch'
    ]);

    Route::get('companies/all/company-status/{status?}', [
        'uses' =>'Admin\AdminController@companiesAll',
        'as' => 'admin.companiesAll'
    ]);

    // Route::get('products/all/type/{type?}', [
    //     'uses' =>'Admin\AdminController@allProduct',
    //     'as' => 'admin.productsAll'
    // ]);

    // Route::get('single/device/map/company/{company}/device/{macid}', [
    //     'uses' =>'Admin\AdminController@singleDeviceMap',
    //     'as' => 'admin.singleDeviceMap'
    // ]);

    // Route::get('products/all/type/{type}/location-status/{status}/company/{company?}',[
    //     'uses' =>'Admin\AdminController@productsAllOfType',
    //     'as' => 'admin.productsAllOfType'
    // ]);

    // Route::get('devices/latest/data/{type?}', [
    //     'uses' =>'Admin\AdminController@allLatestData',
    //     'as' => 'admin.allLatestData'
    // ]);

    // Route::get('single/device/single/data-details/data/{data}',[
    //     'uses' =>'Admin\AdminController@singleDeviceSingleDataDetails',
    //     'as' => 'admin.singleDeviceSingleDataDetails'
    // ]);

    // Route::get('all/alarm/data/{company?}', [
    //     'uses' =>'Admin\AdminController@allAlarmData',
    //     'as' => 'admin.allAlarmData'
    // ]);

    // Route::get('all/filter/data/{type}', [
    //     'uses' =>'Admin\AdminController@filterData',
    //     'as' => 'admin.filterData'
    // ]);

    // Route::get('all/search/datas/{type?}', [
    //     'uses' =>'Admin\AdminController@searchData',
    //     'as' => 'admin.searchData'
    // ]);

    // Route::get('alarm/data/filter', [
    //     'uses' =>'Admin\AdminController@alarmDataFilter',
    //     'as' => 'admin.alarmDataFilter'
    // ]);

    // Route::get('alarm/data/search', [
    //     'uses' =>'Admin\AdminController@alarmDatasearch',
    //     'as' => 'admin.alarmSearch'
    // ]);


    // Route::get('company/all/data/company/{company}/type/{type?}', [
    //     'uses' =>'Admin\AdminController@companyAllData',
    //     'as' => 'admin.companyDatas'
    // ]);

    Route::get('search-user_dashboard', [
        'uses' =>'Admin\AdminController@userSearchDashboard',
        'as' => 'admin.userSearchDashboard'
    ]);

    Route::get('company/add/new', [
        'uses' =>'Admin\AdminController@companyAddNew',
        'as' => 'admin.companyAddNew'
    ]);

    Route::get('company/edit/company/{company}', [
        'uses' =>'Admin\AdminController@companyEdit',
        'as' => 'admin.companyEdit'
    ]);

    Route::post('company/update/company/{company}', [
        'uses' =>'Admin\AdminController@companyUpdate',
        'as' => 'admin.companyUpdate'
    ]);

    Route::get('company/details/company/{company}', [
        'uses' =>'Admin\AdminController@companyDetails',
        'as' => 'admin.companyDetails'
    ]);

    Route::get('company/delete/company/{company}', [
        'uses' =>'Admin\AdminController@companyDelete',
        'as' => 'admin.companyDelete'
    ]);

    Route::get('company/change/status/company/{company}', [
        'uses' =>'Admin\AdminController@companyChangeStatus',
        'as' => 'admin.companyChangeStatus'
    ]);


    Route::get('users/all', [
        'uses' =>'Admin\AdminController@usersAll',
        'as' => 'admin.usersAll'
    ]);
    Route::get('user/{user}/details', [
        'uses' =>'Admin\AdminController@userDetails',
        'as' => 'admin.userDetails'
    ]);
    Route::get('users/search', [
        'uses' =>'Admin\AdminSearchController@userSearchAjax',
        'as' => 'admin.userSearchAjax'
    ]);


    Route::get('company/owner/add/company/{company}', [
        'uses' =>'Admin\AdminController@companyOwnerAdd',
        'as' => 'admin.companyOwnerAdd'
    ]);

    Route::get('new/user/create', [
        'uses' =>'Admin\AdminController@newUserCreate',
        'as' => 'admin.newUserCreate'
    ]);

    Route::post('new/user/create/post', [
        'uses' =>'Admin\AdminController@newUserCreatePost',
        'as' => 'admin.newUserCreatePost'
    ]);

    Route::get('user/edit/user/{user}', [
        'uses' =>'Admin\AdminController@userEdit',
        'as' => 'admin.userEdit'
    ]);

    Route::post('user/update/user/{user}', [
        'uses' =>'Admin\AdminController@userUpdate',
        'as' => 'admin.userUpdate'
    ]);

    Route::get('user/companies/user/{user}', [
        'uses' =>'Admin\AdminController@userCompanies',
        'as' => 'admin.userCompanies'
    ]);
    
    Route::get('user/{user}/taken-individual-courses', [
        'uses' =>'Admin\AdminController@individualUserTakenCourses',
        'as' => 'admin.individualUserTakenCourses'
    ]);

    // Route::get('company/products/company/{company}', [
    //     'uses' =>'Admin\AdminController@companyProducts',
    //     'as' => 'admin.companyProducts'
    // ]);


    // Route::get('product/status/company/{company}/device/{macid}', [
    //     'uses' =>'Admin\AdminController@productStatus',
    //     'as' => 'admin.productStatus'
    // ]);

    // Route::get('product/settings/company/{company}/device/{macid}', [
    //     'uses' =>'Admin\AdminController@productSettings',
    //     'as' => 'admin.productSettings'
    // ]);

    // Route::get('product/version/company/{company}/device/{macid}', [
    //     'uses' =>'Admin\AdminController@productVersion',
    //     'as' => 'admin.productVersion'
    // ]);

       //media
    Route::get('media/all', [
    'uses' =>'Admin\AdminMediaController@mediaAll',
    'as' => 'admin.mediaAll'
    ]);
    Route::post('media/upload/post', [
    'uses' =>'Admin\AdminMediaController@mediaUploadPost',
    'as' => 'admin.mediaUploadPost'
    ]);

    Route::get('media/delete/{media}', [
    'uses' =>'Admin\AdminMediaController@mediaDelete',
    'as' => 'admin.mediaDelete'
    ]);

    //media
    

    //admin role
    
    Route::get('select/new/role', [
        'as' => 'admin.selectNewRole',
        'uses' => 'Admin\AdminController@selectNewRole'
    ]);
    Route::post('admin/add/new/post', [
    'uses' =>'Admin\AdminController@adminAddNewPost',
    'as' => 'admin.adminAddNewPost'
    ]);
    Route::get('admins/all', [
    'uses' =>'Admin\AdminController@adminsAll',
    'as' => 'admin.adminsAll'
    ]);

    Route::any('admin/delete/{role}', [
    'uses' =>'Admin\AdminController@adminDelete',
    'as' => 'admin.adminDelete'  
    ]); 
    
    //admin role
    
    // website parameters
    Route::get('/website-parameters', [
        'uses' =>'Admin\AdminPageController@webParams',
        'as' => 'admin.websiteParameters'
    ]);
    Route::post('/website-parameters', [
        'uses' =>'Admin\AdminPageController@webParamsSave',
        'as' => 'admin.websiteParameterUpdate'
    ]);

    //pages
    Route::get('/pages/all', [
    'uses' =>'Admin\AdminPageController@pagesAll',
    'as' => 'admin.pagesAll'
    ]);

    Route::post('/page/add/new/post', [
    'uses' =>'Admin\AdminPageController@pageAddNewPost',
    'as' => 'admin.pageAddNewPost'
    ]);

    Route::get('page/edit/{page}', [
    'uses' =>'Admin\AdminPageController@pageEdit',
    'as' => 'admin.pageEdit'
    ]);

    Route::post('page/edit/post/{page}', [
    'uses' =>'Admin\AdminPageController@pageEditPost',
    'as' => 'admin.pageEditPost'
    ]);

    Route::post('/page/sort', [
        'uses' =>'Admin\AdminPageController@pageSort',
        'as' => 'admin.pageSort'
        ]);

    Route::get('page/delete/{page}', [
    'uses' =>'Admin\AdminPageController@pageDelete',
    'as' => 'admin.pageDelete'
    ]);

    Route::get('page/items/{page}', [
    'uses' =>'Admin\AdminPageController@pageItems',
    'as' => 'admin.pageItems'
    ]);


    Route::post('page-item/add/post/{page}', [
    'uses' =>'Admin\AdminPageController@pageItemAddPost',
    'as' => 'admin.pageItemAddPost'
    ]);

    Route::get('page-item/delete/{item}', [
    'uses' =>'Admin\AdminPageController@pageItemDelete',
    'as' => 'admin.pageItemDelete'
    ]);


    Route::get('page-item/edit/{item}', [
    'uses' =>'Admin\AdminPageController@pageItemEdit',
    'as' => 'admin.pageItemEdit'
    ]);

    Route::post('page-item/update/post/{item}', [
    'uses' =>'Admin\AdminPageController@pageItemUpdate',
    'as' => 'admin.pageItemUpdate'
    ]);

    Route::get('page-item/edit-editor/{item}', [
    'uses' =>'Admin\AdminPageController@pageItemEditEditor',
    'as' => 'admin.pageItemEditEditor'
    ]);


    //pages


    //subject
    Route::get('add/new/subject', [
    'uses' =>'Admin\AdminSubjectController@addNewSubject',
    'as' => 'admin.addNewSubject'
    ]);

    Route::post('add/new/subject/post', [
    'uses' =>'Admin\AdminSubjectController@addNewSubjectPost',
    'as' => 'admin.addNewSubjectPost'
    ]);

    Route::post('update/subject/post/{subject}', [
        'uses' =>'Admin\AdminSubjectController@UpdateSubjectPost',
        'as' => 'admin.UpdateSubjectPost'
        ]);

    Route::get('all/subjects', [
    'uses' =>'Admin\AdminSubjectController@allSubjects',
    'as' => 'admin.allSubjects'
    ]);

    Route::get('edit/subject/{subject}',[
        'uses' => 'Admin\AdminSubjectController@editSubject',
        'as' => 'admin.editSubject'
    ]);

    Route::get('subject/delete/{subject}', [
    'uses' =>'Admin\AdminSubjectController@subjectDelete',
    'as' => 'admin.subjectDelete'
    ]);
    //subject

    //course
    Route::get('add/new/course', [
    'uses' =>'Admin\AdminCourseController@addNewCourse',
    'as' => 'admin.addNewCourse'
    ]);

    Route::get('update-course/{course}', [
    'uses' =>'Admin\AdminCourseController@updateCourse',
    'as' => 'admin.updateCourse'
    ]);

    Route::post('update-course/post/{course}', [
    'uses' =>'Admin\AdminCourseController@updateCoursePost',
    'as' => 'admin.updateCoursePost'
    ]);

    Route::get('all/courses', [
    'uses' =>'Admin\AdminCourseController@allCourses',
    'as' => 'admin.allCourses'
    ]);

    Route::get('delete-course/{course}', [
    'uses' =>'Admin\AdminCourseController@deleteCourse',
    'as' => 'admin.deleteCourse'
    ]);
    //course

    // topic
    Route::get('course/topic/course/{course}',[
        'uses' => 'Admin\AdminCourseController@addCourseTopic',
        'as' => 'admin.addCourseTopic'
    ]);

    Route::post('add/new/course/topic/course/{course}',[
        'as' => 'admin.addNewTopicPost',
        'uses' => 'Admin\AdminCourseController@addNewTopicPost'
    ]);


    Route::post('add/new/course-topic-question/topic/{topic}',[
        'as' => 'admin.addNewTopicQuestion',
        'uses' => 'Admin\AdminCourseController@addNewTopicQuestion'
    ]);

    Route::post('add/new/course-topic-question-answer/question/{question}',[
        'as' => 'admin.addNewQuestionAnswer',
        'uses' => 'Admin\AdminCourseController@addNewQuestionAnswer'
    ]);

    Route::get('delete/topic-course-question-answer/type/{type}/{id}',[
        'uses' => 'Admin\AdminCourseController@deleteTopicCourseQuestionAnswer',
        'as' => 'admin.deleteTopicCourseQuestionAnswer'
    ]);


    // topic

    // assignment
    Route::get('course/{course}/assignments',[
        'uses' => 'Admin\AdminCourseController@assignments',
        'as' => 'admin.courseAssignment'
    ]);
    Route::post('course/{course}/assignment/save', [
        'uses' =>'Admin\AdminCourseController@saveCourseAssignment',
        'as' => 'admin.saveCourseAssignment',
    ]);
    Route::get('course/{course}/assignment/{assignment}/edit', [
        'uses' =>'Admin\AdminCourseController@editCourseAssignment',
        'as' => 'admin.editCourseAssignment',
    ]);
    Route::post('course/{course}/assignment/{assignment}/update', [
        'uses' =>'Admin\AdminCourseController@saveCourseAssignment',
        'as' => 'admin.updateCourseAssignment',
    ]);
    // assignment

    // question paper
    Route::post('course/{course}/add/new/question-paper',[
        'uses' => 'Admin\AdminCourseController@addNewQuestionPapers',
        'as' => 'admin.addNewQuestionPapers'
    ]);
    Route::any('course/question-paper/{questionPaper}/delete',[
        'uses' => 'Admin\AdminCourseController@deleteQuestionPaper',
        'as' => 'admin.deleteQuestionPaper'
    ]);
    // question paper

    //subject
    Route::get('add/new/package', [
    'uses' =>'Admin\AdminPackageController@addNewPackage',
    'as' => 'admin.addNewPackage'
    ]);

    Route::get('update-package/{package}', [
    'uses' =>'Admin\AdminPackageController@updatePackage',
    'as' => 'admin.updatePackage'
    ]);

    Route::post('update-package/post/{package}', [
    'uses' =>'Admin\AdminPackageController@updatePackagePost',
    'as' => 'admin.updatePackagePost'
    ]);

    Route::get('all/packages', [
    'uses' =>'Admin\AdminPackageController@allPackages',
    'as' => 'admin.allPackages'
    ]);

    Route::get('delete-package/{package}', [
    'uses' =>'Admin\AdminPackageController@deletePackage',
    'as' => 'admin.deletePackage'
    ]);
    //subject

    //orders
    Route::get('order/type/{type}', [
        'uses' =>'Admin\AdminController@order',
        'as' => 'admin.order'
    ]);
    Route::get('order/details/order/{order}/type/{type}', [
        'uses' =>'Admin\AdminController@orderDetails',
        'as' => 'admin.orderDetails'
    ]);

    Route::post('orders/item/status/update/item/{item}', [
        'uses' =>'Admin\AdminController@orderItemOrderStatusUpdate',
        'as' => 'admin.orderItemOrderStatusUpdate'
    ]);

    Route::post('orders/payment-submit/order/{order}', [
        'uses' =>'Admin\AdminController@orderPaymentSubmit',
        'as' => 'admin.orderPaymentSubmit'
    ]);

    Route::post('orders/payment/update/payment/{payment}', [
        'uses' =>'Admin\AdminController@orderPaymentUpdate',
        'as' => 'admin.orderPaymentUpdate'
    ]);

    Route::get('orders/payment-delete/payment/{payment}', [
        'uses' =>'Admin\AdminController@orderpaymentDelete',
        'as' => 'admin.orderpaymentDelete'
    ]);

});

//Co-ordinator
Route::group(['middleware' => ['role:coordinator','auth'] ,'prefix' => 'co-ordinator'], function () {
    Route::get('dashboard', [
        'uses' =>'Admin\CoordinatorController@dashboard',
        'as' => 'coordinator.dashboard'
    ]);

    
    //subject
    Route::get('add/new/subject', [
        'uses' =>'Admin\CoordinatorController@addNewSubject',
        'as' => 'coordinator.addNewSubject'
        ]);
    
        Route::post('add/new/subject/post', [
        'uses' =>'Admin\CoordinatorController@addNewSubjectPost',
        'as' => 'coordinator.addNewSubjectPost'
        ]);
    
        Route::post('update/subject/post/{subject}', [
            'uses' =>'Admin\CoordinatorController@UpdateSubjectPost',
            'as' => 'coordinator.UpdateSubjectPost'
            ]);
    
        Route::get('all/subjects', [
        'uses' =>'Admin\CoordinatorController@allSubjects',
        'as' => 'coordinator.allSubjects'
        ]);
    
        Route::get('edit/subject/{subject}',[
            'uses' => 'Admin\CoordinatorController@editSubject',
            'as' => 'coordinator.editSubject'
        ]);
    
        Route::get('subject/delete/{subject}', [
        'uses' =>'Admin\CoordinatorController@subjectDelete',
        'as' => 'coordinator.subjectDelete'
        ]);
        //subject
    
        //course
        Route::get('add/new/course', [
        'uses' =>'Admin\CoordinatorController@addNewCourse',
        'as' => 'coordinator.addNewCourse'
        ]);
    
        Route::get('update-course/{course}', [
        'uses' =>'Admin\CoordinatorController@updateCourse',
        'as' => 'coordinator.updateCourse'
        ]);
    
        Route::post('update-course/post/{course}', [
        'uses' =>'Admin\CoordinatorController@updateCoursePost',
        'as' => 'coordinator.updateCoursePost'
        ]);
    
        Route::get('all/courses', [
        'uses' =>'Admin\CoordinatorController@allCourses',
        'as' => 'coordinator.allCourses'
        ]);
    
        Route::get('delete-course/{course}', [
        'uses' =>'Admin\CoordinatorController@deleteCourse',
        'as' => 'coordinator.deleteCourse'
        ]);
        //course
    
        // topic
        Route::get('course/topic/course/{course}',[
            'uses' => 'Admin\CoordinatorController@addCourseTopic',
            'as' => 'coordinator.addCourseTopic'
        ]);
    
        Route::post('add/new/course/topic/course/{course}',[
            'as' => 'coordinator.addNewTopicPost',
            'uses' => 'Admin\CoordinatorController@addNewTopicPost'
        ]);
    
    
        Route::post('add/new/course-topic-question/topic/{topic}',[
            'as' => 'coordinator.addNewTopicQuestion',
            'uses' => 'Admin\CoordinatorController@addNewTopicQuestion'
        ]);
    
        Route::post('add/new/course-topic-question-answer/question/{question}',[
            'as' => 'coordinator.addNewQuestionAnswer',
            'uses' => 'Admin\CoordinatorController@addNewQuestionAnswer'
        ]);
    
        Route::get('delete/topic-course-question-answer/type/{type}/{id}',[
            'uses' => 'Admin\CoordinatorController@deleteTopicCourseQuestionAnswer',
            'as' => 'coordinator.deleteTopicCourseQuestionAnswer'
        ]);
    
    
        // topic
    
        // assignment
        Route::get('course/{course}/assignments',[
            'uses' => 'Admin\CoordinatorController@assignments',
            'as' => 'coordinator.courseAssignment'
        ]);
        Route::post('course/{course}/assignment/save', [
            'uses' =>'Admin\CoordinatorController@saveCourseAssignment',
            'as' => 'coordinator.saveCourseAssignment',
        ]);
        Route::get('course/{course}/assignment/{assignment}/edit', [
            'uses' =>'Admin\CoordinatorController@editCourseAssignment',
            'as' => 'coordinator.editCourseAssignment',
        ]);
        Route::post('course/{course}/assignment/{assignment}/update', [
            'uses' =>'Admin\CoordinatorController@saveCourseAssignment',
            'as' => 'coordinator.updateCourseAssignment',
        ]);
        // assignment
    
        // question paper
        Route::post('course/{course}/add/new/question-paper',[
            'uses' => 'Admin\CoordinatorController@addNewQuestionPapers',
            'as' => 'coordinator.addNewQuestionPapers'
        ]);
        Route::any('course/question-paper/{questionPaper}/delete',[
            'uses' => 'Admin\CoordinatorController@deleteQuestionPaper',
            'as' => 'coordinator.deleteQuestionPaper'
        ]);
        // question paper
    
        //subject
        Route::get('add/new/package', [
        'uses' =>'Admin\CoordinatorController@addNewPackage',
        'as' => 'coordinator.addNewPackage'
        ]);
    
        Route::get('update-package/{package}', [
        'uses' =>'Admin\CoordinatorController@updatePackage',
        'as' => 'coordinator.updatePackage'
        ]);
    
        Route::post('update-package/post/{package}', [
        'uses' =>'Admin\CoordinatorController@updatePackagePost',
        'as' => 'coordinator.updatePackagePost'
        ]);
    
        Route::get('all/packages', [
        'uses' =>'Admin\CoordinatorController@allPackages',
        'as' => 'coordinator.allPackages'
        ]);
    
        Route::get('delete-package/{package}', [
        'uses' =>'Admin\CoordinatorController@deletePackage',
        'as' => 'coordinator.deletePackage'
        ]);
        //subject
        Route::get('messages', [
            'uses' =>'Admin\AdminController@messages',
            'as' => 'coordinator.messages'
            ]);
             Route::get('message/user/{messageTo}', [
            'uses' =>'Admin\AdminController@message',
            'as' => 'coordinator.message'
            ]);
});

//search

Route::get('search/order/ajax', [
    'uses' =>'Admin\AdminSearchController@searchOrderAjax',
    'as' => 'admin.searchAjax'
    ]);


//user

Route::group(['middleware' =>'auth','prefix' => 'mypanel'], function () {

    Route::get('dashboard', [
        'uses' =>'User\UserDashboardController@dashboard',
        'as' => 'user.dashboard'
    ]);

    Route::get('/package/all', [
        'uses' =>'User\UserDashboardController@listPackage',
        'as' => 'user.listPackage'
    ]);

    Route::get('/course/all', [
        'uses' =>'User\UserDashboardController@allTakenCourses',
        'as' => 'user.allTakenCourses'
    ]);

    Route::get('/exams/all', [
        'uses' =>'User\UserDashboardController@allTakenCourseExams',
        'as' => 'user.allTakenCourseExams'
    ]);

    Route::get('/package/{takenPackage}/details', [
        'uses' =>'User\UserDashboardController@takenPackageDetails',
        'as' => 'user.takenPackageDetails'
    ]);

    Route::get('/package/{takenPackage}/take-course/{course}', [
        'uses' =>'User\UserDashboardController@takePackageCourse',
        'as' => 'user.takePackageCourse'
    ]);

    Route::get('/package/{takenPackage}/taken-course/{course}/details', [
        'uses' =>'User\UserDashboardController@takenPackageCourseDetails',
        'as' => 'user.takenPackageCourseDetails'
    ]);

    Route::get('/non-package/taken-course/{course}/details', [
        'uses' =>'User\UserDashboardController@takenCourseDetails',
        'as' => 'user.takenCourseDetails'
    ]);

    Route::get('attempt-course-exam/taken-course/{takenCourse}',[
        'as' => 'user.takeAttemptCourseExam',
        'uses' => 'User\UserDashboardController@takeAttemptCourseExam'
    ]);

    Route::post('attempt-course-exam/taken-course/{takenCourseExam}',[
        'as' => 'user.submitAttemptCourseExam',
        'uses' => 'User\UserDashboardController@submitAttemptCourseExam'
    ]);

    Route::get('attempt-course-exam/exam/{attempt}',[
        'as' => 'user.courseExamAttempt',
        'uses' => 'User\UserDashboardController@courseExamAttempt'
    ]);

    Route::get('attempt-course-exam/certificates',[
        'as' => 'user.takenAttemptCertificates',
        'uses' => 'User\UserDashboardController@takenAttemptCertificates'
    ]);

    Route::get('edit/user/details/user/{user}',[
        'uses' => 'User\UserDashboardController@editUserDetails',
        'as' => 'user.editUserDetails'
    ]);

    Route::post('update/user/details/user/{user}',[
        'uses' => 'User\UserDashboardController@updateUserDetails',
        'as' => 'user.updateUserDetails'
    ]);

    Route::get('edit/user/password/{user}',[
        'uses' => 'User\UserDashboardController@editUserPassword',
        'as' => 'user.editUserPassword'
    ]);

    Route::post('update/user/password/{user}',[
        'uses' => 'User\UserDashboardController@updateUserPassword',
        'as' =>'user.updateUserPassword'
    ]);

    Route::get('credit/history',[
        'uses' => 'User\UserDashboardController@creditHistory',
        'as' =>'user.creditHistory'
    ]);


    // submit assignments
    Route::get('taken-course/{takenCourse}/assignment/{assignment}/submit-answer', [
        'as' => 'user.submitAssignment',
        'uses' => 'User\UserDashboardController@submitAssignment'
    ]);
    Route::post('taken-course/{takenCourse}/assignment/{assignment}/submit-answer', [
        'as' => 'user.submitAssignmentPost',
        'uses' => 'User\UserDashboardController@submitAssignmentPost'
    ]);
});


//company
Route::group(['middleware' => ['role:company','auth'] ,'prefix' => 'company'], function () {

    Route::get('dashboard/company/{company}', [
        'uses' =>'Company\CompanyDashboardController@dashboard',
        'as' => 'company.dashboard'
    ]);

    Route::get('list/all/packages/company/{company}',[
        'uses' => 'Company\CompanyDashboardController@allPackages',
        'as' => 'company.allPackages'
    ]);

    Route::get('package/details/company/{company}/taken-package/{takenpackage}',[
        'uses' => 'Company\CompanyDashboardController@packageDetails',
        'as' => 'company.packageDetails'
    ]);

    Route::get('package/details/company/{company}/taken-package/{takenPackage}/members',[
        'uses' => 'Company\CompanyDashboardController@takenPackageCompanyUsers',
        'as' => 'company.takenPackageCompanyUsers'
    ]);

    Route::get('package/details/company/{company}/taken-package/{takenPackage}/attempts',[
        'uses' => 'Company\CompanyDashboardController@takenPackageCompanyAttempts',
        'as' => 'company.takenPackageCompanyAttempts'
    ]);

    Route::get('company/{company}/taken-courses/all',[
        'uses' => 'Company\CompanyDashboardController@allTakenCourses',
        'as' => 'company.allTakenCourses'
    ]);
    Route::get('company/{company}/taken-course/{takenCourse}/details',[
        'uses' => 'Company\CompanyDashboardController@courseDetails',
        'as' => 'company.courseDetails'
    ]);

    Route::get('company/{company}/taken-course/{takenCourse}/users',[
        'uses' => 'Company\CompanyDashboardController@takenCourseUsers',
        'as' => 'company.takenCourseUsers'
    ]);

    Route::get('company/{company}/taken-attempt/all',[
        'uses' => 'Company\CompanyDashboardController@takenAttempts',
        'as' => 'company.takenAttempts'
    ]);

    Route::get('company/{company}/taken-attempt/certificates',[
        'uses' => 'Company\CompanyDashboardController@allCertificates',
        'as' => 'company.allCertificates'
    ]);

    Route::get('company/{company}/taken-course/{takenCourse}/attempts',[
        'uses' => 'Company\CompanyDashboardController@takenCourseAttempts',
        'as' => 'company.takenCourseAttempts'
    ]);

    Route::get('company/{company}/taken-attempt/{takenAttempt}/response',[
        'uses' => 'Company\CompanyDashboardController@courseExamAttemptDetails',
        'as' => 'company.courseExamAttemptDetails'
    ]);

    Route::get('company/{company}/subrole/{subrole}/attempts',[
        'uses' => 'Company\CompanyDashboardController@subroleExamAttempts',
        'as' => 'company.subroleExamAttempts'
    ]);

    Route::get('company/{company}/subrole/{subrole}/taken-courses',[
        'uses' => 'Company\CompanyDashboardController@subroleTakenCourse',
        'as' => 'company.subroleTakenCourse'
    ]);

    Route::get('company/{company}/my-messages',[
        'uses' => 'Company\CompanyDashboardController@messages',
        'as' => 'company.messages'
    ]);

    Route::get('company/{company}/company-messages',[
        'uses' => 'Company\CompanyDashboardController@allMessages',
        'as' => 'company.all.messages'
    ]);

    Route::get('company/{company}/message/{messageTo}',[
        'uses' => 'Company\CompanyDashboardController@message',
        'as' => 'company.message'
    ]);

    Route::get('company/{company}/message/between/{messageFrom}/{messageTo}',[
        'uses' => 'Company\CompanyDashboardController@compMessage',
        'as' => 'company.compMessage'
    ]);

    Route::post('enrolled/new/user/company/{company}/package/{takenpackage}',[
        'uses' => 'Company\CompanyDashboardController@userEnrolledinTakenPackage',
        'as' => 'user.userEnrolled'
    ]);


    // Route::any('device/search/company/{company}', [
    //     'uses' =>'Company\CompanyDashboardController@deviceSearch',
    //     'as' => 'company.deviceSearch'
    // ]);


    // Route::get('devices/all/company/{company}', [
    //     'uses' =>'Company\CompanyDashboardController@servicesAll',
    //     'as' => 'company.servicesAll'
    // ]);


    // Route::get('devices/company/{company}/type/{type}/location-status/{status?}', [
    //     'uses' =>'Company\CompanyDashboardController@productsAllOfType',
    //     'as' => 'company.productsAllOfType'
    // ]);

    // Route::get('online/devices/all/company/{company}', [
    //     'uses' =>'Company\CompanyDashboardController@onlineServicesAll',
    //     'as' => 'company.onlineServicesAll'
    // ]);

    // Route::get('offline/devices/all/company/{company}', [
    //     'uses' =>'Company\CompanyDashboardController@offlineServicesAll',
    //     'as' => 'company.offlineServicesAll'
    // ]);

    // Route::get('product/edit/company/{company}/device/{device}', [
    //     'uses' =>'Company\CompanyDashboardController@productEdit',
    //     'as' => 'company.productEdit'
    // ]);

    // Route::post('product/update/company/{company}/device/{device}', [
    //     'uses' =>'Company\CompanyDashboardController@productUpdate',
    //     'as' => 'company.productUpdate'
    // ]);

    // Route::get('product/status/company/{company}/device/{macid}', [
    //     'uses' =>'Company\CompanyDashboardController@productStatus',
    //     'as' => 'company.productStatus'
    // ]);

    // Route::get('product/settings/company/{company}/device/{macid}', [
    //     'uses' =>'Company\CompanyDashboardController@productSettings',
    //     'as' => 'company.productSettings'
    // ]);

    // Route::get('product/version/company/{company}/device/{macid}', [
    //     'uses' =>'Company\CompanyDashboardController@productVersion',
    //     'as' => 'company.productVersion'
    // ]);

    Route::get('company/details/company/{company}', [
        'uses' =>'Company\CompanyDashboardController@companyDetails',
        'as' => 'company.companyDetails'
    ]);

    // Route::get('alarms/all/company/{company}', [
    //     'uses' =>'Company\CompanyDashboardController@alarmsAll',
    //     'as' => 'company.alarmsAll'
    // ]);

    // Route::get('/alarms/all/company/{company}/seen/{id}', [
    //     'uses' =>'Company\CompanyDashboardController@seenupdated',
    //     'as' => 'company.seenValue'
    // ]);

    // Route::get('/alarms/all/company/{company}/hide/alarm-data/{id}', [
    //     'uses' =>'Company\CompanyDashboardController@hideupdated',
    //     'as' => 'company.hideValue'
    // ]);

    // Route::get('products/all/data/company/{company}/type/{type?}', [
    //     'uses' =>'Company\CompanyDashboardController@productsAllActivities',
    //     'as' => 'company.productsAllActivities'
    // ]);

    // Route::get('products/data/filter/company/{company}/type/{type}', [
    //     'uses' =>'Company\CompanyDashboardController@filterData',
    //     'as' => 'company.filterData'
    // ]);

    // Route::get('search/company/{company}/type/{type?}', [
    //     'uses' =>'Company\CompanyDashboardController@searchAll',
    //     'as' => 'company.Search'
    // ]);

    // Route::get('products/alarm/data/filter/company/{company}', [
    //     'uses' =>'Company\CompanyDashboardController@alarmDataFilter',
    //     'as' => 'company.alarmDatafilter'
    // ]);

    // Route::get('device/alarm/search/company/{company}', [
    //     'uses' =>'Company\CompanyDashboardController@searchAllAlarm',
    //     'as' => 'company.alarmSearch'
    // ]);

    // Route::get('single/device/all/data/company/{company}/device/{product}', [
    //     'uses' =>'Company\CompanyDashboardController@singleDeviceAllData',
    //     'as' => 'company.singleDeviceAllData'
    // ]);

    // Route::get('single/device/alarm/data/company/{company}/device/{macid}', [
    //     'uses' =>'Company\CompanyDashboardController@singleDeviceAlarmData',
    //     'as' => 'company.singleDeviceAlarmData'
    // ]);

    // Route::get('single/device/data/map/company/{company}/device/{macid}', [
    //     'uses' =>'Company\CompanyDashboardController@singleDeviceMap',
    //     'as' => 'company.singleDeviceMap'
    // ]);


    // Route::get('single/device/single/data/company/{company}/data/{data}', [
    //     'uses' =>'Company\CompanyDashboardController@singleDeviceSingleData',
    //     'as' => 'company.singleDeviceSingleData'
    // ]);


    // Route::get('single/device/single/data-details/company/{company}/data/{data}', [
    //     'uses' =>'Company\CompanyDashboardController@singleDeviceSingleDataDetails',
    //     'as' => 'company.singleDeviceSingleDataDetails'
    // ]);



    Route::get('company/details/update/{company}', [
        'uses' =>'Company\CompanyDashboardController@companyDetailsUpdate',
        'as' => 'company.companyDetailsUpdate'
    ]);
    Route::post('company/details/update/post/{company}', [
        'uses' =>'Company\CompanyDashboardController@companyDetailsUpdatePost',
        'as' => 'company.companyDetailsUpdatePost'
    ]);


    Route::get('edit/user/details/company/{company}', [
        'uses' =>'Company\CompanyDashboardController@editUserDetails',
        'as' => 'company.editUserDetails'
    ]);

    Route::post('update/user/details/company/{company}', [
        'uses' =>'Company\CompanyDashboardController@updateUserDetails',
        'as' => 'company.updateUserDetails'
    ]);

    Route::get('edit/user/password/company/{company}', [
        'uses' =>'Company\CompanyDashboardController@editUserPassword',
        'as' => 'company.editUserPassword'
    ]);

    Route::post('update/user/password/company/{company}', [
        'uses' =>'Company\CompanyDashboardController@updateUserPassword',
        'as' => 'company.updateUserPassword'
    ]);


    // subrole start

    Route::get('new/subrole/company/{company}', [
        'uses' =>'Company\CompanyDashboardController@newSubrole',
        'as' => 'company.newSubrole'
    ]);

    Route::get('company/{company}/all/subroles/{type}', [
        'uses' =>'Company\CompanyDashboardController@allSubroles',
        'as' => 'company.allSubroles'
    ]);

    Route::get('company/{company}/all-course-matrix', [
        'uses' =>'Company\CompanyDashboardController@courseMatrix',
        'as' => 'company.courseMatrix'
    ]);

    Route::get('subrole/user/add/company/{company}/subrole/{subrole}', [
        'uses' =>'Company\CompanyDashboardController@subroleUserAdd',
        'as' => 'company.subroleUserAdd'
    ]);

    Route::get('new/user/create/company/{company}', [
        'uses' =>'Company\CompanyDashboardController@newUserCreate',
        'as' => 'company.newUserCreate'
    ]);

    Route::post('new/user/create/post/company/{company}', [
        'uses' =>'Company\CompanyDashboardController@newUserCreatePost',
        'as' => 'company.newUserCreatePost'
    ]);

    Route::get('subrole/edit/company/{company}/subrole/{subrole}', [
        'uses' =>'Company\CompanyDashboardController@subroleEdit',
        'as' => 'company.subroleEdit'
    ]);

    Route::post('subrole/update/company/{company}/subrole/{subrole}', [
        'uses' =>'Company\CompanyDashboardController@subroleUpdate',
        'as' => 'company.subroleUpdate'
    ]);

    Route::get('subrole/delete/company/{company}/subrole/{subrole}', [
        'uses' =>'Company\CompanyDashboardController@subroleDelete',
        'as' => 'company.subroleDelete'
    ]);

    

    
    
    // subrole end
    

});


//company
Route::group(['middleware' => ['role:subrole','auth'] ,'prefix' => 'company-person'], function () {

    Route::get('dashboard/subrole/{subrole}', [
        'uses' =>'Company\SubroleController@dashboard',
        'as' => 'subrole.dashboard'
    ]);

    Route::get('list/all/packages/subrole/{subrole}',[
        'uses' => 'Company\SubroleController@allPackages',
        'as' => 'subrole.allPackages'
    ]);

    Route::get('list/all/courses/subrole/{subrole}',[
        'uses' => 'Company\SubroleController@takenCourses',
        'as' => 'subrole.takenCourses'
    ]);

    Route::get('list/all/attempts/subrole/{subrole}',[
        'uses' => 'Company\SubroleController@takenAttempts',
        'as' => 'subrole.takenAttempts'
    ]);

    Route::get('list/all/attempt-certificates/subrole/{subrole}',[
        'uses' => 'Company\SubroleController@takenAttemptCertificates',
        'as' => 'subrole.takenAttemptCertificates'
    ]);

    Route::get('taken-package/details/subrole/{subrole}/package/{takenPackUser}',[
        'uses' => 'Company\SubroleController@takenPackageDetails',
        'as' => 'subrole.packageDetails'
    ]);

    Route::get('taken-course/subrole/{subrole}/course/{course}',[
        'uses' => 'Company\SubroleController@takePackageCourse',
        'as' => 'subrole.takePackageCourse'
    ]);

    Route::get('course-details/subrole/{subrole}/taken-course/{takenCourse}',[
        'as' => 'subrole.takenCourseDetails',
        'uses' => 'Company\SubroleController@takenCourseDetails'
    ]);

    Route::get('attempt-course-exam/subrole/{subrole}/taken-course/{takenCourse}/exams',[
        'as' => 'subrole.allCourseExams',
        'uses' => 'Company\SubroleController@allCourseExams'
    ]);
    Route::get('attempt-course-exam/subrole/{subrole}/exam/{attempt}',[
        'as' => 'subrole.CourseExamAttempt',
        'uses' => 'Company\SubroleController@CourseExamAttempt'
    ]);
    Route::get('attempt-course-exam/subrole/{subrole}/taken-course/{takenCourse}',[
        'as' => 'subrole.takeAttemptCourseExam',
        'uses' => 'Company\SubroleController@takeAttemptCourseExam'
    ]);
    Route::post('attempt-course-exam/subrole/{subrole}/taken-course-exam/{takenCourseExam}',[
        'as' => 'subrole.submitAttemptCourseExam',
        'uses' => 'Company\SubroleController@submitAttemptCourseExam'
    ]);

    Route::get('subrole/{subrole}/taken-course/{takenCourse}/assignment/{assignment}/submit-answer', [
        'as' => 'subrole.submitAssignment',
        'uses' => 'Company\SubroleController@submitAssignment'
    ]);
    Route::post('subrole/{subrole}/taken-course/{takenCourse}/assignment/{assignment}/submit-answer', [
        'as' => 'subrole.submitAssignmentPost',
        'uses' => 'Company\SubroleController@submitAssignmentPost'
    ]);

    // Route::any('device/search/subrole/{subrole}', [
    //     'uses' =>'Company\SubroleController@deviceSearch',
    //     'as' => 'subrole.deviceSearch'
    // ]);

    // Route::get('services/all/subrole/{subrole}',[
    //     'uses' => 'Company\SubroleController@allProduct',
    //     'as' => 'subrole.allProducts'
    // ]);

    // Route::get('devices/subrole/{subrole}/type/{type}/location-status/{status?}', [
    //     'uses' =>'Company\SubroleController@productsAllOfType',
    //     'as' => 'subrole.productsAllOfType'
    // ]);

    // Route::get('products/all/activities/subrole/{subrole}/type/{type?}',[
    //     'uses' => 'Company\SubroleController@allLatestData',
    //     'as' => 'subrole.allLatestData'
    // ]);

    // Route::get('single/device/single/data-details/subrole/{subrole}/data/{data}', [
    //     'uses' =>'Company\SubroleController@singleDeviceSingleDataDetails',
    //     'as' => 'subrole.singleDeviceSingleDataDetails'
    // ]);


    // Route::get('single/device/all/data/subrole/{subrole}/device/{product}', [
    //     'uses' =>'Company\SubroleController@singleDeviceAllData',
    //     'as' => 'subrole.singleDeviceAllData'
    // ]);

    // Route::get('single/device/alarm/data/subrole/{subrole}/device/{macid}', [
    //     'uses' =>'Company\SubroleController@singleDeviceAlarmData',
    //     'as' => 'subrole.singleDeviceAlarmData'
    // ]);

    // Route::get('single/device/data/map/subrole/{subrole}/device/{macid}', [
    //     'uses' =>'Company\SubroleController@singleDeviceMap',
    //     'as' => 'subrole.singleDeviceMap'
    // ]);


    // Route::get('online/devices/all/subrole/{subrole}', [
    //     'uses' =>'Company\SubroleController@onlineServicesAll',
    //     'as' => 'subrole.onlineServicesAll'
    // ]);

    // Route::get('offline/devices/all/subrole/{subrole}', [
    //     'uses' =>'Company\SubroleController@offlineServicesAll',
    //     'as' => 'subrole.offlineServicesAll'
    // ]);



    // Route::get('products/data/filter/{subrole}/type/{type}', [
    //     'uses' =>'Company\SubroleController@dataFilter',
    //     'as' => 'subrole.dataFilter'
    // ]);

    // Route::get('all/filter/datas/{subrole}/type/{type?}', [
    //     'uses' =>'Company\SubroleController@searchFilterData',
    //     'as' => 'subrole.searchData'
    // ]);

    // Route::get('products/all/alarm/data/{subrole}', [
    //     'uses' =>'Company\SubroleController@allAlarmData',
    //     'as' => 'subrole.deviceAllAlarm'
    // ]);

    // Route::get('products/alarm/data/filter/{subrole}', [
    //     'uses' =>'Company\SubroleController@alarmDataFilter',
    //     'as' => 'subrole.alarmsAllFilter'
    // ]);

    // Route::get('products/alarm/filter/datas/{subrole}', [
    //     'uses' =>'Company\SubroleController@alarmSearch',
    //     'as' => 'subrole.alarmSearch'
    // ]);

    // user update

    Route::get('edit/user/details/{subrole}', [
        'uses' =>'Company\SubroleController@editUserDetails',
        'as' => 'subrole.editUserDetails'
    ]);

    Route::post('update/user/details/{subrole}', [
        'uses' =>'Company\SubroleController@updateUserDetails',
        'as' => 'subrole.updateUserDetails'
    ]);

    Route::get('edit/user/password/{subrole}', [
        'uses' =>'Company\SubroleController@editUserPassword',
        'as' => 'subrole.editUserPassword'
    ]);

    Route::post('update/user/password/{subrole}', [
        'uses' =>'Company\SubroleController@updateUserPassword',
        'as' => 'subrole.updateUserPassword'
    ]);
    
    // assesor
    
    
        Route::get('subrole/{subrole}/assessor/list/packages', [
            'uses' =>'Company\SubroleAssessorController@assessorAllPackages',
            'as' => 'assessor.assessorAllPackages',
        ]);
        
    
        Route::get('subrole/{subrole}/assessor/taken-package/{takenPackage}/details', [
            'uses' =>'Company\SubroleAssessorController@packageDetails',
            'as' => 'assessor.packageDetails',
        ]);
        Route::get('subrole/{subrole}/assessor/taken-package/{takenPackage}/course/{course}/assign', [
            'uses' =>'Company\SubroleAssessorController@assignCourse',
            'as' => 'assessor.assignCourse',
        ]);
        Route::post('subrole/{subrole}/assessor/taken-package/{takenPackage}/course/{course}/assign', [
            'uses' =>'Company\SubroleAssessorController@assignCourseToUser',
            'as' => 'assessor.assignCourseToUser',
        ]);
        Route::get('subrole/{subrole}/assessor/taken-package/{takenPackage}/course/{course}/assignment/{assignment}/edit', [
            'uses' =>'Company\SubroleAssessorController@editCourseAssignment',
            'as' => 'assessor.editCourseAssignment',
        ]);
        Route::post('subrole/{subrole}/assessor/taken-package/{takenPackage}/course/{course}/assignment/{assignment}/update', [
            'uses' =>'Company\SubroleAssessorController@saveCourseAssignment',
            'as' => 'assessor.updateCourseAssignment',
        ]);
        Route::post('subrole/{subrole}/assessor/taken-package/{takenPackage}/course/{course}/assignment/save', [
            'uses' =>'Company\SubroleAssessorController@saveCourseAssignment',
            'as' => 'assessor.saveCourseAssignment',
        ]);
        Route::post('subrole/{subrole}/assessor/taken-package/{takenPackage}/course/{course}/assignment/save', [
            'uses' =>'Company\SubroleAssessorController@saveCourseAssignment',
            'as' => 'assessor.saveCourseAssignment',
        ]);
        Route::get('subrole/{subrole}/assessor/company/taken-courses', [
            'uses' =>'Company\SubroleAssessorController@allTakenCourses',
            'as' => 'assessor.allTakenCourses',
        ]);
        Route::get('subrole/{subrole}/assessor/company/taken-courses-attempts', [
            'uses' =>'Company\SubroleAssessorController@takenAttempts',
            'as' => 'assessor.takenAttempts',
        ]);
        Route::get('subrole/{subrole}/assessor/company/taken-courses/{takenCourse}/attempts', [
            'uses' =>'Company\SubroleAssessorController@takenCourseAttempts',
            'as' => 'assessor.takenCourseAttempts',
        ]);
        Route::get('subrole/{subrole}/assessor/company/members', [
            'uses' =>'Company\SubroleAssessorController@companyMembers',
            'as' => 'assessor.companyMembers',
        ]);
        Route::get('subrole/{subrole}/assessor/company/member/{member}/assign-courses', [
            'uses' =>'Company\SubroleAssessorController@assignCourseSingleUser',
            'as' => 'assessor.assignCourseSingleUser',
        ]);
        Route::get('subrole/{subrole}/administrator/company/member/new', [
            'uses' =>'Company\SubroleAssessorController@subroleAdd',
            'as' => 'administrator.subroleAdd',
        ]);
        Route::post('subrole/{subrole}/administrator/company/member/new/save', [
            'uses' =>'Company\SubroleAssessorController@subroleSave',
            'as' => 'administrator.subroleSave',
        ]);
        Route::get('subrole/{subrole}/administrator/company/member/{member}/edit', [
            'uses' =>'Company\SubroleAssessorController@subroleEdit',
            'as' => 'administrator.subroleEdit',
        ]);
        Route::post('subrole/{subrole}/administrator/company/member/{member}/edit', [
            'uses' =>'Company\SubroleAssessorController@subroleUpdate',
            'as' => 'administrator.subroleUpdate',
        ]);
        Route::get('subrole/{subrole}/administrator/company/member/{member}/delete', [
            'uses' =>'Company\SubroleAssessorController@subroleDelete',
            'as' => 'administrator.subroleDelete',
        ]);
        Route::get('subrole/{subrole}/administrator/company/user/new', [
            'uses' =>'Company\SubroleAssessorController@newUserCreate',
            'as' => 'administrator.newUserCreate'
        ]);
        Route::post('subrole/{subrole}/administrator/company/member/new', [
            'uses' =>'Company\SubroleAssessorController@newUserCreatePost',
            'as' => 'administrator.newUserCreatePost'
        ]);

        Route::get('subrole/{subrole}/messages', [
            'uses' =>'Company\SubroleAssessorController@messages',
            'as' => 'subrole.messages'
        ]);
        Route::get('subrole/{subrole}/message/user/{messageTo}', [
            'uses' =>'Company\SubroleAssessorController@message',
            'as' => 'subrole.message'
        ]);

        Route::get('attempt-course-exam/subrole/{subrole}/member-exam/{attempt}',[
            'as' => 'assessor.CourseExamAttempt',
            'uses' => 'Company\SubroleAssessorController@CourseExamAttempt'
        ]);

        
        Route::get('subrole/{subrole}/member/{role}/taken-courses',[
            'uses' => 'Company\SubroleAssessorController@subroleTakenCourse',
            'as' => 'assessor.subroleTakenCourse'
        ]);

        
        Route::get('subrole/{subrole}/member/{role}/attempts',[
            'uses' => 'Company\SubroleAssessorController@subroleExamAttempts',
            'as' => 'assessor.subroleExamAttempts'
        ]);
        Route::get('subrole/{subrole}/company/course-matrix',[
            'uses' => 'Company\SubroleAssessorController@courseMatrix',
            'as' => 'assessor.courseMatrix'
        ]);

        Route::get('subrole/{subrole}/company-members', [
            'uses' =>'Company\SubroleAssessorController@searchMemberAjax',
            'as' => 'subrole.memberSearchAjax'
        ]);

    // assesor end
});
// delete course for all authenticated users
Route::delete('/course/assignment/{assignment}/delete', 'Company\SubroleController@deleteCourseAssignment')->name('deleteCourseAssignment')->middleware('auth');

Route::post('/message/to/{messageTo}', [
    'uses' =>'MessageController@send',
    'as' => 'send.message'
])->middleware('auth');
Route::get('/message/conversation/user/{userTo}', [
    'uses' =>'MessageController@read',
    'as' => 'read.message'
])->middleware('auth');
Route::get('/messages', [
    'uses' =>'MessageController@readAll',
    'as' => 'read.messages'
])->middleware('auth');



