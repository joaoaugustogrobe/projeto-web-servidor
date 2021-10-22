<?php

Route::set('', function() {
    DashboardController::CreateView('Dashboard', false); 
});

Route::set('login', function() {
    LoginController::CreateView('Login', false); 
});


Route::set('admin', function() {
    AdminController::CreateView('Admin', true); 
});

Route::set('dish', function() {
    DishController::CreateView('dish', true); 
});

Route::set('meal', function() {
    MealController::CreateView('meal', true); 
});