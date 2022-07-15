<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- CSS DA APLICAÇÃO -->
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">

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
            <a href="{{route('produtos')}}" class="nav-link">Produtos</a>
          </li>

          @can('admin')
          <li class="nav-item">
            <a href="{{route('produtos.criar')}}" class="nav-link">Adicionar produtos</a>
          </li>
          @endcan

          <li class="nav-item">
            <a href="{{route('index.contact')}}" class="nav-link">contato</a>
          </li>
        </ul>
        <div class="d-flex group">
          <div>
            <form action="{{route('produtos.search')}}" class="d-flex" role="search" method="GET">
              <input class="form-control me-2 w-200" type="search" name="search" placeholder="Buscar" aria-label="Search">
              <button class="botao" type="submit"><img src="/img/search.png" alt=""></button>

            </form>
          </div>

          <div class="handbag">
            <li class="nav-item dropdown">
              <a class="nav-link " href="{{route('viewcart')}}" id="navbarDropdownMenuLink">
                <div class=" d-flex cart-nave">
                  <a href=""><img src="/img/bag-icon.webp" alt=""></a>
                  <div>
                    <a href="{{route('viewcart')}}" class="text">
                      <h5>Minhas compras</h5>
                      <span></span>
                      <span>(Subtotal)</span>
                    </a>
                  </div>

              </a>
              <div class="dropdown-menu " style="width:225px ; " aria-labelledby="navbarDropdownMenuLink">
                <div class="d-flex">
                  <div>
                    @forelse($order as $orders)

                    @foreach($orders->order_items as $order_item)
                    <div class=" d-flex" style="margin-left:20px ;">
                      <div>
                        <tr>
                          <td>
                            <div><img src="{{$order_item->product->photo}}" alt="" style="width: 50px;">{{$order_item->product->name}}</div>
                            <h5>QTD:{{$order_item->qtd}}</h5>R${{number_format($order_item->product->price, 2, ',', '.' )}}
                          </td>

                          <td></td>

                          </td>

                        </tr>
                      </div>
                      <div>

                      </div>
                    </div>

                    @endforeach
                  </div>

                  @empty
                  <h5>Não a produto no carrinho...</h5>
                  @endforelse
                </div>




              </div>
            </li>
          </div>


          @auth
          <div class="profile">
            <li class="nav-item dropdown">
              <a class="nav-link d-flex " href="#" id="navbarDropdownMenuLink">
                <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="cea-cea-store-theme-0-x-header-login__icon">
                  <path d="M42 42C42 39.8988 41.5344 37.8183 40.6298 35.8771C39.7252 33.9359 38.3994 32.172 36.7279 30.6863C35.0565 29.2006 33.0722 28.022 30.8883 27.2179C28.7044 26.4139 26.3638 26 24 26C21.6362 26 19.2956 26.4139 17.1117 27.2179C14.9278 28.022 12.9435 29.2006 11.2721 30.6863C9.60062 32.172 8.27475 33.9359 7.37017 35.8771C6.46558 37.8183 6 39.8988 6 42" stroke="#212B36" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                  <circle cx="24" cy="16" r="10" stroke="#212B36" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></circle>
                </svg>
                <div>

                  <p>bem vindo {{Auth::user()->name}}</p>
                </div>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="margin: 0px; padding:0px;">
                <form action="/logout" method="post">
                  @csrf
                  <div class=" list-group">
                    <a href="{{route('shoppingCart')}}" class="list-group-item list-group-item-action ">Minhas compras</a>
                    <a href="/logout" class="list-group-item list-group-item-action" onclick="event.preventDefault();
                   this.closest('form').submit();"> Sair</a>
                  </div>

                  </ul>
                </form>
              </div>
            </li>
          </div>

          @endauth

          @guest
          <div class="profile">
            <li class="nav-item dropdown">
              <a class="nav-link d-flex " href="#" id="navbarDropdownMenuLink">
                <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="cea-cea-store-theme-0-x-header-login__icon">
                  <path d="M42 42C42 39.8988 41.5344 37.8183 40.6298 35.8771C39.7252 33.9359 38.3994 32.172 36.7279 30.6863C35.0565 29.2006 33.0722 28.022 30.8883 27.2179C28.7044 26.4139 26.3638 26 24 26C21.6362 26 19.2956 26.4139 17.1117 27.2179C14.9278 28.022 12.9435 29.2006 11.2721 30.6863C9.60062 32.172 8.27475 33.9359 7.37017 35.8771C6.46558 37.8183 6 39.8988 6 42" stroke="#212B36" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                  <circle cx="24" cy="16" r="10" stroke="#212B36" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></circle>
                </svg>
                <div>
                  <p style="font-size:15px ; margin-left:4px;">Entrar</p>
                </div>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="top:5px">
                <a class="dropdown-item" href="/login">entrar</a>
                <a class="dropdown-item" href="/register">cadastrar</a>
              </div>
            </li>
          </div>


          @endguest
        </div>

      </div>


    </nav>
  </header>

  @yield('content')



  <footer class="text-center" style="height: 50px;">

    <p> Copyright &copy 2022 Todos os direitos reservados</p>
  </footer>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/js/script.js">
  </script>
  @yield('scripts')
</body>

</html>