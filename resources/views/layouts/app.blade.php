<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo/favicon.ico">

    <title>Superangel.nl ~ {{$title}}</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link href="/assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="/assets/plugins/slick/slick-theme.css" rel="stylesheet">
    @if($title == "Inloggen")
        <link href="assets/css/inloggen.css" rel="stylesheet" type="text/css">
    @endif

    <style>
        .faceted {

        }

        .faceted li {
            padding: 2px 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" style="height: 105px !important;">
    <div class="navbar" style="color: #eee; background: #384248; margin-bottom:0px !important;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">Logo</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Mijn Account <span class="caret"></span></a>
								<span style="font-size: smaller; position: absolute; margin: -17px 0px 0px 15px;">{{Auth::user()->username}}</span>
								<ul class="dropdown-menu">	<li class="dropdown-header">Mijn Paneel</li>
									<li><a href="/mijn-bestellingen/">Mijn Bestellingen</a></li>
									<li><a href="/mijn-wenslijst/">Mijn Wenslijst</a></li>
									<li><a href="/mijn-gegevens/">Mijn Gegevens</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="/uitloggen/">Uitloggen</a></li>
								</ul>
							</li>
                    @else
							<li><a href="/registreren/">registreren</a></li>
							<li><a href="/inloggen/">inloggen</a></li>
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </div>
    <div class="container" style="height: 50px; border-color: #e7e7e7;">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @foreach ($categories as $category)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$category->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">{{$category->name}}</li>
                            @foreach($category->subcategories as $subcategory)
                                <li><a href="/shop/{{$category->name}}/{{$subcategory->name}}">{{$subcategory->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                {{--<li><a href="/shop/T-shirts/">T-shirts</a></li>--}}
                {{--<li><a href="/shop/Jeans/">Jeans</a></li>--}}
                {{--<li><a href="/shop/Broeken/">Broeken</a></li>--}}
                {{--<li><a href="/shop/Jurken/">Jurken</a></li>--}}
                {{--<li><a href="/shop/Rokken/">Rokken</a></li>--}}
                <li class="navbar-right"><a href="/winkelwagen/">0 item(s) - €0.-<img style="height: 19px;"
                                                                                      src="assets/img/logo/shopping-cart.png"></a>
                </li>
                <div class="nav navbar-nav col-lg-3 navbar-right">
                    <form action="/shop/" method="get">
                        <div class="input-group stylish-input-group">
                            <input type="text" name="s" class="form-control" placeholder="Zoeken">
							<span class="input-group-addon">
								<button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
							</span>
                        </div>
                    </form>
                </div>
            </ul>
        </div>
    </div>
</nav>

<div class="header-title" style="border-bottom: 1px solid #eee; margin-bottom: 20px;">
    <div class="container">
        <div class="row" style="width: 400px; display: inline-block;">
            <h1 class="page-title " style="text-decoration: underline;">
                {{$title}} </h1>
        </div>

        <div class="pull-right" style="margin-top: 30px; display: inline-block">
            <br>
            <ol class="breadcrumb breadcrumb-arrow pull-right">
                @if($title != 'Home')
                <li class="active"><a href="/">Home</a></li>
                @endif
                <li class="active"><a>{{$title}}</a></li>
            </ol>
        </div>
    </div>
</div>
@yield('content')
<footer>
    <div class="container" style="margin-top: 50px;">
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="column">
                <h4>Informatie</h4>
                <ul>
                    <li><a href="/over-ons/">› Over Ons</a></li>
                    <li><a href="/privacy-verklaring/">› Privacy Verklaring</a></li>
                    <li><a href="/algemene-voorwaarden/">› Algemene Voorwaarden</a></li>
                    <li><a href="/verzending/">› Verzend Methode</a></li>
                    <li><a href="/sitemap/">› Sitemap</a></li>
                    <li><a href="/faq/">› FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="column">
                <h4>Categorieën</h4>
                <ul>
                    <li><a href="/shop/T-shirts/">T-shirts</a></li>
                    <li><a href="/shop/Jeans/">Jeans</a></li>
                    <li><a href="/shop/Broeken/">Broeken</a></li>
                    <li><a href="/shop/Jurken/">Jurken</a></li>
                    <li><a href="/shop/Rokken/">Rokken</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="column">
                <h4>Klantenservice</h4>
                <ul>
                    <li><a href="/contact/">› Contact</a></li>
                    <li><a href="mailto:contact@superangel.nl">E-mail: contact@superangel.nl</a></li>
                    <li><a> Tel: +31622766214</a></li>
                    <br>
                    <li>Adresgegevens</li>
                    <li><a>Leenderweg 74b</a></li>
                    <li><a>Eindhoven 5615 AB </a></li>
                    <br>
                    <li>Bedrijfsgegevens</li>
                    <li><a>IBAN nummer: NL142134570B01</a></li>
                    <li><a>KVK nummer: 17161320</a></li>
                    <br>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="column">
                <h4>Volg Ons</h4>
                <ul class="social">
                    <li style="display: inline-block; margin: 5px"><a style="height: 50px;" target="_blank"
                                                                      href="https://www.facebook.com/Biggirlz/?fref=ts"><img
                                    style="height: 50px;" src="assets/img/logo/rss.png"></a></li>
                    <li style="display: inline-block; margin: 5px"><a style="height: 50px;" target="_blank"
                                                                      href="https://www.facebook.com/Biggirlz/?fref=ts"><img
                                    style="height: 50px;" src="assets/img/logo/googleplus.png"></a></li>
                    <li style="display: inline-block; margin: 5px"><a style="height: 50px;" target="_blank"
                                                                      href="https://www.facebook.com/Biggirlz/?fref=ts"><img
                                    style="height: 50px;" src="assets/img/logo/facebook500.png"></a></li>
                    <li style="display: inline-block; margin: 5px"><a style="height: 50px;" target="_blank"
                                                                      href="https://www.facebook.com/Biggirlz/?fref=ts"><img
                                    style="height: 50px;" src="assets/img/logo/twitter.png"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="navbar-inverse text-center copyright">
        Designed and built by <a style="color: #C0101A;" href="//www.mediaverse.nl">Mediaverse</a> / Copyright © 2016
        All right reserved
    </div>
</footer>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

{{--<script src="assets/js/bootstrap.js"></script>--}}
<script src="assets/plugins/slick/slick.js"></script>
</body>
</html>
