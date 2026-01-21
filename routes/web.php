<?php

use App\Http\Controllers\AdminControllers\AdminAuthController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\SiteControllers\CategoryController;
use App\Http\Controllers\SiteControllers\ContactController;
use App\Http\Controllers\SiteControllers\HomeController;
use App\Http\Controllers\SiteControllers\PostController;
use App\Http\Controllers\SiteControllers\SearchController;
use App\Http\Controllers\SiteControllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.layouts.master');
});


