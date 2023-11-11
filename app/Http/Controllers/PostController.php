<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function hello() {
      return "Привет, лучшая группа!";
    }
    public function hello2($name) {
      return "Привет, $name";
    }
    public function hello3($id) {
      $hi = [
        'Доброй ночи',
        'Доброе утро',
        'Добрый день',
        'Добрый вечер',
      ];
      return "$hi[$id]!";
    }
    public function city($id) {
      $users = [
        '1' => 'Томск',
        '2' => 'Питер',
        '3' => 'Москва',
        '4' => 'Омск',
        '5' => 'Уфа',
      ];
      return "$users[$id]";
    }
    public function hello5($name) {
      $users = [
        'Саша' => 'Томск',
        'Петя' => 'Питер',
        'Коля' => 'Москва',
        'Толя' => 'Омск',
        'Лиза' => 'Уфа',
      ];
      if ($users[$name]) return $users[$name];
      return "Нет такого пользователя!";
    }
    public function hello6() {
      return view('post.hello');
    }
    public function hello7($name) {
      return view('post.hello7', ['name' => $name, 'title' => 'Заголовок22']);
    }
}
