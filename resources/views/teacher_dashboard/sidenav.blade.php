
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
                    <a href="{{url('/teacher')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-home"></i>Home
                    </a>
                </li>

                <li class="py-md-3">
                    <a  href="{{url('/marks/select-class')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-pencil-alt"></i>Add Marks
                    </a>
                </li>

                <li class="py-md-3">
                    <a  href="{{url('/teacher/view_marks_form')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-address-book" aria-hidden="true"></i>Student Marks
                    </a>
                </li>

                <li class="py-md-3">
                    <a  href="{{url('/marks/select-student')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-pencil-alt"></i>Marks
                    </a>
                </li>

                <li class="py-md-3">
                    <a href="{{url('/teacher/add_performance')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-chart-line"></i>Add performance
                    </a>
                </li>

                <li class="py-md-3">
                    <a  href="{{url('/teacher/view_performance')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="w-fa fas fa-user"></i>Performance
                    </a>
                </li>

                <li class="py-md-3">
                    <a  href="{{url('/compare/term-subject')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-chart-line"></i>Graph
                    </a>
                </li>

                <li class="py-md-3">
                    <a  href="{{url('/marks/individual')}}" class="collapsible-header waves-effect arrow-r">
                        <i class="fas fa-compress" aria-hidden="true"></i>Compare
                    </a>
                </li>



            </ul>
        </li>
        <!-- Side navigation links -->

    </ul>
    <div class="sidenav-bg mask-strong"></div>
</div>

