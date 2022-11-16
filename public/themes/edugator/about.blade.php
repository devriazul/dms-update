@extends('layouts.theme')

@section('content')


    <div class="blog-post-page-header bg-dark-blue text-white text-center py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="mb-3">{{$title}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 pb-5 text-center">
                <img src="{{theme_url('images/about.webp')}}" alt="" srcset="" width="300px">
            </div>
            <div class="col-md-8">
                <p>
                    <b>Digital Marketing School</b> offers a wide range of digital marketing, business management, health and social care online courses covering all aspects you need to advance your career. Our programmes are developed by expert instructors who will teach students new skills that can enhance their careers.
                </p>
                <p>
                    The student can study our courses online whenever and wherever they are, and it comes with an easy understanding of all lesson details with full support from tutors.
                </p> 
                <p>
                    As a result, t is a learning opportunity with an advanced level of knowledge and career-focused skills. Digital Marketing School is an online learning platform that connects expert instructors with students in the UK and globally.
                </p>
            </div>
        </div>

        <div class="row px-3 py-5">
            <div class="col-md-8">
                <div>
                    <h3>Our Mission:</h3>

                    <h5 class="quote_text_style font-bold py-2"><q>To provide a wide range of flexible and fast track courses to those who want to progress in their professional careers</q></h5>
        
                    <p>
                        We have made it our mission to offer great quality courses for those who want to get more knowledge about a certain field of work. Our courses are designed by people for people keeping in mind the busy everyday lives we all have. We provide fast track courses to those who want to get specialised in a certain domain in just a few weeks. Our support materials are made to be accessible and understandable by everyone as we want you to grow and get the necessary skills not only to get a job in your desired field but also to excel at it and be one of the best. By studying one of our courses, you will be able to demonstrate your knowledge and skills and show your future employers that you have what it takes to be the best!
                    </p>
                </div>
            </div>
            <div class="col-md-4 text-center pt-5 d-xs-none">
                <img src="https://www.htcapacitors.net/assets/img/Mission.png" alt="" srcset="" width="350px">
            </div>
        </div>
        <div class="row px-3 py-5">
            <div class="col-md-4 text-center pt-5 d-xs-none">
                <img src="https://invictusinternationalschool.com/images/vission.png" alt="" srcset="" width="350px">
            </div>
            <div class="col-md-8">
                <div>
                    <h3>Our Vision:</h3>

                    <h5 class="quote_text_style font-bold py-2"><q>Better and diversified professional courses accessible to everyone from everywhere</q></h5>
        
                    <p>
                        Give people the chance to make a change in their lives easy and hustle free! We want to give people the chance to follow their dreams in an easy and accessible way by studying a compressive and flexible course in their desired domain. Our online platform is very intuitive and user friendly, helping students learn and develop their skills and knowledge through our suggestive materials, amazing and helpful tutors and globally recognised certificates. We want to give the chance to people from anywhere to do a globally recognised qualification without the need to change their lives as they will be able to learn at their own peace in their preferred location!
                    </p>
                </div>
            </div>
        </div>
    </div>


@endsection
