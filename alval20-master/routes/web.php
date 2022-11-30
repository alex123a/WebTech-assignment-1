<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CoursesController;

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

// Route::get('/', function() {
//    return "Welcome to Assignment 1 of Web Technologies E2021<br>Edit this page to get started 😄";
// });

Route::get("/", [MainController::class, "index"]) -> name("main.index");

//DEPARTMENT ROUTES
Route::get("/departments", [DepartmentController::class, "index"]) -> name("dep.index");

Route::get("/departments/create", [DepartmentController::class, "create"]) -> name("dep.create");

Route::post("/departments", [DepartmentController::class, "store"]) -> name("dep.store");

Route::get("/departments/{department}", [DepartmentController::class, "show"]) -> name("dep.show");

Route::get("/departments/{department}/edit", [DepartmentController::class, "edit"]) -> name("dep.edit");

Route::put("/departments/{department}", [DepartmentController::class, "update"]) -> name("dep.update");

Route::delete("/departments/{department}", [DepartmentController::class, "delete"]) -> name("dep.delete");


//COURSE ROUTES
Route::get("/courses", [CoursesController::class, "index"]) -> name("course.index");

Route::get("/courses/create", [CoursesController::class, "create"]) -> name("course.create");

Route::post("/courses", [CoursesController::class, "store"]) -> name("course.store");

Route::get("/courses/{course}", [CoursesController::class, "show"]) -> name("course.show");

Route::get("/courses/{course}/edit", [CoursesController::class, "edit"]) -> name("course.edit");

Route::put("/courses/{course}", [CoursesController::class, "update"]) -> name("course.update");

Route::delete("/courses/{course}", [CoursesController::class, "delete"]) -> name("course.delete");