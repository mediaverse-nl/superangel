@extends('layouts.app')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-login">
                    <br>
                    <form action="/inloggen" method="POST" style="margin:0px auto;display:table;">
                        @if ($errors->first())
                            <span class="help-block">
                                        <strong>{{ $errors->first() }}</strong>
                                    </span>
                        @endif
                        <div class="form-group">
                            <p>Gebruikersnaam / E-mail</p>
                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="" value="{{ old('username') }}">
                            <br>
                            <p>Wachtwoord</p>
                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="action_login" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                        </div>
                        <div class="text-center">
                            <input type="checkbox" name="remember_me"> <label for="remember">Gegevens onthouden</label>
                            <br>
                            <br>
                        </div>
                        <div class="option-panel">

                            <div class="col-lg-6 register">
                                <p>Nog geen account?</p>
                                <a class="button" href="/registreren/">registreren</a>
                            </div>
                            <div class="col-lg-6">
                                <p>Wachtwoord vergeten?</p>
                                <a class="button" href="/herstel-account/">herstel account</a>
                            </div>
                        </div>
                        {!! csrf_field() !!}
                    </form>

                </div>


            </div>
        </div>

    </div>
@endsection