@extends('principle_dashboard.dashboard')
@section('content')

    <!-- Section: Classic admin cards -->
    <section class="pb-3">
        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

                <!-- Card Primary -->
                <div class="card classic-admin-card primary-color">
                    <div class="card-body">
                        <div class="pull-right">
                            <i class="fas fa-child"></i>
                        </div>
                        <p class="white-text">BOYS</p>
                        <h4 class="check">{{$count_male}}</h4>
                    </div>
                </div>
                <!-- Card Primary -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

                <!-- Card Yellow -->
                <div class="card classic-admin-card warning-color">
                    <div class="card-body">
                        <div class="pull-right">
                            <i class="fas fa-female"></i>
                        </div>
                        <p class="white-text">GIRLS</p>
                        <h4 class="check">{{$count_female}}</h4>
                    </div>
                </div>
                <!-- Card Yellow -->
            </div>
        </div>
    </section>
@endsection
