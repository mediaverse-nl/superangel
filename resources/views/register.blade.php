@extends('layouts.app')

@section('content')
    <div class="container">

        <form class="col-lg-6" id="form" data-toggle="validator" role="form" novalidate="true" action="/registreren"
              method="post">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="inputName" class="control-label">Gebruikersnaam</label>
                <input value="{{old("username")}}" type="text" class="form-control" placeholder="Gebruikersnaam"
                       name="username" id="inputName" data-error="Vul dit in." required="">
                @if ($errors->has('username'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="inputEmail" class="control-label">E-mail</label>
                <input value="{{old("email")}}" type="email" class="form-control" name="email" id="inputEmail"
                       placeholder="Email" data-error="E-mailadres is ongeldig" required="">
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="inputPassword" class="control-label">Wachtwoord</label>
                <div class="form-inline row">
                    <div class="form-group col-lg-6 ">
                        <input type="password" data-toggle="validator" name="password"
                               class="form-control" id="inputPassword" placeholder="Password" required="">
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="password" class="form-control" name="password_confirmation"
                               id="inputPasswordConfirm" data-match="#inputPassword"
                               data-error="Wachtwoord komt niet overeen." placeholder="Herhaal" required="">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input name="avg" type="checkbox" id="terms"
                               data-error="Ga akkoord met de algemene voorwaarden." required="">
                        Gaat u akkoord met de <a href="/algemene-voorwaarden/">algemene Voorwaarden</a> van
                        Superangel.nl </label>
                    @if ($errors->has('avg'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('avg') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    </div>
@endsection