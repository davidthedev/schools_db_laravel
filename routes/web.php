<?php

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/members', 'HomeController@viewAllMembers')->name('members');
Route::get('/member', 'HomeController@addMember')->name('add.member');
Route::post('/member', 'HomeController@storeMember')->name('store.member');
Route::delete('/member/{id}', 'HomeController@deleteMember')->name('destroy.member');

Route::get('/schools', 'HomeController@viewAllSchools')->name('schools');
Route::get('/add-school', function () { return view('add-school'); })->name('add.school');
Route::post('/store-school', 'HomeController@storeSchool')->name('store.school');
