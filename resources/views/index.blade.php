@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center"><strong>Instituto Nacional de Bellas Artes y Literatura</strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar sesion') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-outline-secondary" href="{{ route('password.request') }}">
                                        {{ __('¿Olvido su contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!--
<h2 style="text-align:center; ">Video instructivo</h2>
<br>

<div>
  <video src="" style="max-width:100%; max-height:100%"></video>
</div>
-->
<!-- <div id="content" style=" padding: 100px 100px 200px 100px; ">
    <div style="float:left;" class="col-md-5">
      <div class="form-group">
        <h2>Misión</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
          Non assumenda nostrum illum cum. Eum, autem? Sit fugit, velit 
          quisquam molestias eos, ex sequi sunt mollitia, omnis porro voluptas 
          placeat optio.</p>

      </div>
    </div>
    <div style="float:right;" class="col-md-5">
        <div class="form-group">
          <h2>Visión</h2>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Non assumenda nostrum illum cum. Eum, autem? Sit fugit, velit 
            quisquam molestias eos, ex sequi sunt mollitia, omnis porro voluptas 
            placeat optio.</p>

        </div>
    </div>
</div> -->




 


@endsection