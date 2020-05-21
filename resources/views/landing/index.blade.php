@extends('layouts.app', ['mainClass' => ''])

@section('content')
    <div class="container-fluid bg-brand-gradient" style="padding-top: 7rem; padding-bottom: 7rem;">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3">LaraHack</h1>
                <h2 class="display-7">The Online Laravel Hackathon</h2>

                @if(isset($event) && !is_null($event))
                    @include('partials.countdown', ['event' => $event])
                @else
                    <p class="display-5 mt-4">Next Event Is Being Planned</p>
                @endif

                <a class="btn btn-light btn-xl btn-border mt-4" href="{{ route('register') }}">Join Us!</a>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center my-4">
                <h3 class="display-5">How It Works</h3>
            </div>

            <div class="col-12 col-md-4 text-center">
                <i class="fad fa-lightbulb-on fa-5x mb-4"></i>
                <h4>Theme</h4>
                <p class="text-justify">
                    The theme of the Hackathon will be announced when the event starts.
                </p>

                <p class="text-justify">
                    Not feeling the theme? No problems, it's just a guide, but feel free to build something else
                </p>
            </div>

            <div class="col-12 col-md-4 text-center">
                <i class="fad fa-laptop-code fa-5x mb-4"></i>
                <h4>Build</h4>
                <p class="text-justify">
                    The theme of the Hackathon will be announced when the event starts.
                </p>

                <p class="text-justify">
                    Not feeling the theme? No problems, it's just a guide, but feel free to build something else
                </p>
            </div>

            <div class="col-12 col-md-4 text-center">
                <i class="fad fa-vote-yea fa-5x mb-4"></i>
                <h4>Voting</h4>
                <p class="text-justify">
                    Once the build time has finished, it's time to put down your tools. Pushing any code after this time will unfortunately disqualify your entry, so be sure to get your commits in before the times up.
                </p>
                <p class="text-justify">
                    The voting categories will be announced along with the theme. In the past we have had Best Use Of Laravel, Best Use Of Theme, Best Idea/Project.
                </p>
            </div>
        </div>
    </div>

    @if($streams && $streams->count() > 0)
        <div class="container-fluid bg-brand-gradient">
            <div class="row">
                <div class="col-12">
                    <div class="container py-4">
                        <div class="row ">
                            <div class="col-12 text-center my-4">
                                <h3 class="display-5">Streams</h3>
                            </div>

                            @foreach($streams as $stream)
                                <div class="col-12 col-md-6 col-lg-4 mb-4">
                                    <iframe
                                        src="https://player.twitch.tv/?channel={{ $stream['twitch'] }}&muted=true"
                                        width="100%"
                                        height="300"
                                        frameborder="0"
                                        scrolling="no"
                                        allowfullscreen="true">
                                    </iframe>
                                    <a class="btn btn-outline-light btn-block"
                                       href="https://twitch.tv/crosdale"
                                       target="_blank"
                                    >Watch {{ $stream['name'] }}</a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!isset($stream) || $streams->count() === 0)
        <div class="container-fluid bg-brand-gradient">
            <div class="row">
                <div class="col-12">
    @endif

    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center my-4">
                <h3 class="display-5">Join The Community</h3>
            </div>

            <div class="col-12 col-md-3 text-center mb-4">
                <i class="fad fa-users-crown fa-7x"></i>
            </div>

            <div class="col-12 col-md-9">

                <p class="text-justify">
                    The theme of the Hackathon will be announced when the event starts.
                </p>

                <p class="text-justify">
                    Not feeling the theme? No problems, it's just a guide, but feel free to build something else
                </p>

                <p class="text-justify">
                    Not feeling the theme? No problems, it's just a guide, but feel free to build something else
                </p>

                <p class="text-justify">
                    Not feeling the theme? No problems, it's just a guide, but feel free to build something else
                </p>

            </div>

            <div class="col-12 text-center my-4">
                <a class="btn btn-outline-{{ !isset($stream) || $streams->count() === 0 ? 'light' : 'dark' }} btn-xl" href="{{ route('register') }}">Get Involved</a>
            </div>

        </div>
    </div>

    @if(!isset($stream) || $streams->count() === 0)
                </div>
            </div>
        </div>
    @endif

    <nav class="navbar navbar-light bg-gradient-light">
        <ul class="nav mx-auto nav-fill">
            <li class="nav-item disabled">
                <a class="nav-link navbar-brand" href="/">LaraHack</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
    </nav>

@endsection
