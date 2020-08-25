
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
                    <a href="{{url('/principle')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-home"></i>Home
                    </a>
                </li>

                <li class="py-md-3">
                    <a href="{{url('/principle/news_&_updates_form')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-edit"></i>Add News & Updates
                    </a>
                </li>
                <li class="py-md-3">
                    <a href="{{url('/principle/admin_notification')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="w-fa far fa-check-square"></i>Notification Area</i>
                    </a>
                </li>
                <li class="py-md-3">
                    <a href="{{url('/principle/view_reg')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="w-fa fas fa-user"></i> Students
                    </a>
                </li>
                <li class="py-md-3">
                    <a  href="{{url('/principle/view_reg_teachers')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="w-fa fas fa-user"></i> Staff
                    </a>
                </li>
{{--                <li class="py-md-3">--}}
{{--                    <a href="{{url('/principle/add_performance')}}" class="collapsible-header waves-effect arrow-r">--}}
{{--                        <i class="fas fa-chart-line"></i>Add performance--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="py-md-3">
                    <a  href="{{url('/principle/view_performance')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="w-fa fas fa-user"></i>Performance
                    </a>
                </li>
                <li class="py-md-3">
                    <a  href="{{url('principle/top10_form_subject')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="w-fa fas fa-user"></i>Top 10 Students
                    </a>
                </li>

            </ul>
        </li>
        <!-- Side navigation links -->

    </ul>
    <div class="sidenav-bg mask-strong"></div>
</div>

