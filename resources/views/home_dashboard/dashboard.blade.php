<!DOCTYPE html>
<html lang="en" class="">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap Template</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">

    <style>

        html,
        body,
        header,
        .jarallax {
            height: 550px;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .jarallax {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .jarallax {
                height: 100vh;
            }
        }

        @media (min-width: 560px) and (max-width: 650px) {
            header .jarallax h1 {
                margin-bottom: .5rem !important;
            }
            header .jarallax h5 {
                margin-bottom: .5rem !important;
            }
        }

        @media (min-width: 660px) and (max-width: 700px) {
            header .jarallax h1 {
                margin-bottom: 1.5rem !important;
            }
            header .jarallax h5 {
                margin-bottom: 1.5rem !important;
            }
        }




        footer.page-footer {
            background-color: #383838;
        }

        @media (max-width: 450px) {
            .display-3 {
                font-size: 3rem;
            }
        }
        :root {
            --info-color: #0099CC;
        }

        .btn-toggle-pass {
            border: none;
            position: absolute;
            top: 11px;
            background: transparent;
            right: 0;
        }

        .btn-toggle-pass.active {
            color: var(--info-color);
        }

    </style>

</head>

<body>

<!--Main Navigation-->
<header>
    <!-- Intro Section -->
    <div class="view jarallax h-25" data-jarallax='{"speed": 0.2}' style="background-image: url('../../img/images/c.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="mask">

                <div class="row pt-5 mt-3">
                    <div class="col-md-12 mb-3">
                        <div class="intro-info-content text-center">
                                <br><br>
                                 <div class="wow fadeInDown " data-wow-delay="0.3s">
                                     @yield('content')
                                 </div>

                    </div>

            </div>
        </div>
    </div>

</header>
<!--Main Navigation-->


<!--Main Layout-->

    <div class="container" id="about">

        <hr class="mb-5 mt-4">

        <!--Section: Products v.5-->
        <section class="section pb-3 wow fadeIn" data-wow-delay="0.3s">

            <!--Section heading-->
            <h1 class="font-weight-bold text-center h1 my-5">News And Upcoming Events</h1>
            <!--Section description-->


            <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i
                            class="fas fa-chevron-left"></i></a>
                    <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i
                            class="fas fa-chevron-right"></i></a>
                </div>
                <!--/.Controls-->

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-multi" data-slide-to="1"></li>
                    <li data-target="#carousel-example-multi" data-slide-to="2"></li>
                    <li data-target="#carousel-example-multi" data-slide-to="3"></li>
                    <li data-target="#carousel-example-multi" data-slide-to="4"></li>
                    <li data-target="#carousel-example-multi" data-slide-to="5"></li>
                </ol>
                <!--/.Indicators-->

                <div class="carousel-inner v-2" role="listbox">

                    <div class="carousel-item active">

                    </div>
                    @foreach($news as $news)
                    <div class="carousel-item">
                        <div class="col-12 col-md-4">
                            <div class="card mb-2">
                                <img class="card-img-top" src="{{$news->picture}}"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title font-weight-bold">{{$news->topic}}</h4>
                                    <p class="card-text">{{$news->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach


                </div>

            </div>

        </section>
        <!--Section: Products v.5-->

    </div>



</main>
<!--Main Layout-->

<!--Footer-->

    <!--Footer Links-->
    <!-- Contact form -->
    <div id="contact" class="container">

        <!-- Section: Contact v.2 -->
        <section class="section contact-section mt-4 mb-5">

            <!-- Section heading -->
            <h2 class="text-center text-uppercase my-5 pt-5 wow fadeIn" data-wow-delay="0.2s">Contact <strong>Us</strong>
            </h2>

            <!-- Section sescription -->
            <p class="text-center w-responsive mx-auto mb-5 pb-4 wow fadeIn" data-wow-delay="0.2s"> messages</p>

            <div class="row wow fadeIn" data-wow-delay="0.4s">

                <!-- First column -->
                <div class="col-md-8 mb-5">

                    <form method="post" action="{{url('/customize_message')}}">
                    @csrf
                        <!-- First row -->
                        <div class="row">

                            <!-- First column -->
                            <div class="col-md-6">

                                <div class="md-form mb-0">

                                    <div class="md-form mb-0">

                                        <input type="text" name="name" id="form41" class="form-control" required>

                                        <label for="form41" class="">Your name</label>

                                    </div>

                                </div>

                            </div>

                            <!-- Second column -->
                            <div class="col-md-6">

                                <div class="md-form mb-0">

                                    <div class="md-form mb-0">

                                        <input type="tel" id="form52" name="telephone" class="form-control" required>

                                        <label for="form52" class="">Your Telephone Number</label>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <!-- First row -->

                        <!-- Second row -->
                        <div class="row">

                            <div class="col-md-12">

                                <div class="md-form mb-0">

                                    <input type="text" name="admition_number" id="form51" class="form-control" required>

                                    <label for="form51" class="">Admition Number</label>

                                </div>

                            </div>

                        </div>
                        <!-- Second row -->

                        <!-- Third row -->
                        <div class="row">

                            <!-- First column -->
                            <div class="col-md-12">

                                <div class="md-form mb-0">

                                    <textarea type="text" name="message" id="form76" class="md-textarea form-control" rows="3" required></textarea>

                                    <label for="form76">Your message</label>

                                </div>

                            </div>

                        </div>
                        <!-- Third row -->
                        <div class="text-center text-md-left mt-4" >
                            <input class="btn btn-primary" type="submit" value="Send">
                        </div>
                    </form>


                </div>
                <!-- First column -->

                <!-- Second column -->
                <div class="col-md-4">

                    <ul class="contact-icons list-unstyled text-center">

                        <li><i class="fas fa-map-marker-alt fa-2x"></i>

                            <p>Matara, Sri Lanka</p>

                        </li>

                        <li><i class="fas fa-phone fa-2x"></i>

                            <p>+ 94 011 267 789</p>

                        </li>

                        <li><i class="fas fa-envelope fa-2x"></i>

                            <p>csprojectgroup11@gmail.com</p>

                        </li>

                    </ul>

                </div>
                <!-- Second column -->

            </div>

        </section>
        <!-- Section: Contact v.2 -->

    </div>

    <!-- Contact form -->

    <!-- Customers carousel -->

    </main>
    <!-- Main layout -->


    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            &copy; School Progress Management System
            <a href="https://gmail.com">csprojectgroup11@gmail.com </a>

        </div>
    </div>
    <!--/.Copyright-->


<!--/.Footer-->

@include('home_dashboard.script')
</body>
<script>
    $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i=0;i<4;i++) {
            next=next.next();
            if (!next.length) {
                next=$(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
        }
    });
</script>
</html>
