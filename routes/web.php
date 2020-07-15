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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');












//----------------------------------------0.0 USER -------------------=============================-----
#======Visit============================================================================================
#Auth
Route::get('/user/register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
Route::post('/user/register', 'Auth\RegisterController@register')->name('user.register.submit');
Route::get('/user/logout', 'Auth\LoginController@logout')->name('user.logout');

Route::get('/user/pwd/update/form', 'UserController@showUpdatePwdForm')->name('user.pwd.form');
Route::post('/user/pwd/update', 'UserController@updatePwd')->name('user.pwd.update');

##startPage
Route::get('/user', 'UserController@index')->name('user');

## 0.1  Service Forms
Route::get('/user/service/list', 'UserController@showJournalRecords')->name('user.visits');
Route::get('/user/service/details/{visit_id?}', 'UserController@showVisitFormsDetails')->name('user.service.details');
Route::get('/user/service/confirm/{visit_id?}', 'UserController@confirmServiceReception')->name('user.service.confirm');


## 0.2  profile
Route::get('/user/profile/full', 'UserController@showProfile')->name('user.profile');
Route::get('/user/profile/personal/edit/{group_name?}', 'UserController@showEditProfileForm')->name('user.profile.personal.edit');
Route::post('/user/profile/personal/update', 'UserController@updatePersonalDetails')->name('user.profile.personal.update');
Route::post('/user/profile/contact/p/update', 'UserController@updatePrimaryContact')->name('user.profile.contact.primary.update');
Route::post('/user/profile/contact/e/add', 'UserController@addEmergenceContact')->name('user.profile.contact.emergency.add');
Route::post('/user/profile/relative/add', 'UserController@addBloodRelative')->name('user.profile.relative.add');



##0.3  MedicalBackground
Route::get('/user/info/background', 'UserController@showMedicalBackground')->name('user.info.medical');

#VitalSigns (e.g weight)
Route::get('/user/info/trend/{vs_id?}/{viewMode?}', 'UserController@showVitalSignTrend')->name('user.info.medical.vital_sign.trend');
Route::post('/user/info/trend/new', 'UserController@saveNewVitalSignRecord')->name('user.info.medical.vital_sign.new');
Route::get('/user/info/trend/delete/{value_id?}', 'UserController@deleteVitalSignRecord')->name('user.info.medical.weight.delete');

#0.4 MedicalConditions & Disease (e.g Asthma)
Route::get('/user/info/condition/new', 'UserController@showAddNewConditionForm')->name('user.info.medical.condition.new');
Route::post('/user/info/condition/save', 'UserController@saveNewMedicalCondition')->name('user.info.medical.condition.save');

#0.4 Current Medications
Route::get('/user/info/medication/new', 'UserController@showAddNewMedicationForm')->name('user.info.medical.medication.new');
Route::post('/user/info/medication/save', 'UserController@saveNewMedication')->name('user.info.medical.medication.save');

#0.4 Current Allergies
Route::get('/user/info/allergy/new', 'UserController@showAddNewAllergyForm')->name('user.info.medical.allergy.new');
Route::post('/user/info/allergy/save', 'UserController@saveNewAllergy')->name('user.info.medical.allergy.save');

#0.4 Current Immunizations
Route::get('/user/info/immunizations/new', 'UserController@showAddNewImmunizationsForm')->name('user.info.medical.immunizations.new');
Route::post('/user/info/immunizations/save', 'UserController@saveNewImmunizations')->name('user.info.medical.immunizations.save');


##0.4 MedicalJournal
Route::get('/user/info/journal', 'UserController@showMedicalJournal')->name('user.info.journal');

//----------------------------------------0.0 [[end]] USER -------------------=============================-----

















//-----------------------------------------------------------------------------------------------------------------------
//------------------------- 2.0 Experts Auth --------------------------------------------------------------------------
Route::get('/expert/index', 'HealthExpertController@index')->name('health_employee');


Route::get('/expert/login/{health_provider_id?}', 'Auth\HealthExpertLoginController@showLoginForm')->name('health_employee.login');
Route::post('/expert/login', 'Auth\HealthExpertLoginController@login')->name('health_employee.login.submit');
Route::get('/expert/logout', 'Auth\HealthExpertLoginController@logout')->name('health_employee.logout');
//-------------------------  2.0 [[end]] Experts Auth -----------------------------------------------------------------------------



//-----------------------------------------------------------------------------------------------------------------------
//------------------------- 2.1 (Hospital) OPD Accounts  -------------------------------------------------------
#list of service forms
Route::get('/expert/opd/{active_tab?}', 'HealthExpertController@showServiceForms')->name('hce.opd');

#creating new service form
Route::get('/expert/opd/dmw/verify/{active_tab?}', 'HealthExpertController@verifyDmwValidityForm')->name('hce.opd.dmw.verify.form');
Route::post('/expert/opd/dmw/verify', 'HealthExpertController@verifyDmwValidityAttempt')->name('hce.opd.dmw.verify.attempt');
Route::get('/expert/opd/form/{dmw_id?}/{active_tab?}', 'HealthExpertController@generateNewServiceForm')->name('hce.opd.form.generate');
Route::post('/expert/opd/form', 'HealthExpertController@saveNewServiceForm')->name('hce.opd.form.save');

#search medical data
Route::get('/expert/patient/wallet/search', 'HealthExpertController@searchUserByToken')->name('hce.patient.wallet.search');
Route::get('/expert/patient/wallet/search/submit', 'HealthExpertController@submitSearchQuery')->name('hce.patient.wallet.search.submit');

#lab-test payments
Route::get('/expert/user/patient/payments/form/{access_token?}/{investigation_id?}', 'HealthExpertController@showAddTestPaymentForm')->name('receptionist.user.fee.test.form');
Route::post('/expert/user/patient/payments/save', 'HealthExpertController@saveTestFeePayment')->name('receptionist.user.fee.test.save');
//------------------------- 2.1 [[end]] (Hospital) OPD Accounts  -------------------------------------------------------







//------------------------------------------------------------------------------------------------------------------------------------------
//------------------------- 2.4 (Hospital) Service-form functions------------------------------------------------------------

Route::get('/expert/patient/service/form/{visit_id?}', 'HealthExpertController@showServiceForm')->name('hce.patient.consultation.service_form');
Route::get('/expert/patient/consultation/{visit_id?}', 'HealthExpertController@showActiveVisit')->name('hce.patient.consultation');

#Symptoms
Route::get('/expert/patient/consultation/symptom/add/{visit_id?}', 'HealthExpertController@showSymptomForm')->name('hce.patient.consultation.symptom.form');
Route::post('/expert/patient/consultation/symptom/save', 'HealthExpertController@saveNewSymptom')->name('hce.patient.consultation.symptom.save');

#Physical Examinations
Route::get('/expert/patient/consultation/examination/add/{access_token?}', 'HealthExpertController@showExaminationForm')->name('hce.patient.consultation.examination.form');
Route::post('/expert/patient/consultation/examination/save', 'HealthExpertController@saveNewExamination')->name('hce.patient.consultation.examination.save');

#Lab tests
Route::get('/expert/patient/consultation/investigation/add/{visit_id?}', 'HealthExpertController@showInvestigationForm')->name('hce.patient.consultation.investigation.form');
Route::post('/expert/patient/consultation/investigation/save', 'HealthExpertController@saveNewInvestigation')->name('hce.patient.consultation.investigation.save');
Route::get('/expert/patient/consultation/lab/results/form/{access_token?}/{investigation_id?}', 'HealthExpertController@showAddResultForm')->name('hce.patient.consultation.lab.result.form');
Route::post('/expert/patient/consultation/lab/results/save', 'HealthExpertController@saveResult')->name('hce.patient.consultation.lab.result.save');

Route::get('/expert/patient/consultation/lab/results/view/{result_id?}',
    'DownloadController@downloadLabResult')->name('hce.patient.consultation.lab.result.view');


#Medicines & Prescriptions
Route::get('/expert/patient/consultation/prescriptions/add/{visit_id?}', 'HealthExpertController@showPrescriptionForm')->name('hce.patient.consultation.prescriptions.form');
Route::post('/expert/patient/consultation/prescriptions/save', 'HealthExpertController@saveNewPrescription')->name('hce.patient.consultation.prescriptions.save');

Route::get('/expert/patient/consultation/prescriptions/payment/form/{visit_id?}/{prescription_id?}', 'HealthExpertController@showAddPrescriptionPaymentForm')->name('hce.patient.consultation.prescription.payment.form');
Route::post('/expert/patient/consultation/prescriptions/payment/save', 'HealthExpertController@savePrescriptionPayment')->name('hce.patient.consultation.prescription.payment.save');


#Advice
Route::get('/expert/patient/consultation/advice/add/{access_token?}', 'HealthExpertController@showAdviceForm')->name('hce.patient.consultation.advice.form');
Route::post('/expert/patient/consultation/advice/save', 'HealthExpertController@saveNewAdvice')->name('hce.patient.consultation.advice.save');

#Advice
Route::get('/expert/patient/consultation/final_diagnosis/add/{access_token?}', 'HealthExpertController@showFinalDiagnosisForm')->name('hce.patient.consultation.final_diagnosis.form');
Route::post('/expert/patient/consultation/final_diagnosis/save', 'HealthExpertController@saveNewFinalDiagnosis')->name('hce.patient.consultation.final_diagnosis.save');

//------------------------- 2.1  [[end]] (Hospital) Service form functions--------------------------------------------------------------------------




//------------------------------------------------------------------------------------------------------------------------------------------
//------------------------- 2.4 (Hospital) Other HIMS functions  ------------------------------------------------------------
#Personal Details
Route::get('/expert/user/details/personal/{visit_id?}', 'HealthExpertController@showUserPersonalDetails')->name('expert.user.details.personal');

#Medical Background ( VITALS )
Route::get('/expert/user/info/background/{visit_id?}', 'HealthExpertController@showUserMedicalBackground')->name('expert.user.medical.background');
Route::get('/expert/user/trend/{vs_id?}/{viewMode?}', 'HealthExpertController@showVitalSignTrend')->name('expert.user.medical.vital_sign.trend');

Route::get('/expert/user/journal/{visit_id?}', 'HealthExpertController@showJournalRecords')->name('expert.user.medical.journal');
Route::get('/expert/user/journal/record/{visit_id?}/{record_id?}', 'HealthExpertController@showJournalRecordDetails')->name('expert.user.medical.journal.record');

//------------------------- 2.4 [[End]] (Hospital) Other HIMS functions  ------------------------------------------------------------
















#-------------------------------------------------------------------------------------------------------------------------
#-------------------------- 3.0 [[[ HealthCareProvider ADMIN ]]]-----------------------------------------------------------------
Route::get('/hospital', 'HealthCareProviderController@index')->name('hospital');

#HealthCare Admin Auth
Route::get('/health_provider/login/admin', 'Auth\HealthProviderLoginController@showLoginForm')->name('health_provider.admin.login.form');
Route::post('/health_provider/login/admin', 'Auth\HealthProviderLoginController@login')->name('health_provider.admin.login.login');
Route::get('/health_provider/register', 'Auth\HealthProviderRegisterController@showRegistrationForm')->name('health_provider.registration.form');
Route::post('/health_provider/register', 'Auth\HealthProviderRegisterController@register')->name('health_provider.registration.save');
Route::get('/health_provider/logout', 'Auth\HealthProviderLoginController@logout')->name('health_provider.admin.logout');

Route::get('/health_provider/verify', 'Auth\HealthProviderLoginController@logout')->name('health_provider.mail.verify');

#HealthCare Admin Functions
Route::get('/health_provider/success', 'HomeController@verifyMail')->name('health_provider.mail.verify');

#profile
Route::get('/health_provider/profile', 'HealthCareProviderController@showProfile')->name('health_provider.profile');

#staff | health Experts
Route::get('/health_provider/admin', 'HealthCareProviderController@index')->name('health_provider.admin');
Route::get('/health_provider/expert/{active_tab?}', 'HealthCareProviderController@showEmployees')->name('health_provider.employees');
Route::get('/health_provider/expert/add/{active_tab?}', 'HealthCareProviderController@showAddEmployeeForm')->name('health_provider.employee.add.form');
Route::post('/health_provider/expert/save', 'HealthCareProviderController@saveNewEmployee')->name('health_provider.employee.add.save');

Route::get('/health_provider/expert/edit/{active_tab?}/{expert_id?}', 'HealthCareProviderController@showEditEmployeeForm')->name('health_provider.employee.edit.form');
Route::post('/health_provider/expert/update', 'HealthCareProviderController@updateEmployee')->name('health_provider.employee.update');
Route::get('/health_provider/expert/delete/{expert_id?}', 'HealthCareProviderController@deleteEmployee')->name('health_provider.employee.delete');

#Reports | Service Form
Route::get('/health_provider/admin/service_forms/today', 'HealthCareProviderController@showTodayServiceForms')->name('health_provider.admin.service_forms');
Route::get('/health_provider/admin/service_forms/by_date/{date_string?}', 'HealthCareProviderController@showServiceFormsByDate')->name('health_provider.admin.service_forms.by_date');
Route::post('/health_provider/admin/service_forms/by_date', 'HealthCareProviderController@showServiceFormsByDateCustom')->name('health_provider.admin.service_forms.by_date.custom');

Route::get('/health_provider/admin/service_forms/details/{visit_id?}', 'HealthCareProviderController@showServiceFormDetails')->name('health_provider.admin.service_forms.details');
Route::get('/health_provider/admin/service_forms/close/{visit_id?}', 'HealthCareProviderController@closeServiceForm')->name('health_provider.admin.service_form.close');
Route::get('/health_provider/admin/service_forms/download/{visit_id?}', 'HealthCareProviderController@downloadServiceForm')->name('health_provider.admin.service_forms.download');

#-------------------------- [[end]] HealthCareProvider Admin-------------------------------------------------------------------



















#-----------------------------------------------------------------------------------------------------------------------
#-------------------------- 4.0 Databank Admin---------------------------------------------------------------------
Route::post('/admin', 'HomeController@index')->name('admin');
Route::post('/test/roles', 'HomeController@index')->name('admin');


//#Admin
#[auth]
Route::get('/system/admin/login', 'AdminAuth\LoginController@showLoginForm')->name('system.admin.login');
Route::post('/system/admin/login', 'AdminAuth\LoginController@login')->name('system.admin.login.attempt');
Route::get('/system/admin/logout', 'AdminAuth\LoginController@showLoginForm')->name('system.admin.logout');

Route::get('/system/admin', 'SystemAdminController@index')->name('system.admin'); //providers
Route::get('/system/admin/provider/activate/{provider_id?}', 'SystemAdminController@activateProvider')->name('system.admin.provider.activate'); //providers
Route::get('/system/admin/provider/deactivate/{provider_id?}', 'SystemAdminController@deactivateProvider')->name('system.admin.provider.deactivate'); //providers


Route::get('/system/admin/patients', 'SystemAdminController@showPatients')->name('system.admin.patients');
Route::get('/system/admin/patients/activate/{patient_id?}', 'SystemAdminController@activatePatient')->name('system.admin.patient.activate');
Route::get('/system/admin/patients/deactivate/{patient_id?}', 'SystemAdminController@deactivatePatient')->name('system.admin.patient.deactivate');



Route::get('/system/test', 'SystemAdminController@testMail')->name('system.admin.mail.test');

////////////////////////drug
Route::get('/', 'HealthExpertController@searchUserByToken');
Route::get('expert/pharmacy/{active_tab?}', 'HealthExpertController@showDrug')->name('hce.pharmacy');































