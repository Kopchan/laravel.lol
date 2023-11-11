<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$title}}</title>
</head>
<body>
  <header style="height: 200px; width: 100%; background: #2d3748">Шапка сайта</header>
  <main>
    <div>{{$slot}}</div>
    <div>{{$content}}</div>
  </main>
  <footer style="height: 200px; width: 100%; background: #1a202c">Подвал сайта</footer>
</body>
</html>
