<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServicesController;
use App\Models\City;
Route::get('/',[FrontController::class,'Services'])->name('home.frontend');
Route::get('/blog', [PublicController::class, 'show'])->name('blogs.show');
Route::get('/services',[FrontController::class,'Services'])->name('services.show');
Route::get('/about',[FrontController::class,'about'])->name('aboutpage');



Route::get('/contact',[FrontController::class,'contact'])->name('contactpage');
Route::match(['get', 'post'], 'weather', [WeatherController::class, 'index'])->name('weather.form');
Route::get('/guj', [WeatherController::class, 'Gujranwala'])->name('weather.guj');
Route::get('/lhr', [WeatherController::class, 'Lahore'])->name('weather.lhr');
Route::get('/slk', [WeatherController::class, 'sialkot'])->name('weather.slk');
Route::get('/fsd', [WeatherController::class, 'faisalabad'])->name('weather.fsd');
Route::get('/jhlm', [WeatherController::class, 'jhelum'])->name('weather.jhlm');
Route::get('/gjrt', [WeatherController::class, 'gujrat'])->name('weather.gjrt');
Route::get('/isl', [WeatherController::class, 'islamabad'])->name('weather.isl');
Route::get('/bhwl', [WeatherController::class, 'bahawalpur'])->name('weather.bhwl');
Route::get('/ghkr', [WeatherController::class, 'ghakhar'])->name('weather.ghkr');
Auth::routes();
Route::get('/booking',[FrontController::class,'booking'])->name('bookingpage')->middleware('auth');

Route::get('/stations/{cityId}',[CityController::class,'getStations']);
Route::get('routes/{stationId}', [StationController::class, 'getRoutes']);

Route::any('/fare',[RouteController::class, 'amountfare'])->name('fiza.fare');
Route::any('/confirm/{id}',[BookingController::class,'confirmseat'])->name('confirm.seat');
Route::any('/confirm-booking/{id}',[BookingController::class,'confirmBooking'])->name('booking.confirm');
// Route::get('admin',[AdminController::class,'index'])->name('admin');
Route::get('/home', [AdminController::class, 'index1'])->name('home')->middleware('auth');
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::post('/bookings/confirm/{bookingid}', [BookingController::class, 'confirmBooking'])->name('booking.accept');
    Route::post('/bookings/rejected/{bookingid}', [BookingController::class, 'rejectedBooking'])->name('booking.rejected');
    Route::get('/bookings/update-status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::get('/bookings/accepted', [BookingController::class, 'acceptedBookings'])->name('bookings.accepted');
    Route::get('/bookings/rejected', [BookingController::class, 'rejectedBookings'])->name('bookings.rejected');
  Route::prefix('city')->group(function () {
        Route::get('/',[CityController::class,'index'])->name('city.index');
        Route::post('/store',[CityController::class,'store'])->name('city.store');
        Route::get('/create',[CityController::class,'create'])->name('city.create');
        Route::get('/edit/{id}',[CityController::class,'edit'])->name('city.edit');
        Route::post('/update/{id}',[CityController::class,'update'])->name('city.update');
        Route::get('/delete/{id}',[CityController::class,'destroy'])->name('city.destroy');
    });
    Route::prefix('bus')->group(function () {
        Route::get('/',[BusController::class,'index'])->name('bus.index');
        Route::post('/store',[BusController::class,'store'])->name('bus.store');
        Route::get('/create',[BusController::class,'create'])->name('bus.create');
        Route::get('/edit/{id}',[BusController::class,'edit'])->name('bus.edit');

        Route::post('/update/{id}',[BusController::class,'update'])->name('bus.update');
        Route::get('/delete/{id}',[BusController::class,'destroy'])->name('bus.destroy');
    });
    Route::prefix('station')->group(function () {
        Route::get('/',[StationController::class,'index'])->name('station.index');
        Route::post('/store',[StationController::class,'store'])->name('station.store');
        Route::get('/create',[StationController::class,'create'])->name('station.create');
        Route::get('/edit/{id}',[StationController::class,'edit'])->name('station.edit');
        Route::post('/update/{id}',[StationController::class,'update'])->name('station.update');
        Route::get('/delete/{id}',[StationController::class,'destroy'])->name('station.destroy');
    });
    Route::prefix('route')->group(function () {
        Route::get('/',[RouteController::class,'index'])->name('route.index');
        Route::post('/store',[RouteController::class,'store'])->name('route.store');
        Route::get('/create',[RouteController::class,'create'])->name('route.create');
        Route::get('/edit{id}',[RouteController::class,'edit'])->name('route.edit');
        Route::post('/update/{id}',[RouteController::class,'update'])->name('route.update');
        Route::get('/delete/{id}',[RouteController::class,'destroy'])->name('route.destroy');

    });
    Route::prefix('blogs')->group(function () {
        Route::get('/',[BlogController::class,'index'])->name('blogs.index');
        Route::post('/store',[BlogController::class,'store'])->name('blogs.store');
        Route::get('/create',[BlogController::class,'create'])->name('blogs.create');
        Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::post('/update/{id}',[BlogController::class,'update'])->name('blogs.update');
        Route::get('/delete/{id}',[BlogController::class,'destroy'])->name('blogs.destroy');
    });
    Route::prefix('services')->group(function () {
        Route::get('/',[ServicesController::class,'index'])->name('service.index');
        Route::post('/store',[ServicesController::class,'store'])->name('service.store');
        Route::get('/create',[ServicesController::class,'create'])->name('service.create');
        Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('service.edit');
        Route::put('/update/{id}',[ServicesController::class,'update'])->name('service.update');
        Route::get('/delete/{id}',[ServicesController::class,'destroy'])->name('service.destroy');
    });
    Route::prefix('user')->group(function () {
        Route::get('/',[UserController::class,'index'])->name('user.index');
        Route::post('/store',[UserController::class,'store'])->name('user.store');
        Route::get('/create',[UserController::class,'create'])->name('user.create');
        Route::any('/edit/{id}',[UserController::class,'edit'])->name('user.edit');
        Route::any('/update/{id}',[UserController::class,'update'])->name('user.update');
        Route::any('/delete/{id}',[UserController::class,'destroy'])->name('user.destroy');
    });

});
