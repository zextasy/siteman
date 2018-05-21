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

Route::get('/', function () {
    return view('home.index');
});
Route::get('/test', function () {
    return view('home.test');
});
Auth::routes();

Route::get('/home', 'HomeController@admin_index');

Route::get('dashboard/', 'DashboardController@index');

Route::get('template', 'TemplateController@index');
Route::get('template/create/{temp?}/{form?}', 'TemplateController@create');
Route::post('template/store', 'TemplateController@store');
Route::get('template/edit/{name}', 'TemplateController@edit');
Route::patch('template/edit/{name}', 'TemplateController@update');
Route::get('template/delete/{name}', 'TemplateController@delete');
Route::delete('template/edit/{name}', 'TemplateController@destroy');
Route::get('template/{name}', 'TemplateController@show');

Route::get('form/edit/{name}', 'FormController@edit');
Route::patch('form/edit/{name}', 'FormController@update');
Route::get('form/delete/{name}', 'FormController@delete');
Route::delete('form/edit/{name}', 'FormController@destroy');
Route::get('form/{name}', 'FormController@show');

Route::get('form/attr/edit/{attr_id}/{name}', 'FormAttributeController@edit');
Route::patch('form/attr/edit/{attr_id}', 'FormAttributeController@update');
Route::get('form/attr/delete/{attr_id}/{name}', 'FormAttributeController@delete');
Route::delete('form/attr/delete/{attr_id}', 'FormAttributeController@destroy');
Route::get('form/attr/move/{attr_id}/{name}', 'FormAttributeController@move');
Route::post('/attr/move/{attr_id}', 'FormAttributeController@update_index');

Route::get('site_audits/{name}', 'SiteAuditController@index');

Route::get('site_audit/{name}', 'SiteAuditController@index');
Route::get('form/audit/{name}', 'SiteAuditController@form_index');
Route::get('create/{temp_id}/{form_name}', 'SiteAuditController@create');
Route::post('store', 'SiteAuditController@store');

Route::get('siteAudit/{name}/edit/{id}', 'SiteAuditController@edit');
Route::patch('store/edit/{id}', 'SiteAuditController@update');
Route::get('siteAudit/{name}/show/{id}', 'SiteAuditController@show');
Route::get('siteAudit/{name}/delete/{id}', 'SiteAuditController@delete');
Route::delete('delete/{id}', 'SiteAuditController@destroy');


Route::get('tower_mapping/{name}', 'TowerMappingController@index');


Route::get('reports', 'ReportController@index');
Route::get('export', 'ReportController@export');


Route::get('projects/', 'ProjectsController@index');
Route::get('projects/create', 'ProjectsController@create');
Route::post('projects/create', 'ProjectsController@store');
Route::get('projects/show/{id}', 'ProjectsController@show');
Route::get('projects/edit/{id}', 'ProjectsController@edit');
Route::patch('projects/edit/{id}', 'ProjectsController@update');
Route::get('projects/delete/{id}', 'ProjectsController@delete');
Route::delete('projects/delete/{id}', 'ProjectsController@destroy');



Route::get('tasks/', 'TasksController@index');
Route::get('tasks/my/', 'TasksController@index_personal');
Route::get('tasks/create', 'TasksController@create');
Route::post('tasks/create', 'TasksController@store');
Route::get('tasks/show/{id}', 'TasksController@show');
Route::get('tasks/edit/{id}', 'TasksController@edit');
Route::patch('tasks/edit/{id}', 'TasksController@update');
Route::get('tasks/delete/{id}', 'TasksController@delete');
Route::delete('tasks/delete/{id}', 'TasksController@destroy');
Route::get('tasks/approve/{id}', 'TasksController@approve');
Route::patch('tasks/approve/{id}', 'TasksController@update_approve');

// Route::get('mail/admins/sendMail', 'AdminsController@sentMail');
// Route::post('mail/admins/sendMail', 'AdminsController@sendMail');
// Route::get('mail/admins/', 'AdminsController@index');
// Route::get('mail/admins/recievedMail/{id}', 'AdminsController@show'); 

Route::get('users/admin/', 'UsersController@index');
Route::get('users/admin/create', 'UsersController@create');
Route::post('users/admin/create', 'UsersController@store');
Route::get('users/admin/show/{id}', 'UsersController@show');
Route::get('users/admin/edit/{id}', 'UsersController@edit');
Route::patch('users/admin/edit/{id}', 'UsersController@update');

// User admin Routes...
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

});