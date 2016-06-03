@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <!-- begin of side menu -->
                @include('layouts/account-menu')
                        <!-- end of side menu -->
            </div>

            <div class="col-lg-4 col-md-4">
                <h4>Mijn accountgegevens</h4>
                <form action="/mijn-gegevens/updateAccount" method="post">
                    <div class="form-group">
                        <label>Klantnummer:</label>
                        <input disabled type="text" class="form-control" value="#{{$myAccount->customer_id}}">
                    </div>
                    <div class="form-group">
                        <label>Gebruikersnaam:</label>
                        <input disabled type="text" class="form-control" value="{{$myAccount->username}}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mailadres:</label>
                        <input disabled type="text" value="{{$myAccount->email}}" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label>Voornaam:</label>
                        <input name="firstname" type="text" class="form-control" value="{{$myAccount->firstname}}">
                    </div>
                    <div class="form-group">
                        <label>Achternaam:</label>
                        <input name="lastname" type="text" class="form-control" value="{{$myAccount->lastname}}">
                    </div>
                    <div class="form-group">
                        <label>Geslacht:</label> <br/>
                        <label class="radio-inline"><input {{($myAccount->sex == 'man' ? 'checked' : '')}} type="radio" name="sex" value="man">Man</label>
                        <label class="radio-inline"><input {{($myAccount->sex == 'vrouw' ? 'checked' : '')}} type="radio" name="sex" value="vrouw">Vrouw</label>
                    </div>
                    <div class="form-group">
                        @if ($errors->has('old_password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                        @endif
                        <label for="password">Oud wachtwoord:</label>
                        <input name="old_password" type="password" class="form-control" id="password" placeholder="niet invullen als u uw wachtwoord wilt behouden">
                    </div>
                    <div class="row">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <div class="form-group col-md-6">
                            <label for="password">Nieuw wachtwoord:</label>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Herhaal wachtwoord:</label>
                            <input name="password_confirmation" type="password" class="form-control" id="password">
                        </div>
                    </div>
                    {!! csrf_field() !!}
                    <input value="Wijzig" type="submit" class="btn btn-primary col-lg-offset-9 col-lg-3">
                </form>

                <h4>Mijn adresgegevens</h4>
                <form action="/mijn-gegevens/updateAddress" method="post">
                    <div class="form-group">
                        <label>Straat:</label>
                        <input type="text" class="form-control" value="{{$myAccount->details->street}}">
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Nummer:</label>
                            <input type="number" name="number" placeholder="123" class="form-control" value="{{($myAccount->details->number  > 0 ? $myAccount->details->number : '')}}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Toevoeging:</label>
                            <input type="text" name="number_addon" placeholder="A" class="form-control" value="{{$myAccount->details->number_addon}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Postcode:</label>
                        <input type="text" class="form-control" value="{{$myAccount->details->zipcode}}">
                    </div>
                    <div class="form-group">
                        <label>Woonplaats:</label>
                        <input type="text" class="form-control" value="{{$myAccount->details->city}}">
                    </div>
                    <div class="form-group">
                        <label>Land:</label>
                        <input type="text" class="form-control" value="{{$myAccount->details->country}}">
                    </div>
                    <div class="form-group">
                        <label>Tel. mobiel:</label>
                        <input type="text" class="form-control" value="{{$myAccount->details->mobile}}">
                    </div>
                    <div class="form-group">
                        <label>Tel. thuis:</label>
                        <input type="text" class="form-control" value="{{$myAccount->details->cellphone}}">
                    </div>
                    {!! csrf_field() !!}
                    <input value="Wijzig" type="submit" class="btn btn-primary col-lg-offset-9 col-lg-3">
                </form>
            </div>
        </div>

    </div> <!-- /container -->
@endsection;