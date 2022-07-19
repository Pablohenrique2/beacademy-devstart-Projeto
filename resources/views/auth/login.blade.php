<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Login</title>
</head>


@if (session('status'))
<div class="alert alert-danger" style="background-color:black ;">
  {{ session('status') }}
</div>
@endif

<body style="background-image:url('/img/capa-login.svg'); margin-left:100px; background-repeat: no-repeat;">

  <div class="container w-50 " style="margin-top: 120px;">
    <div class="text-center mb-3">
      <a href="/"><img src="/img/logo.png" alt=""></a>
    </div>
    <div class="justify-content-center" style="background-color: #e53637; border-radius:5px;">

      <form method="POST" action="{{ route('login') }}" class="container ">

        <x-jet-validation-errors class="text-white " style="margin-bottom: -20px;" />

        @csrf

        <div class="form-outline mb-4 ">
          <x-jet-label for=" email" class="form-label text-white mt-4" value="{{ __('Email') }}" />
          <x-jet-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
        </div>


        <div class="form-outline mb-4">
          <x-jet-label for="password" class="form-label text-white" value="{{ __('Password') }}" />
          <x-jet-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
        </div>
        <div class="col mb-5">

          <a href="{{ route('password.request') }}" class="text-black ">Esqueceu a Senha?</a>
          <div>
            <a href="/register" class="text-black ">Ainda nao possui conta? cadastre Aqui!!</a>
          </div>
        </div>


        <div class="text-center">
          <button type="submit" class="btn btn-dark btn-block mb-4 w-50 ">Entrar</button>
        </div>
      </form>
    </div>

  </div>

</body>

</html>