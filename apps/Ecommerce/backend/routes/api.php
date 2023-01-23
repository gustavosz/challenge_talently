<?php

use Core\Backoffice\Auth\Infrastructure\Controllers\AuthPostController;
use Core\Ecommerce\Users\Infrastructure\Controllers\UserCatalogsGetController;
use Illuminate\Support\Facades\Route;

Route::post('login', AuthPostController::class);

Route::get('users/{id}/catalogs', UserCatalogsGetController::class)->middleware('jwt');
