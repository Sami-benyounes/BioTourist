<?php

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

//Auth::routes();
Route::get('/', 'HomeController@index');

Route::get('users','UserController@index')->name('users');

Route::post('login','Auth\LoginController@login');
Route::get('testLogin','Auth\LoginController@testLogin');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');

Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');

Route::post('register','Auth\RegisterController@register');
Route::get('testRegister','Auth\RegisterController@testRegister');

Route::get('password/email','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::get('password/reset','Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

//autre

Route::get('user/{token}','UserController@show');

Route::post('user/update','UserController@updateProfile');

Route::get('admin/user/{user}','UserController@destroy');

//comment

Route::get('comment','CommentController@create')->name('comment');;

Route::post('comment/store','CommentController@store');

Route::get('comment/announce/{announce}','CommentController@CommentsOfASeller');

Route::get('comment/destroy/{comment}','CommentController@destroy');

Route::get('comment/show','CommentController@showYourPostedComments');

//checks

Route::get('check','CheckController@create');

Route::get('check/status/{check}/{status}','CheckController@updateStatus');

Route::post('check/statusVerification/{idCheck}','CheckController@UpdateStatusVerification');

Route::post('check/storeForAController','CheckController@storeForAController');

Route::post('check/showChecksOfAController','CheckController@showChecksOfAController');

Route::post('admin/checks','CheckController@storeForAnAdmin');

Route::post('check/controllerSendACompleteCheck','CheckController@controllerSendACompleteCheck');

Route::post('check/displayFormCheckregister/{idCheck}','CheckController@displayFormCheckregister');

Route::post('check/destroy/{idCheck}','CheckController@destroy');

Route::get('myMap','AnnounceController@printMap');

//Contact

Route::get('contact','ContactController@create');

Route::get('contact/index','ContactController@ContactsWithAssociedUsers');

Route::post('contact/storeForAnAnonymous','ContactController@storeForAnAnonymous');

Route::post('contact/storeForAnAuthentifiedUser','ContactController@storeForAnAnonymous');

Route::get('contact/destroy/{idContact}','ContactController@destroy');

Route::post('contact/user','ContactController@ContactsOfAUser');


//Discount_code

Route::get('discountCode','Discount_CodeController@store');
Route::post('discountCode','Discount_CodeController@store');

Route::post('discountCode/updateStatus','Discount_CodeController@updateStatus');

Route::post('discountCode/discountCodeValid','Discount_CodeController@checkDiscountCodeIsValid');

Route::post('discountCode/show','Discount_CodeController@showDiscountCodeOfAUser');

//Favoris

Route::get('favori/show','FavoriController@showFavorisOfAUser');

Route::get('favori/testShow','FavoriController@testShowFavorisOfAUser');

Route::post('favori/store','FavoriController@store');

Route::post('favori/destroy','FavoriController@destroy');

//Messages

Route::get('message/store','MessageController@store');

Route::get('message/show/seller','MessageController@showMessagesOfASeller');

Route::get('message/show/User','MessageController@showMessagesOfATouristController');

//Report

Route::post('report/store','ReportController@store');

Route::post('report/show/user','ReportController@showAllMyReports');

// Cart
Route::get('cart', 'CartController@index');

// Profil
Route::get('profil', 'ProfilController@profil');
Route::get('message', 'ProfilController@message');
Route::get('favorite', 'ProfilController@favorite');

// FAQ
Route::get('faq', 'FaqController@index');
Route::get('report/show/admin','ReportController@showAllReportsForAdmin');

//User_status_Correspondence

Route::post('User_status/change','User_Status_CorrespondenceController@changeDefaultUserStatus');
Route::get('User_status/change','User_Status_CorrespondenceController@testChangeDefaultUserStatus');

Route::post('user/addStatus','User_Status_CorrespondenceController@addUserStatusTouristOrSeller');
Route::get('User_status/addStatus','User_Status_CorrespondenceController@testaddUserStatusTouristOrSeller');

Route::get('User_status/addStatusAdminController','User_Status_CorrespondenceController@testaddUserStatusAdminOrController');

//Seller

Route::post('seller/updateBio','SellerController@updateBioStatus');
Route::get('seller/testupdateBio','SellerController@testupdateBioStatus');

Route::post('seller/updateDescription','SellerController@updateDescription');
Route::get('seller/testupdateDescription','SellerController@testupdateDescription');

Route::get('seller/testSelect','SellerController@testSelectSellersByCommentsNotes');

/********************************************** Route pour front test **********************************************/

Route::get('register','UserController@profil');

Route::get('messages','MessageController@index');

Route::get('aide',function(){
    return view('');
});


/********************************************** Fin Route pour front test **********************************************/


/********************************************** Debut Routes Announces **********************************************/

Route::get('announces','AnnounceController@index');

Route::post('filterByCategorie','AnnounceController@filterByCategorie');

Route::post('filterByCity','AnnounceController@filterByCity');

Route::get('announce/store','AnnounceController@store');

Route::get('announce/delete','AnnounceController@delete');

Route::get('announce/update','AnnounceController@update');

Route::get('announce/historySeller','AnnounceController@selectHistorySeller');

Route::get('announce/addAnnounces','AnnounceController@addAnnounces');


/********************************************** Fin Routes Announces **********************************************/

//Admin

Route::get('admin','AdminController@index');

Route::get('admin/checks','AdminController@showChecks');

//Controller

Route::get('controller','ControllerController@index');




//Route::post('admin','AdminController@index');
