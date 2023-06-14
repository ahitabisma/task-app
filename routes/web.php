<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/tasks');

Route::prefix('tasks')->group(function () {
    // Create task
    Route::get('/', [TasksController::class, 'index'])->name('tasks.index');
    Route::post('/', [TasksController::class, 'store'])->name('tasks.store');

    // Edit task
    Route::get('{tasks:id}', [TasksController::class, 'edit'])->name('tasks.edit');
    Route::put('{tasks:id}', [TasksController::class, 'update'])->name('tasks.update');

    // Change Status
    Route::put('{tasks:id}/status', [TasksController::class, 'updateStatus'])->name('tasks.updateStatus');

    // Delete task
    Route::delete('{tasks:id}', [TasksController::class, 'destroy'])->name('tasks.destroy');
});

// Completed & Incomplete tasks
Route::get('completed', [TasksController::class, 'completed'])->name('tasks.completed');
Route::get('incomplete', [TasksController::class, 'incomplete'])->name('tasks.incomplete');
