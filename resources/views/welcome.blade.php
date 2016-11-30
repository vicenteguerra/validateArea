<!DOCTYPE html>
<html lang="en">

<head>
   @include("tagmanagerhead")
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple web service for verify if a location coordinates are inside of polygons drawn in a Map.">
    <meta name="author" content="Vicente Guerra">
    <link rel="icon"
      type="image/png"
      href="<?php echo asset('/img/icon.png') ?>" />

    <title>Valid Place</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">

    <link rel="stylesheet" href="<?php echo asset('/vendor/device-mockups/device-mockups.min.css') ?>">

    <!-- Theme CSS -->
    <link href="<?php echo asset('/css/new-age.css') ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img class="icon" src="<?php echo asset('/img/icon.png') ?>" alt="">Valid Place</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#features">Features</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#cta">Info</a>
                    </li>
                    @if (Auth::guest())
                        <li><a class="page-scroll" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="page-scroll" href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a class="page-scroll"  href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Simple web service for verify if a location coordinates are inside of polygons drawn in a Map.</h1>
                            <h2> Very useful for allow and restrict services in Mobile Apps.</h2>
                            <br>
                            @if (Auth::guest())
                                <a href="{{ url('/register') }}" class="btn btn-outline btn-xl page-scroll">Start Now for Free!</a>
                            @else
                                <a href="{{ url('/home') }}" class="btn btn-outline btn-xl page-scroll">Draw Polygons!</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="img/demo-screen-1.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Developers and Startups</h2>
                        <p class="text-muted">Tool for restric services by location</p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="img/demo-screen-1.jpg" class="img-responsive" alt=""> </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-screen-desktop text-primary"></i>
                                    <h3>Draw in desktop admin</h3>
                                    <p class="text-muted">Draw your valid areas, save and name your polygons</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-screen-smartphone text-primary"></i>
                                    <h3>Easy Mobile Implementation</h3>
                                    <p class="text-muted">Simple Http Request</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-location-pin text-primary"></i>
                                    <h3>Valid location</h3>
                                    <p class="text-muted">Verify if coordinates are inside of your valid area</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-map text-primary"></i>
                                    <h3>Show valid areas</h3>
                                    <p class="text-muted">Draw your valid zones in customer maps</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-chart text-primary"></i>
                                    <h3>Analytics</h3>
                                    <p class="text-muted">Discover where are your customers</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-present text-primary"></i>
                                    <h3>Use for free</h3>
                                    <p class="text-muted">Tell us how "Valid Place" helps your business</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="download" class="download bg-primary-transparency text-center">

      <div class="download-text">
          <h2>Add and extra value to your Apps</h2></h3>Test your business in a delimited area</h3><br><br>
          @if (Auth::guest())
              <a href="{{ url('/register') }}" class="btn btn-outline btn-xl page-scroll">Let's Get Started!</a>
          @else
              <a href="{{ url('/home') }}" class="btn btn-outline btn-xl page-scroll">Let's Get Started!</a>
          @endif

      </div>
      <div class="video-container">
        <iframe class="background-video"
        src="//player.vimeo.com/video/156188945?title=0&amp;byline=0&amp;portrait=0&amp;color=3a6774&amp;autoplay=1&amp;loop=1"
        frameborder="0" height="100%" width="100%" webkitallowfullscreen
        mozallowfullscreen allowfullscreen>
        </iframe>
      </div>
    </section>

    <section id="cta" class="cta">
        <div class="cta-content">
            <div class="container">
                <div class="col-md-4">
                    <p>Validate Location<br>
                    Just a simple GET or POST Request</p>
                    <code>
                      http://valid.place/api/v1/user/{user_id}?latitude={latitude}&longitude={longitude}
                    </code>
                    <br><br>
                    <p>Draw valid area in your App</p>
                    <code>
                      http://valid.place/api/v1/user/{user_id}/points
                    </code>
                </div>
                <div class="col-md-8">
                    <img src="img/Mac.png" class="img-responsive" alt=""> </div>
                </div>

            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p class="emoji">💚 🇲🇽 🍻 </p>
            <ul class="list-inline">
                <li>
                    <a href="https://twitter.com/IngHucruz"><i class="icon-social-twitter"></i> IngHucruz</a>
                </li>
                <li>
                    <a href="https://twitter.com/ok_atomic"><i class="icon-social-twitter"></i> ok_atomic</a>
                </li>
                <li>
                    <a href="https://twitter.com/elmontoya7"><i class="icon-social-twitter"></i> elmontoya7</a>
                </li>
                <li><a href="https://github.com/vicenteguerra/validateArea"><i class="icon-social-github"></i> Github</a></li>
            </ul>
            <div class="donation-botton">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="4VXPKPF7SMA76">
              <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
              <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>

            <a href="https://vimeo.com/156188945">Maps Video </a><br>
            <a href="http://yamblet.com">2016 Yamblet.com</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/new-age.min.js"></script>

</body>

</html>
