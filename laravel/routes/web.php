<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Benedict Rosas - Portfolio Routes (10 routes)
|--------------------------------------------------------------------------
*/

// Route 1: Home / Landing Page
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Route 2: About Page
Route::get('/about', [PortfolioController::class, 'about'])->name('about');

// Route 3: Projects Index
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');

// Route 4: Single Project Show
Route::get('/projects/{slug}', [PortfolioController::class, 'projectShow'])->name('projects.show');

// Route 5: Skills Page
Route::get('/skills', [PortfolioController::class, 'skills'])->name('skills');

// Route 6: Experience / Resume Page
Route::get('/experience', [PortfolioController::class, 'experience'])->name('experience');

// Route 7: Blog Index
Route::get('/blog', [PortfolioController::class, 'blog'])->name('blog');

// Route 8: Single Blog Post
Route::get('/blog/{slug}', [PortfolioController::class, 'blogShow'])->name('blog.show');

// Route 9: Contact Page
Route::get('/contact', [PortfolioController::class, 'contact'])->name('contact');

// Route 10: Contact Form POST
Route::post('/contact/send', [PortfolioController::class, 'contactSend'])->name('contact.send');