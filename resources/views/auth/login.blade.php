@extends('home_dashboard.dashboard')

@section('content')


    <!-- Default form login -->
<div>
    <section class="form-elegant">

        <!-- Grid row -->
        <div class="row">
            <div class="col-md-7">
                </div>
            <!-- Grid column -->
            <div class="col-md-8 col-lg-4 col-xl-4">

                <!--Form without header-->
                <div class="card rgba-black-strong" >

                    <div class="card-body border border-white">

                        <!--Header-->
                        <div class="text-center ">
                            <h1 class="white-text mb-5"><strong>Login</strong></h1>
                        </div>
                        <form class="text-center " method="POST" action="{{ route('login') }}">
                        @csrf
                        <!--Body-->
                        <div class="md-form">

                            <input type="text" id="username" name="username" class="form-control white-text @error('username') is-invalid @enderror"  required>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="username" style="color: white;" ><b>Your username</b></label>
                        </div>

                        <div class="md-form">
                            <input type="password" id="password" class="form-control white-text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="password"style="color: white"><b>Your password</b></label>
                        </div>



                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary btn-block btn-rounded z-depth-1a white-text">Sign up</button>
                        </div>


                    </form>
                    </div>



                </div>
                <!--/Form without header-->

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </section>

@endsection
