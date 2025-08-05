<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PartyController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\WidgetController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DirectoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UsefulLinkController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\GlobalSettingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'adminLogin'])->name('login');
Route::post('/admin/login/post', [UserController::class, 'adminLoginPost'])->name('admin-login-post');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });


    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('profile-info', [AuthController::class, 'profilePage'])->name('profile_info');
    Route::post('profile-info-update', [AuthController::class, 'update'])->name('profile_update');
    Route::get('profile-password', [AuthController::class, 'passwordPage'])->name('profile_password');
    Route::post('profile-password-update', [AuthController::class, 'passwordUpdate'])->name('update_password');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::resource('announcements', AnnouncementController::class);
    Route::post('/announcement/status/update/{id}', [AnnouncementController::class, 'statusUpdate'])->name('announcement.status');
	Route::post('/announcement/mode/update', [AnnouncementController::class, 'AnnouncementSwitch'])->name('announcement.mode');

    Route::resource('category', CategoryController::class);
    Route::resource('widget', WidgetController::class);
    Route::resource('archive', ArchiveController::class);
    Route::resource('page', PageController::class);
    Route::resource('notice', NoticeController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('party', PartyController::class);
    Route::resource('video', VideoController::class);
    Route::resource('link', UsefulLinkController::class);
    Route::resource('archive', ArchiveController::class);
    Route::resource('directory', DirectoryController::class);

    Route::get('global-setting', [GlobalSettingController::class, 'create'])->name('global.create');
    Route::post('global-store', [GlobalSettingController::class, 'updateOrCreateGlobalSetting'])->name('global.store');

    // Route::post('/summernote-upload', [PageController::class, 'upload'])->name('summernote.upload');

    Route::post('/tinymce/upload', [PageController::class, 'upload'])->name('tinymce.upload');


    Route::post('/logout', [UserController::class, 'adminLogout'])->name('admin-logout');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
