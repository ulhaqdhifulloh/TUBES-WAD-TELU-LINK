<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AcademicInfoController;
use App\Http\Controllers\LostFoundController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route for admin dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Event Routes - Admin only for CUD
    Route::get('/events', [EventController::class, 'index'])->name('events.index');

    // Admin-only Event CUD operations (must be BEFORE show route!)
    Route::middleware('admin')->group(function () {
        Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/events', [EventController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    });

    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

    // Academic Info Routes - Admin only for CUD
    Route::get('/academic-info', [AcademicInfoController::class, 'index'])->name('academic-info.index');

    // Admin-only Academic Info CUD operations (must be BEFORE show route!)
    Route::middleware('admin')->group(function () {
        Route::get('/academic-info/create', [AcademicInfoController::class, 'create'])->name('academic-info.create');
        Route::post('/academic-info', [AcademicInfoController::class, 'store'])->name('academic-info.store');
        Route::get('/academic-info/{academicInfo}/edit', [AcademicInfoController::class, 'edit'])->name('academic-info.edit');
        Route::put('/academic-info/{academicInfo}', [AcademicInfoController::class, 'update'])->name('academic-info.update');
        Route::delete('/academic-info/{academicInfo}', [AcademicInfoController::class, 'destroy'])->name('academic-info.destroy');
    });

    Route::get('/academic-info/{academicInfo}', [AcademicInfoController::class, 'show'])->name('academic-info.show');

    // News Routes - Admin only for CUD
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');

    // Admin-only News CUD operations (must be BEFORE show route!)
    Route::middleware('admin')->group(function () {
        Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    });

    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

    // Lost & Found Routes - All auth users can CRUD their own
    Route::resource('lost-found', LostFoundController::class);

    // Organizations Routes
    Route::resource('organizations', OrganizationController::class)->only(['index', 'show']);

    // Forum Routes - All auth users can CRUD their own
    Route::resource('forum', ForumController::class);

    // Forum Answer Routes - nested under forum questions
    Route::post('/forum/{forum}/answers', [ForumController::class, 'storeAnswer'])->name('forum.answers.store');
    Route::put('/forum/{forum}/answers/{answer}', [ForumController::class, 'updateAnswer'])->name('forum.answers.update');
    Route::delete('/forum/{forum}/answers/{answer}', [ForumController::class, 'destroyAnswer'])->name('forum.answers.destroy');
});

require __DIR__ . '/auth.php';
