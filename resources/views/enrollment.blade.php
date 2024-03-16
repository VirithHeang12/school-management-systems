<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Group 1 - Enrollment</title>

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="{{ asset("css/style-starter.css") }}">

</head>
<body>
<!-- header -->
@include("header")
<!-- //header -->

<!-- inner banner -->
<section class="inner-banner py-5">
    <div class="w3l-breadcrumb py-lg-5">
        <div class="container pt-4 pb-sm-4">
            <h4 class="inner-text-title pt-5">My Courses</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{ url("/home") }}">Home</a></li>
                <li class="active"><i class="fas fa-angle-right"></i>My Courses</li>
            </ul>
        </div>
    </div>
</section>
<!-- //inner banner -->

<!-- courses section -->
<div class="w3l-grids-block-5 py-5">
    <div class="container py-md-5 py-4">
        <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
            <p class="text-uppercase">Best Courses</p>
            <h3 class="title-style">Find The Right Course For You</h3>
        </div>
        <div class="row justify-content-start">
            @foreach($courses as $course)
                @foreach($course as $courseDetail)
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="coursecard-single h-100">
                            <div class="grids5-info position-relative h-50">
                                <img src="{{ asset("storage/" . $courseDetail->course_image) }}" alt="" class="img-fluid" />
                                <div class="meta-list">
                                    <a>{{ $courseDetail->department->department_name }}</a>
                                    <a>{{ $courseDetail->enroll_grade }}</a>
                                    <a>Class ID: {{ $courseDetail->class_id }}</a>
                                    <a>Room ID: {{ $courseDetail->room_id }}</a>
                                </div>
                            </div>
                            <div class="content-main-top">
                                <h4><a>{{ $courseDetail->course_title }}</a></h4>
                                <p>{{ $courseDetail->course_description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
<!-- //courses section -->

<!-- footer block -->
@include("footer")
<!-- //footer block -->

<!-- Js scripts -->
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
    <span class="fas fa-level-up-alt" aria-hidden="true"></span>
</button>
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<!-- //move top -->

<!-- common jquery plugin -->
<script src="{{ asset("js/jquery-3.3.1.min.js") }}"></script>
<!-- //common jquery plugin -->

<!-- /counter-->
<script src="{{ asset("js/counter.js") }}"></script>
<!-- //counter-->

<!-- theme switch js (light and dark)-->
<script src="{{ asset("js/theme-change.js") }}"></script>
<!-- //theme switch js (light and dark)-->

<!-- MENU-JS -->
<script>
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>
<!-- //MENU-JS -->

<!-- disable body scroll which navbar is in active -->
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- //disable body scroll which navbar is in active -->

<!-- bootstrap -->
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<!-- //bootstrap -->
<!-- //Js scripts -->
</body>
</html>
