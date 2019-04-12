<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>InteractNX | Webinar App</title>

    <link rel="stylesheet" href="{{ elixir('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="https://www.goconsult.in/css/goconsult.css">
</head>
<body>
    <header class="container-fluid" style="min-height:auto; background:#333">
        <div class="row">
            <div class="col-xs-12">
                <nav class=" navbar navbar-bootsnipp animate " role="navigation">
                    <div class=" container ">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class=" navbar-header ">
                            <button type="button" class=" navbar-toggle " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class=" sr-only ">Toggle navigation</span>
                                <span class=" icon-bar "></span>
                                <span class=" icon-bar "></span>
                                <span class=" icon-bar "></span>
                            </button>
                            <div class=" animbrand ">
                                <a class=" navbar-brand  animate " href="https://www.goconsult.in">
                                <img src="https://www.goconsult.in/img/gc-logo.png" > </a>
                            </div>
                        </div>
            
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class=" collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                            <ul class=" nav navbar-nav navbar-right mt20">
                                <li><a href="https://www.goconsult.in" class="animate">Home</a></li>
                                <li><a href="https://www.goconsult.in/gcschool" class="animate">Gc School</a></li>
                                <li><a href="https://www.goconsult.in/service" class="animate">Services</a></li>
                                <li><a href="https://www.goconsult.in/price" class="animate">Pricing</a></li>
                                <li class="buton"><a class="animate" href="{{ URL::to('login') }}">Login</a></li>     
                            </ul>
                        </div>
                    </div>
                    
                </nav>
            </div>
        </div>
    </header>

    <div class="container mrg-2em" id="app">
        <router-view></router-view>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="copyright col-sm-12 col-md-3">
                    <p>© 2017 <a href="" title="">Eyas Ventures Pvt Ltd.</a></p>
                </div>
                <div class="copyright col-sm-12 col-md-9">
                    <ul class="footer-nav">
                        <li><a href="https://www.goconsult.in/about-us" title="">About us</a></li>
                        <li><a href="https://www.goconsult.in/price" class="animate">Pricing</a></li>
                        <li><a href="https://www.goconsult.in/term-condition" title="">Terms &amp; Conditions</a></li>
                        <li><a href="https://www.goconsult.in/privacy-policy" title="">Privacy Policy</a></li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>
    <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
