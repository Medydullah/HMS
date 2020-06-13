<?php

use Illuminate\Http\Request;


#test
Route::get('/user', function ( ) { return "API reached";});


#[[ PROFILE ]]
#auth
Route::post('/user/auth/register', 'UserControllerAPI@register');
Route::post('/user/auth/login', 'UserControllerAPI@login');
Route::post('/user/auth/pwd/change', 'UserControllerAPI@recoverPassword');
Route::post('/user/auth/pwd/recover', 'UserControllerAPI@recoverPassword');


Route::get('/user/profile/get/{user_id?}', 'UserControllerAPI@getProfile');
Route::post('/user/profile/update/particulars', 'UserControllerAPI@updateParticulars');
Route::post('/user/profile/update/contact/primary', 'UserControllerAPI@updatePrimaryContact');


#[[ VITALS ]]
#1.2 Vital Signs
Route::get('/user/signs/get/{user_id?}/{vs_id?}', 'UserControllerAPI@getVitalSignRecords');
Route::post('/user/signs/post', 'UserControllerAPI@saveNewVitalSignRecord');

#1.2 Medication
Route::get('/user/medication/get/{user_id?}', 'UserControllerAPI@getMedications');
Route::post('/user/medication/post', 'UserControllerAPI@saveMedications');

#1.3 allergies
Route::get('/user/allergy/get/{user_id?}', 'UserControllerAPI@getAllergies');
Route::post('/user/allergy/post', 'UserControllerAPI@saveNewAllergy');

#1.4 immunization
Route::get('/user/immunization/get/{user_id?}', 'UserControllerAPI@getImmunizations');
Route::post('/user/immunization/post', 'UserControllerAPI@saveNewImmunization');


#[[ JOURNAL ]]
#2.1 records
Route::get('/user/journal/records/get/{user_id?}', 'UserControllerAPI@getJournalRecords');

#2.1 visits
Route::get('/user/journal/visit/details/{visit_id?}', 'UserControllerAPI@getVisitDetails');
Route::get('/user/journal/visit/confirm/{visit_id?}', 'UserControllerAPI@confirmServiceReception');
Route::get('/user/journal/visit/encounter/{visit_id?}/{encounter_code?}', 'UserControllerAPI@getEncounterDatas');

Route::get('/user/visit/full/{visit_id?}', 'UserControllerAPI@downloadServiceForm');






