<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Cadastrar</title>
</head>


@if (session('status'))
<div class="alert alert-danger" style="background-color:black ;">
  {{ session('status') }}
</div>
@endif

<body style="background-image:url('/img/capa-cadastro.svg'); margin-left:100px; background-repeat: no-repeat; background-size: 1360px;">

  <div class="container w-50 " style="margin-top: 20px;">
    <div class="text-center mb-3">
      <a href="/"><img src="/img/logo.png" alt=""></a>
    </div>
    <div class="justify-content-center" style="background-color: #e53637; border-radius:5px;">

      <form method="POST" action="{{ route('register') }}" class="container  mb-3">
        <x-jet-validation-errors class="text-white" />
        @csrf

        <div class="form-outline ">
          <x-jet-label for="name" class="form-label mt-4 text-white" value="{{ __('Name') }}" />
          <x-jet-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />

        </div>
        <div class="form-outline  ">
          <x-jet-label for=" email" class="form-label mt-4 text-white" value="{{ __('Email') }}" />
          <x-jet-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
        </div>
        <div class="form-outline ">
          <x-jet-label for="password" class="form-label mt-4 text-white" value="{{ __('Password') }}" />
          <x-jet-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="form-outline ">
          <x-jet-label for="password_confirmation" class="form-label mt-4 text-white" value="{{ __('Confirm Password') }}" />
          <x-jet-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-4">
          <x-jet-label for="terms">
            <div class="flex items-center">
              <x-jet-checkbox name="terms" id="terms" />

              <div class="ml-2">
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                ]) !!}
              </div>
            </div>
          </x-jet-label>
        </div>
        @endif


        <div class="col mb-5 mt-2">
          <a class="underline text-sm text-gray-600 hover:text-gray-900 text-dark" href="{{ route('login') }}">
            {{ __('Already registered?') }}
          </a>
        </div>


        <div class="text-center">
          <button type="submit" class="btn btn-dark btn-block mb-4 w-50 ">Registrar</button>
        </div>
      </form>
    </div>

  </div>

</body>

</html>