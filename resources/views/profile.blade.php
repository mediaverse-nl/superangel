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
                <h4>mijn accountgegevens</h4>
                <div class="form-group">
                    <label for="email">E-mailadres:</label>
                    <input type="text" value="{{$myAccount->email}}" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" class="form-control" id="password">
                </div>

                <h4>Mijn persoonsgegevens</h4>
                <div class="form-group">
                    <label>Klantnummer:</label>
                    <input type="text" class="form-control" value="{{$myAccount->id}}">
                </div>
                <div class="form-group">
                    <label>Gebruikersnaam:</label>
                    <input type="text" class="form-control" value="{{$myAccount->username}}">
                </div>
                <div class="form-group">
                    <label>Voornaam:</label>
                    <input type="text" class="form-control" value="{{$myAccount->details->firstname}}">
                </div>
                <div class="form-group">
                    <label>Achternaam:</label>
                    <input type="text" class="form-control" value="{{$myAccount->details->lastname}}">
                </div>
                <div class="form-group">
                    <label>Geslacht:</label> <br/>
                    <label class="radio-inline"><input {{($myAccount->details->sex == 'man' ? 'checked' : '')}} type="radio" name="sex" value="man">Man</label>
                    <label class="radio-inline"><input {{($myAccount->details->sex == 'vrouw' ? 'checked' : '')}} type="radio" name="sex" value="vrouw">Vrouw</label>
                </div>
                <div class="form-group">
                    <label>Adres:</label>
                    <input type="text" class="form-control" value="{{$myAccount->details->address}}">
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
            </div>
        </div>

    </div> <!-- /container -->
@endsection;