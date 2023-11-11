<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Создание маршрута /test с выводом сообщения "Тестовая страница"
Route::get('/test', function () {
    return "Тестовая страница";
});
// Создание маршрута /test/1 с выводом сообщения "Тестовая страница 1"
Route::get('/test/1', function () {
    return "Тестовая страница 1";
});
// Создание очередного маршрута /test/2 с выводом очередного сообщения
Route::get('/test/2', function () {
    return "Очередная страница";
});

// Параметры в машрутах
Route::get('/post/{id}', function ($id) {
    return "Пост ".$id;
});
Route::get('/user/{name}', function ($name) {
    return "Привет ".$name;
});

// Несколько параметров в маршруте
Route::get('/post/{cardId}/{postId}', function ($cardId, $postId) {
    return "Карточка $cardId, Пост $postId";
});
Route::get('/user/{surname}/{name}', function ($surname, $name) {
    return "Пчёл: $surname $name";
});

// Необязательные параметры
Route::get('/posts/page/{page?}', function ($page = 1) {
    return "Номер страницы: $page";
});
Route::get('/city/{city?}', function ($city = 'Томск') {
    return "Город $city:";
});

// Ограничение параметров
Route::get('/users/{age}', function ($age) {
    return "Возраст $age";
})->where('age', '[0-9]+');

Route::get('/govsign/{sign}/{id}', function ($sign, $id) {
    return "Номер: $sign, Регион: $id";
})
    ->where('sign', '[a-z]+');
// whereAlpha - только латинские буквы
// whereNumber - только числа
Route::get('/govsign2/{sign}/{id}', function ($sign, $id) {
    return "Номер: $sign, Регион: $id";
})->whereAlpha('sign');

// Разрешение конфликтов: сначала частный, потом общий случай/*
Route::get('/test2/all', function () {
    return "Все тесты";
});
Route::get('/test2/{n}', function ($n) {
   return $n;
});

// Группировка маршрута
Route::prefix('/test3')->group(function () {
    Route::get('/all', function () {
        return "Все тесты";
    });
    Route::get('/{n}', function ($n) {
        return $n;
    });
});

use App\Http\Controllers\PostController;
// Маршрут, использующий контроллер
//Route::get('/маршрут', ['полное имя контроллера', 'имя действия']);
Route::get('/hi', ['App\Http\Controllers\PostController', 'hello']);

// Передача параметра маршрута в контроллер
Route::get('/hi/{name}', [PostController::class, 'hello2']);

// Применение параметров маршрутов
Route::get('/hello/{id}',       [PostController::class, 'hello3'])->where('id', '[0-3]');
Route::get('/usercheck/{id}',   [PostController::class, 'city'  ])->where('id', '[1-5]');
Route::get('/hello5/{id}',      [PostController::class, 'hello5'])->where('id', '[1-5]');

// Маршрут, использующий представление
Route::get('hello6', [PostController::class, 'hello6']);
Route::get('hello7/{name}', [PostController::class, 'hello7']);
