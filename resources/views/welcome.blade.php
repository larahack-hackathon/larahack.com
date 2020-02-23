@extends('layouts.app', ['mainClass' => ''])

@section('content')
    <div class="container-fluid bg-brand-gradient" style="padding-top: 7rem; padding-bottom: 7rem;">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3">LaraHack</h1>
                <h2 class="display-7">The Online Laravel Hackathon</h2>

                <p class="display-5 mt-4">Next Event Is Being Planned</p>

                <a class="btn btn-light btn-xl btn-border mt-4" href="{{ route('register') }}">Join Us!</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h3 class="display-6">How It Works</h3>
            </div>

            <div class="col-12 col-md-4">
                <h4>Theme</h4>
                <p>
                    The theme of the Hackathon will be announced when the event starts.
                </p>

                <p>
                    Not feeling the theme? No problems, it's just a guide, but feel free to build something else
                </p>
            </div>

            <div class="col-12 col-md-4">
                <h4></h4>
            </div>

            <div class="col-12 col-md-4">
                <h4>Voting</h4>
                <p>
                    Once the build time has finished, it's time to put down your tools. Pushing any code after this time will unfortunately disqualify your entry, so be sure to get your commits in before the times up.
                </p>
                <p>
                    The voting categories will be announced along with the theme. In the past we have had Best Use Of Laravel, Best Use Of Theme, Best Idea/Project.
                </p>
            </div>
        </div>
    </div>
@endsection
