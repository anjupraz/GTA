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

Route::get('/', 'HomeController@index')->name('index');
// Route::get('/calendar', 'HomeController@calendar' )->name('calendar');

//BLOG 
Route::get('/blog/view/{category?}', 'BlogController@blog')->name('blog.view');
// Route::get('/blog-detail/{id}', 'BlogController@blogDetail' )->name('blog.detail');
Route::get('/blog/{slug}', 'BlogController@blogBySlug')->name('blog.slug');

//Event
// Route::get('/events/upcoming', 'EventController@upcoming' )->name('event.upcoming');
// Route::get('/events/completed', 'EventController@completed' )->name('event.completed');
// Route::get('/events', 'EventController@all' )->name('event.all');
Route::get('/events/{slug}', 'EventController@eventBySlug')->name('event.slug');
Route::get('/events/brochure/{slug}', 'EventController@brochure')->name('event.brochure');

//Gallery
Route::get('/gallery', 'GalleryController@show')->name('gallery');
Route::get('/gallery/{slug}', 'GalleryController@galleryBySlug')->name('gallery.slug');

//CONTACT
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact/send', 'ContactController@store')->name('contact.send');

//SERVICES
Route::get('/services/{id}', 'ServiceController@getServiceCategory')->name('service.category.detail');
// Route::get('/services/{slug}', 'ServiceController@serviceBySlug')->name('service');

//IMPACT
Route::get('/working-areas/{id}', 'ImpactController@getImpactCategory')->name('impact.category.detail');
// Route::get('/impact/{slug}', 'ImpactController@impactBySlug')->name('impact');


//OTHERS
Route::get('/about', 'HomeController@about')->name('about');
// Route::get('/career', 'HomeController@career')->name('career');
// Route::get('/donate', 'HomeController@donate')->name('donate');
// Route::get('/clients', 'HomeController@client')->name('client');
Route::get('/team', 'HomeController@team')->name('member');
// Route::get('/president-message', 'HomeController@president')->name('president');

// Route::get('/term', 'HomeController@term' )->name('term');
// Route::get('/privacy', 'HomeController@privacy' )->name('privacy');
// Route::get('/faq', 'HomeController@faq' )->name('faq');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['admin']], function () {

    //USER
    Route::get('/admin/user/menu', 'UserController@menu')->name('users');
    Route::get('/admin/user/status/{id}', 'UserController@status')->name('users.status');
    Route::get('/admin/user/delete/{id}', 'UserController@destroy')->name('users.delete');
    Route::get('/admin/user', 'UserController@admin')->name('users.admin');
    Route::get('/admin/user/add', 'UserController@createAdmin')->name('users.admin.create');
    Route::post('/admin/user/save', 'UserController@storeAdmin')->name('users.admin.store');
    Route::get('/admin/staff', 'UserController@staff')->name('users.staff');
    Route::get('/admin/staff/add', 'UserController@createStaff')->name('users.staff.create');
    Route::post('/admin/staff/save', 'UserController@storeStaff')->name('users.staff.store');

    //CATEGORY
    Route::get('/admin/blog/category', 'CategoryController@blogIndex')->name('blogs.category');
    Route::get('/admin/blog/category/add', 'CategoryController@blogAdd')->name('blogs.category.add');
    Route::post('/admin/blog/category/add', 'CategoryController@blogSave')->name('blogs.category.save');
    Route::get('/admin/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/admin/category/edit/{id}', 'CategoryController@update')->name('category.edit');
    Route::get('/admin/category/status/{id}', 'CategoryController@status')->name('category.status');
    Route::get('/admin/category/featured/{id}', 'CategoryController@featured')->name('category.featured');
    Route::get('/admin/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    //CONTACT
    Route::get('/admin/contact', 'ContactController@show')->name('contact.show');
    Route::get('/admin/contact/delete/{id}', 'ContactController@destroy')->name('contact.delete');

    //BANNER
    Route::get('/admin/banner/list', 'BannerController@index')->name('banners.index');
    Route::get('/admin/banner/add', 'BannerController@create')->name('banners.add');
    Route::post('/admin/banner/add', 'BannerController@store')->name('banners.save');
    Route::get('/admin/banner/edit/{id}', 'BannerController@edit')->name('banners.edit');
    Route::post('/admin/banner/edit/{id}', 'BannerController@update')->name('banners.update');

    //Notice
    Route::get('/admin/notice/list', 'NoticeController@index')->name('notice.index');
    Route::get('/admin/notice/add', 'NoticeController@create')->name('notice.add');
    Route::post('/admin/notice/add', 'NoticeController@store')->name('notice.save');
    Route::get('/admin/notice/edit/{id}', 'NoticeController@edit')->name('notice.edit');
    Route::post('/admin/notice/edit/{id}', 'NoticeController@update')->name('notice.update');

    //Team
    Route::get('/admin/team', 'TeamController@menu')->name('team');
    Route::get('/admin/team/list', 'TeamController@index')->name('team.index');
    Route::get('/admin/team/add', 'TeamController@create')->name('team.add');
    Route::post('/admin/team/add', 'TeamController@store')->name('team.save');
    Route::get('/admin/team/edit/{id}', 'TeamController@edit')->name('team.edit');
    Route::post('/admin/team/edit/{id}', 'TeamController@update')->name('team.update');


    //CATEGORY
    Route::get('/admin/service', 'CategoryController@serviceIndex')->name('service.category');
    Route::get('/admin/service/add', 'CategoryController@serviceAdd')->name('service.category.add');
    Route::post('/admin/service/add', 'CategoryController@serviceSave')->name('service.category.save');
    Route::get('/admin/team/category', 'CategoryController@teamIndex')->name('team.category');
    Route::get('/admin/team/category/add', 'CategoryController@teamAdd')->name('team.category.add');
    Route::post('/admin/team/category/add', 'CategoryController@teamSave')->name('team.category.save');

    //SERVICES
    // Route::get('/admin/services', 'ServiceController@menu')->name('admin.services');
    // Route::get('/admin/service/list', 'ServiceController@index')->name('services.index');
    // Route::get('/admin/service/add', 'ServiceController@create')->name('services.add');
    // Route::post('/admin/service/add', 'ServiceController@store')->name('services.save');
    // Route::get('/admin/service/edit/{id}', 'ServiceController@edit')->name('services.edit');
    // Route::post('/admin/service/edit/{id}', 'ServiceController@update')->name('services.update');

    //IMPACT CATEGORY
    // Route::get('/admin/impact', 'CategoryController@impactIndex')->name('impact.category');
    // Route::get('/admin/impact/add', 'CategoryController@impactAdd')->name('impact.category.add');
    // Route::post('/admin/impact/add', 'CategoryController@impactSave')->name('impact.category.save');

    //CLIENT
    // Route::get('/admin/client', 'ClientController@menu')->name('clients.menu');
    Route::get('/admin/client/list', 'ClientController@index')->name('clients.index');
    Route::get('/admin/client/add', 'ClientController@create')->name('clients.add');
    Route::post('/admin/client/add', 'ClientController@store')->name('clients.save');
    Route::get('/admin/client/edit/{id}', 'ClientController@edit')->name('clients.edit');
    Route::post('/admin/client/edit/{id}', 'ClientController@update')->name('clients.update');

    //CLIENT-MESSAGE
    // Route::get('/admin/client/message/list', 'ClientMessageController@index')->name('client-message.index');
    // Route::get('/admin/client/message/add', 'ClientMessageController@create')->name('client-message.add');
    // Route::post('/admin/client/message/add', 'ClientMessageController@store')->name('client-message.save');
    // Route::get('/admin/client/message/edit/{id}', 'ClientMessageController@edit')->name('client-message.edit');
    // Route::post('/admin/client/message/edit/{id}', 'ClientMessageController@update')->name('client-message.update');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('home');

    //BLOG
    Route::get('/admin/blog', 'PostController@menu')->name('blogs');
    Route::get('/admin/blog/list', 'PostController@index')->name('blogs.index');
    Route::get('/admin/blog/add', 'PostController@create')->name('blogs.add');
    Route::post('/admin/blog/add', 'PostController@store')->name('blogs.save');
    Route::get('/admin/blog/edit/{id}', 'PostController@edit')->name('blogs.edit');
    Route::post('/admin/blog/edit/{id}', 'PostController@update')->name('blogs.update');

    //EVENT
    Route::get('/admin/events', 'EventController@index')->name('event.index');
    Route::get('/admin/events/add', 'EventController@create')->name('event.add');
    Route::post('/admin/events/add', 'EventController@store')->name('event.save');
    Route::get('/admin/events/edit/{id}', 'EventController@edit')->name('event.edit');
    Route::post('/admin/events/edit/{id}', 'EventController@update')->name('event.update');

    //GALLERY
    Route::get('/admin/gallery', 'GalleryController@index')->name('gallery.index');
    Route::get('/admin/gallery/add', 'GalleryController@create')->name('gallery.add');
    Route::post('/admin/gallery/add', 'GalleryController@store')->name('gallery.save');
    Route::get('/admin/gallery/edit/{id}', 'GalleryController@edit')->name('gallery.edit');
    Route::post('/admin/gallery/edit/{id}', 'GalleryController@update')->name('gallery.update');

    //POST
    Route::get('/admin/post/status/{id}', 'PostController@status')->name('posts.status');
    Route::get('/admin/post/featured/{id}', 'PostController@featured')->name('posts.featured');
    Route::get('/admin/post/delete/{id}', 'PostController@destroy')->name('posts.delete');

    //IMPACT
    // Route::get('/admin/impact', 'ImpactController@menu')->name('admin.impact');
    // Route::get('/admin/impact/list', 'ImpactController@index')->name('impact.index');
    // Route::get('/admin/impact/add', 'ImpactController@create')->name('impact.add');
    // Route::post('/admin/impact/add', 'ImpactController@store')->name('impact.save');
    // Route::get('/admin/impact/edit/{id}', 'ImpactController@edit')->name('impact.edit');
    // Route::post('/admin/impact/edit/{id}', 'ImpactController@update')->name('impact.update');
    Route::get('/admin/working-areas', 'CategoryController@impactIndex')->name('impact.category');
    Route::get('/admin/working-areas/add', 'CategoryController@impactAdd')->name('impact.category.add');
    Route::post('/admin/working-areas/add', 'CategoryController@impactSave')->name('impact.category.save');

    //GALLERY
    Route::get('/admin/gallery/delete/{id}/', 'PostController@destroyGallery')->name('gallery.delete');

    //VACANCY
    // Route::get('/admin/vacancy', 'VacancyController@index')->name('vacancy.index');
    // Route::get('/admin/vacancy/add', 'VacancyController@create')->name('vacancy.add');
    // Route::post('/admin/vacancy/add', 'VacancyController@store')->name('vacancy.save');
    // Route::get('/admin/vacancy/edit/{id}', 'VacancyController@edit')->name('vacancy.edit');
    // Route::post('/admin/vacancy/edit/{id}', 'VacancyController@update')->name('vacancy.update');



    Route::get('/profile', 'UserController@edit')->name('users.profile');
    Route::post('/profile', 'UserController@update')->name('users.profile.update');
    Route::get('/change-password', 'UserController@password')->name('users.password');
    Route::post('/change-password', 'UserController@changePassword')->name('users.password.change');
});

Auth::routes(['verify' => true, 'register' => false]);
