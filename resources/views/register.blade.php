@extends('layouts.app')

@section('content')
    <div class="container">

        <form class="col-lg-6" id="form" data-toggle="validator" role="form" novalidate="true"
              action="/registreren" method="post">
            <div class="form-group">
                <label for="inputEmail" class="control-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email"
                       data-error="E-mailadres is ongeldig" required="">
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="control-label">Wachtwoord</label>
                <div class="form-inline row">
                    <div class="form-group col-lg-6 ">
                        <input type="password" data-toggle="validator" name="pass" data-minlength="6"
                               class="form-control" id="inputPassword" placeholder="Password" required="">
                        <span class="help-block">Minstens 6 tekens</span>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="password" class="form-control" name="retyped_password" id="inputPasswordConfirm"
                               data-match="#inputPassword" data-error="Wachtwoord komt niet overeen."
                               placeholder="Herhaal" required="">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="terms" data-error="Ga akkoord met de algemene voorwaarden."
                               required="">
                        Gaat u akkoord met de <a href="/algemene-voorwaarden/">algemene Voorwaarden</a> van
                        Superangel.nl </label>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary disabled">Submit</button>
            </div>

        </form>

    </div>
@endsection