<?php

use Core\Backoffice\Auth\Infrastructure\Controllers\AuthPostController;
use Illuminate\Support\Facades\Route;

Route::post('login', AuthPostController::class);
