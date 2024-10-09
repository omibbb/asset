<?php

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\authentications\CustomAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\AssetController as AssetController;
use App\Http\Controllers\BarcodeController as BarcodedController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SoftwaresController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\NetworkDeviceController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\PrintersController;

// Main Page Route
// Bungkus dengan middleware authentication jetsream
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');
    Route::get('/', [AssetController::class, 'create'])->name('assets.add-assets');
    Route::get('/users/manager', [Analytics::class, 'userAdmins'])->name('users-administrator');
    Route::delete('/destroy', [CustomAuthController::class, 'destroy'])->name('current-user.destroy');
    Route::patch('/profile/photo', [UpdateUserProfileInformation::class, 'updateProfilePhoto'])->name('profile.update.photo');

    // Barcode Management
    // Route::get('/barcode/create', [BarcodedController::class, 'create'])->name('barcode.create');
    // Route::post('/barcode/store', [BarcodedController::class, 'store'])->name('barcode.store');
    // Route::get('/barcode/view/{id}', [BarcodedController::class, 'view'])->name('barcode.view');
    // Route::get('/barcode/scan', function () {
    //     return view('content.barcode.scan-barcode');
    // })->name('barcode.scan');
    Route::get('/barcode/manage-barcode', [BarcodedController::class, 'manage'])->name('barcode.manage');
    Route::delete('/barcode/destroy/{id}', [BarcodedController::class, 'destroy'])->name('barcode.destroy');

    // Assets Management
    Route::get('/assets/list-assets', [AssetController::class, 'index'])->name('assets.tables-list-assets');
    Route::get('/assets/add-asset', [AssetController::class, 'create'])->name('assets.add-assets');
    Route::get('/assets/devices', [AssetController::class, 'device'])->name('assets.devices-form');
    Route::get('/assets/software', [AssetController::class, 'software'])->name('assets.software-form');
    Route::get('/assets/phone-device', [AssetController::class, 'phoneDevice'])->name('assets.phone-form');
    Route::get('/assets/network-device', [AssetController::class, 'networkDevice'])->name('assets.network-device-form');
    Route::get('/assets/monitor', [AssetController::class, 'monitor'])->name('assets.monitor-form');
    Route::get('/assets/license', [AssetController::class, 'license'])->name('assets.license-form');
    Route::get('/assets/printers', [AssetController::class, 'printers'])->name('assets.printers-form');
    Route::get('/assets/others', [AssetController::class, 'otherCategory'])->name('assets.others-form');

    Route::delete('/assets/delete/{type}/{id}', [AssetController::class, 'delete'])->name('assets.delete')->where('type', '[a-z]+');
    Route::get('/assets/{type}/{id}/generate-qr', [AssetController::class, 'generateQr'])->name('assets.generateQr');
    Route::get('/assets/{type}/{id}/detail', [AssetController::class, 'getDetail'])->name('assets.getDetail');

    Route::get('/assets/get-by-barcode/{barcode}', [AssetController::class, 'getByBarcode']);

    Route::resource('devices', DeviceController::class);
    Route::resource('software', SoftwaresController::class);
    Route::resource('phones', PhoneController::class);
    Route::resource('networkdevice', NetworkDeviceController::class);
    Route::resource('monitors', MonitorController::class);
    Route::resource('license', LicenseController::class);
    Route::resource('printers', PrintersController::class);
    Route::resource('others', OthersController::class);

    // User Profile
    Route::get('/user/account-session', [AccountSettingsAccount::class, 'userSession'])->name('user.account-session');
});

// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
