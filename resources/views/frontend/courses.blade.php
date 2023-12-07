@extends('frontend.frontend');
@section('frontend_main_content')
<!doctype html>
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Education | Template </title>
        <meta name="description" content>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="https://preview.colorlib.com/theme/onlineedu/site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/gijgo.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>
        <main>

            <div class="slider-area ">
                <div class="slider-height2 d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="hero-cap hero-cap2 text-center">
                                    <h2>All Courses</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section class="all-course section-padding30">
                <div class="container">

                            <div class="row">
                                @foreach ($courses as $course)
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single-course mb-40 ">
                                        <div class="course-img">
                                            <img src="{{ asset('storage/courses/'.$course->thumbnail) }}" alt="{{ $course->title }}" style="width: 100%">
                                        </div>
                                        <div class="course-caption">
                                            <div class="course-cap-top">
                                                <h4><a href="index.html#">{{ $course->title }}</a></h4>
                                            </div>
                                            <div class="course-cap-bottom d-flex justify-content-between">
                                                <ul>
                                                    <li><i class="ti-user"></i> {{ $course->teacher->name }} </li>
                                                </ul>
                                                <span>BDT {{ $course->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                </div>
            </section>

        </main>
        @endsection
