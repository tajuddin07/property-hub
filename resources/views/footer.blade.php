<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>

    <style>
        .lower-img{
            background-image: url({{ asset('images/footer-bg.jpg') }});
        }
    </style>
</head>
<body>

    <!-- Footer section -->
    <footer class="footer-section set-bg lower-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 footer-widget">
                    <img src="img/logo.png" alt="">
                    <p>Lorem ipsum dolo sit azmet, consecter dipise consult  elit. Maecenas mamus antesme non anean a dolor sample tempor nuncest erat.</p>
                    <div class="social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 footer-widget">
                    <div class="contact-widget">
                        <h5 class="fw-title">CONTACT US</h5>
                        <p><i class="fa fa-map-marker"></i>3711-2880 Nulla St, Mankato, Mississippi </p>
                        <p><i class="fa fa-phone"></i>(+60) 366 121432</p>
                        <p><i class="fa fa-envelope"></i>propertyhub@gmail.com</p>
                        <p><i class="fa fa-clock-o"></i>Mon - Sat, 08 AM - 06 PM</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-nav">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/listhouse') }}">Featured Listing</a></li>
                    </ul>
                </div>
                <div class="copyright">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer section end -->
</body>
</html>