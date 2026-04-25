<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::post('/inventory/adjust/{id}', [InventoryController::class, 'adjustStock']);