@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <!-- begin of side menu -->
                @include('layouts/account-menu')
                <!-- end of side menu -->
            </div>

            <div class="col-lg-9">

                <table class="userInfo" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <h4>mijn accountgegevens</h4>
                        </td>
                    </tr>
                    <tr>
                        <th><span>E-mailadres:</span></th>
                        <td>{{$myAccount->email}}</td>
                    </tr>
                    <tr>
                        <th><span>Wachtwoord:</span></th>
                        <td><span>********</span></td>
                    </tr>
                    <tr>
                        <td><a class="btn btn-primary" href="/mijn-gegevens/accountgegevens/">wijzigen</a></td>
                    </tr>
                    </tbody>
                </table>


                <table class="formLayout userInfo" cellspacing="0" cellpadding="0" summary="Persoonlijke gegevens" style="margin-top:12px;">
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <h4>Mijn persoonsgegevens</h4>
                        </td>
                    </tr>
                    <tr>
                        <th><span>Klantnummer:</span></th>
                        <td>{{$myAccount->id}}</td>
                    </tr>
                    <tr>
                        <th><span>Gebruikersnaam:</span></th>
                        <td>{{$myAccount->username}}</td>
                    </tr>
                    <tr>
                        <th><span>Voornaam:</span></th>
                        <td>{{$myAccount->details->firstname}}</td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th><span>Voorletters:</span></th>--}}
                        {{--<td></td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th><span>Achternaam:</span></th>
                        <td>{{$myAccount->details->lastname}}</td>
                    </tr>
                    <tr>
                        <th><span>Geslacht:</span></th>
                        <td>{{$myAccount->details->sex}}</td>
                    </tr>

                    <tr>
                        <th><span>Geboortedatum:</span></th>
                        <td>{{ date('d-m-Y', strtotime($myAccount->details->birthday)) }}</td>
                    </tr>
                    <tr>
                        <th><span>Adres:</span></th>
                        <td>{{$myAccount->details->address}}</td>
                    </tr>
                    <tr>
                        <th><span>Postcode:</span></th>
                        <td>{{$myAccount->details->zipcode}}</td>
                    </tr>
                    <tr>
                        <th><span>Woonplaats:</span></th>
                        <td>{{$myAccount->details->city}}</td>
                    </tr>
                    <tr>
                        <th><span>Land:</span></th>
                        <td>{{$myAccount->details->country}}</td>
                    </tr>
                    <tr>
                        <th><span>Tel. mobiel:</span></th>
                        <td>{{$myAccount->details->mobile}}</td>
                    </tr>
                    <tr>
                        <th><span>Tel. thuis:</span></th>
                        <td>{{$myAccount->details->cellphone}}</td>
                    </tr>
                    <tr>
                        <td><a class="btn btn-primary" href="/mijn-gegevens/persoonsgegevens/">wijzigen</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- /container -->
@endsection;