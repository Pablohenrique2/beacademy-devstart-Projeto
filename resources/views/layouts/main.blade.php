<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- CSS DA APLICAÇÃO -->
  <link rel="stylesheet" href="/css/style.css">
  <title>@yield('title')</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light " style="padding:30px">
      <div class="collapse navbar-collapse d-flex justify-content-around" id="navbar">
        <a href="/" class="navbar-brand">
          <img class="logo" src="/img/logo.png" alt="">
        </a>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link">Home</a>

          </li>
          <li class="nav-item">
            <a href="/produtos" class="nav-link">Produtos</a>
          </li>
          <li class="nav-item">
            <a href="/produtos/criar" class="nav-link">criar Produtos</a>
          </li>
          <li class="nav-item">
            <a href="/contato" class="nav-link">contato</a>
          </li>
        </ul>
        <div class="d-flex">
          <form action="/produtos" class="d-flex" role="search" method="GET">
            <input class="form-control me-2 w-200" type="search" name="search" placeholder="Buscar" aria-label="Search">
            <button class="botao" type="submit"><img src="/img/search.png" alt=""></button>

          </form>


          <div>
            <li class="nav-item dropdown">
              <a class="nav-link " href="#" id="navbarDropdownMenuLink">
                <div class=" d-flex cart-nave">
                  <a href=""><img src="/img/bag-icon.webp" alt=""></a>
                  <div>
                    <a href="" class="text">
                      <h5>Minhas compras</h5>
                      <span>R$ 00,00</span>
                      <span>(Subtotal)</span>
                    </a>
                  </div>

              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/login">entrar</a>
                <a class="dropdown-item" href="/cadastro" target="_blank">cadastrar</a>

              </div>
            </li>
          </div>


          @auth
          <form action="/logout" method="post">
            @csrf
            <ul>
              <li><a href="/logout" class="nav-link" onclick="event.preventDefault();
                   this.closest('form').submit();"> Sair</a></li>
            </ul>
          </form>
          @endauth

          @guest
          <div>
            <li class="nav-item dropdown">
              <a class="nav-link " href="#" id="navbarDropdownMenuLink">
                <div style="background-color:black; border: radius 50px; width:50px; height: 50px;"></div>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/admin">entrar</a>
                <a class="dropdown-item" href="/cadastrar">cadastrar</a>
              </div>
            </li>
          </div>


          @endguest
        </div>

      </div>
      </div>
    </nav>
  </header>
  @yield('content')

  <footer>
    <p>direitos reservados &copy; 2022</p>
  </footer>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>