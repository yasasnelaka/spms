
<style>
    .sn-bg-4 {

        background: grey ;

    }

</style>
<div id="slide-out" class="side-nav sn-bg-4 fixed grey" >
    <ul class="custom-scrollbar">

        <!-- Logo -->
        <li class="logo-sn waves-effect py-md-5  ">
            <div class="text-center">
              <img src="../../img/images/logo2.jpg" height="100px">
            </div>
        </li>

        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li class="py-md-3">
                    <a href="{{url('/students')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-home"></i>Home
                    </a>
                </li>

                <li class="py-md-3">
                    <a href="{{url('/student_profile')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="w-fa fas fa-user"></i>Profile
                    </a>
                </li>
                <li class="py-md-3">
                    <a href="{{url('/view_student_results')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-edit"></i>View results
                    </a>
                </li>

            </ul>
        </li>


        <!-- Side navigation links -->

    </ul>
    <div class="sidenav-bg mask-stro ng"></div>
</div>

