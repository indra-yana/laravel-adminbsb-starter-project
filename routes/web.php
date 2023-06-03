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

use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\User\PermissionController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;

Auth::routes();

Route::group(['prefix' => '/'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/home', [DashboardController::class, 'index'])->name('home.dashboard');
});

Route::group(['prefix' => 'branch'], function () {
    Route::get('/', [BranchController::class, 'index'])->name('branch.index');
    Route::get('create', [BranchController::class, 'create'])->name('branch.create');
    Route::post('store', [BranchController::class, 'store'])->name('branch.store');
    Route::get('{id}/edit', [BranchController::class, 'edit'])->name('branch.edit');
    Route::post('update', [BranchController::class, 'update'])->name('branch.update');
    Route::post('delete', [BranchController::class, 'delete'])->name('branch.delete');
    Route::get('dtIndex.json', [BranchController::class, 'dtIndex'])->name('branch.dtIndex');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update', [UserController::class, 'update'])->name('user.update');
    Route::post('delete', [UserController::class, 'delete'])->name('user.delete');
    Route::get('dtIndex.json', [UserController::class, 'dtIndex'])->name('user.dtIndex');
    Route::get('{id}/permission', [UserController::class, 'permission'])->name('user.permission');
    Route::post('store-permission', [UserController::class, 'storePermission'])->name('user.store.permission');
    Route::post('delete-permission', [UserController::class, 'deletePermission'])->name('user.delete.permission');
    Route::get('dtIndexPermission', [UserController::class, 'dtIndexPermission'])->name('user.dtIndex.permission');
    Route::get('{id}/role', [UserController::class, 'role'])->name('user.role');
    Route::post('store-role', [UserController::class, 'storeRole'])->name('user.store.role');
    Route::post('delete-role', [UserController::class, 'deleteRole'])->name('user.delete.role');
    Route::get('dtIndexRole', [UserController::class, 'dtIndexRole'])->name('user.dtIndex.role');
    Route::post('activate-or-inactivate', [UserController::class, 'activateOrInactivate'])->name('user.activateOrInactivate');
});

Route::group(['prefix' => 'permission'], function () {
	Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('update', [PermissionController::class, 'update'])->name('permission.update');
    Route::post('delete', [PermissionController::class, 'delete'])->name('permission.delete');
    Route::get('dtIndex', [PermissionController::class, 'dtIndex'])->name('permission.dtIndex');
});

Route::group(['prefix' => 'role'], function () {
	Route::get('/', [RoleController::class, 'index'])->name('role.index');
    Route::get('create', [RoleController::class, 'create'])->name('role.create');
    Route::post('store', [RoleController::class, 'store'])->name('role.store');
    Route::get('{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('update', [RoleController::class, 'update'])->name('role.update');
    Route::post('delete', [RoleController::class, 'delete'])->name('role.delete');
    Route::get('dtIndex', [RoleController::class, 'dtIndex'])->name('role.dtIndex');
});



/// ADMIN TEMPLATE RESOURCES ROUTE ///
Route::group(['prefix' => 'template', /*'middleware' => 'auth'*/], function () {
    // DASHBOARD
    Route::get('dashboard', function () {
        return view('adminBSB-example/dashboard.index');
    })->name('adminBSB.dashboard.index');

    // TYPOGRAPHY
    Route::get('typography', function () {
        return view('adminBSB-example/typography.typography');
    })->name('adminBSB.typography');

    // HELPER CLASSES
    Route::get('helper-classes', function () {
        return view('adminBSB-example/helper-classes.helper-classes');
    })->name('adminBSB.helper-classes');

    // WIDGET
    Route::get('widgets/cards/basic', function () {
        return view('adminBSB-example/widgets/cards.basic');
    })->name('adminBSB.widgets.cards.basic');

    Route::get('widgets/cards/colored', function () {
        return view('adminBSB-example/widgets/cards.colored');
    })->name('adminBSB.widgets.cards.colored');

    Route::get('widgets/cards/no-header', function () {
        return view('adminBSB-example/widgets/cards.no-header');
    })->name('adminBSB.widgets.cards.no-header');

    Route::get('widgets/infobox/infobox-1', function () {
        return view('adminBSB-example/widgets/infobox.infobox-1');
    })->name('adminBSB.widgets.infobox.infobox-1');

    Route::get('widgets/infobox/infobox-2', function () {
        return view('adminBSB-example/widgets/infobox.infobox-2');
    })->name('adminBSB.widgets.infobox.infobox-2');

    Route::get('widgets/infobox/infobox-3', function () {
        return view('adminBSB-example/widgets/infobox.infobox-3');
    })->name('adminBSB.widgets.infobox.infobox-3');

    Route::get('widgets/infobox/infobox-4', function () {
        return view('adminBSB-example/widgets/infobox.infobox-4');
    })->name('adminBSB.widgets.infobox.infobox-4');

    Route::get('widgets/infobox/infobox-5', function () {
        return view('adminBSB-example/widgets/infobox.infobox-5');
    })->name('adminBSB.widgets.infobox.infobox-5');

    // UI
    Route::get('ui/alerts', function () {
        return view('adminBSB-example/ui.alerts');
    })->name('adminBSB.ui.alerts');

    Route::get('ui/animations', function () {
        return view('adminBSB-example/ui.animations');
    })->name('adminBSB.ui.animations');

    Route::get('ui/badges', function () {
        return view('adminBSB-example/ui.badges');
    })->name('adminBSB.ui.badges');

    Route::get('ui/breadcrumbs', function () {
        return view('adminBSB-example/ui.breadcrumbs');
    })->name('adminBSB.ui.breadcrumbs');

    Route::get('ui/buttons', function () {
        return view('adminBSB-example/ui.buttons');
    })->name('adminBSB.ui.buttons');

    Route::get('ui/collapse', function () {
        return view('adminBSB-example/ui.collapse');
    })->name('adminBSB.ui.collapse');

    Route::get('ui/colors', function () {
        return view('adminBSB-example/ui.colors');
    })->name('adminBSB.ui.colors');

    Route::get('ui/dialogs', function () {
        return view('adminBSB-example/ui.dialogs');
    })->name('adminBSB.ui.dialogs');

    Route::get('ui/icons', function () {
        return view('adminBSB-example/ui.icons');
    })->name('adminBSB.ui.icons');

    Route::get('ui/labels', function () {
        return view('adminBSB-example/ui.labels');
    })->name('adminBSB.ui.labels');

    Route::get('ui/list-group', function () {
        return view('adminBSB-example/ui.list-group');
    })->name('adminBSB.ui.list-group');

    Route::get('ui/media-object', function () {
        return view('adminBSB-example/ui.media-object');
    })->name('adminBSB.ui.media-object');

    Route::get('ui/modals', function () {
        return view('adminBSB-example/ui.modals');
    })->name('adminBSB.ui.modals');

    Route::get('ui/notifications', function () {
        return view('adminBSB-example/ui.notifications');
    })->name('adminBSB.ui.notifications');

    Route::get('ui/pagination', function () {
        return view('adminBSB-example/ui.pagination');
    })->name('adminBSB.ui.pagination');

    Route::get('ui/preloaders', function () {
        return view('adminBSB-example/ui.preloaders');
    })->name('adminBSB.ui.preloaders');

    Route::get('ui/progressbars', function () {
        return view('adminBSB-example/ui.progressbars');
    })->name('adminBSB.ui.progressbars');

    Route::get('ui/range-sliders', function () {
        return view('adminBSB-example/ui.range-sliders');
    })->name('adminBSB.ui.range-sliders');

    Route::get('ui/sortable-nestable', function () {
        return view('adminBSB-example/ui.sortable-nestable');
    })->name('adminBSB.ui.sortable-nestable');

    Route::get('ui/tabs', function () {
        return view('adminBSB-example/ui.tabs');
    })->name('adminBSB.ui.tabs');

    Route::get('ui/thumbnails', function () {
        return view('adminBSB-example/ui.thumbnails');
    })->name('adminBSB.ui.thumbnails');

    Route::get('ui/tooltips-popovers', function () {
        return view('adminBSB-example/ui.tooltips-popovers');
    })->name('adminBSB.ui.tooltips-popovers');

    Route::get('ui/waves', function () {
        return view('adminBSB-example/ui.waves');
    })->name('adminBSB.ui.waves');

    // FORMS
    Route::get('forms/advanced-form-elements', function () {
        return view('adminBSB-example/forms.advanced-form-elements');
    })->name('adminBSB.forms.advanced-form-elements');

    Route::get('forms/basic-form-elements', function () {
        return view('adminBSB-example/forms.basic-form-elements');
    })->name('adminBSB.forms.basic-form-elements');

    Route::get('forms/editors', function () {
        return view('adminBSB-example/forms.editors');
    })->name('adminBSB.forms.editors');

    Route::get('forms/form-examples', function () {
        return view('adminBSB-example/forms.form-examples');
    })->name('adminBSB.forms.forms-examples');

    Route::get('forms/form-validation', function () {
        return view('adminBSB-example/forms.form-validation');
    })->name('adminBSB.forms.form-validation');

    Route::get('forms/form-wizard', function () {
        return view('adminBSB-example/forms.form-wizard');
    })->name('adminBSB.forms.form-wizard');

    // TABLES
    Route::get('tables/normal-table', function () {
        return view('adminBSB-example/tables.normal-table');
    })->name('adminBSB.tables.normal-table');

    Route::get('tables/jquery-datatable', function () {
        return view('adminBSB-example/tables.jquery-datatable');
    })->name('adminBSB.tables.jquery-datatable');

    Route::get('tables/editable-table', function () {
        return view('adminBSB-example/tables.editable-table');
    })->name('adminBSB.tables.editable-table');

    // MEDIA
    Route::get('media/carousel', function () {
        return view('adminBSB-example/media.carousel');
    })->name('adminBSB.media.carousel');

    Route::get('media/image-gallery', function () {
        return view('adminBSB-example/media.image-gallery');
    })->name('adminBSB.media.image-gallery');

    // CHARTS
    Route::get('chart/morris', function () {
        return view('adminBSB-example/chart.morris');
    })->name('adminBSB.chart.morris');

    Route::get('chart/flot', function () {
        return view('adminBSB-example/chart.flot');
    })->name('adminBSB.chart.flot');

    Route::get('chart/chart-js', function () {
        return view('adminBSB-example/chart.chart-js');
    })->name('adminBSB.chart.chart-js');

    Route::get('chart/sparkline', function () {
        return view('adminBSB-example/chart.sparkline');
    })->name('adminBSB.chart.sparkline');

    Route::get('chart/jquery-knob', function () {
        return view('adminBSB-example/chart.jquery-knob');
    })->name('adminBSB.chart.jquery-knob');

    // EXAMPLE PAGE
    Route::get('example-pages/404', function () {
        return view('adminBSB-example/example-pages.404');
    })->name('adminBSB.example-pages.404');

    Route::get('example-pages/500', function () {
        return view('adminBSB-example/example-pages.500');
    })->name('adminBSB.example-pages.500');

    Route::get('example-pages/blank-page', function () {
        return view('adminBSB-example/example-pages.blank-page');
    })->name('adminBSB.example-pages.blank-page');

    Route::get('example-pages/forgot-password', function () {
        return view('adminBSB-example/example-pages.forgot-password');
    })->name('adminBSB.example-pages.forgot-password');

    Route::get('example-pages/profile', function () {
        return view('adminBSB-example/example-pages.profile');
    })->name('adminBSB.example-pages.profile');

    Route::get('example-pages/sign-in', function () {
        return view('adminBSB-example/example-pages.sign-in');
    })->name('adminBSB.example-pages.sign-in');

    Route::get('example-pages/sign-up', function () {
        return view('adminBSB-example/example-pages.sign-up');
    })->name('adminBSB.example-pages.sign-up');

    // MAPS
    Route::get('maps/google', function () {
        return view('adminBSB-example/maps.google');
    })->name('adminBSB.maps.google');

    Route::get('maps/jvectormap', function () {
        return view('adminBSB-example/maps.jvectormap');
    })->name('adminBSB.maps.jvectormap');

    Route::get('maps/yandex', function () {
        return view('adminBSB-example/maps.yandex');
    })->name('adminBSB.maps.yandex');
});

