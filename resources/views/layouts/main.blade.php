
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="/style/style.css" rel="stylesheet">
    <title>@yield('title')</title>
  </head>
  <body>/

  <section class="background">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://te-st.ru/wp-content/uploads/%D0%A1%D0%BD%D0%B8%D0%BC%D0%BE%D0%BA-%D1%8D%D0%BA%D1%80%D0%B0%D0%BD%D0%B0-2012-08-30-%D0%B2-13.07.34.png" alt="" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ Route('tasks.index') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('tasks.index') }}">Мои задачи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('tasks.create') }}">Создать задачу</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('user_reg') }}">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('login') }}">Войти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
       @yield('content')
    </div>



    <div class="footer">
        <div class="footer-words">
      <ul>
        <li>Менеджер задач</li>
        <li>2021(C)</li>
      </ul>
        </div>
    </div>



  </section>
  @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    @show
  </body>
</html>
