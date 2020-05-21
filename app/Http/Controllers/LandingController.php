<?php

namespace App\Http\Controllers;

use App\Models\Event;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index')
            ->with('event', Event::active()->notEnded()->orderBy('start_at', 'asc')->first())
            ->with('streams', $this->getStreams());
    }

    private function getStreams()
    {
        $streams = collect([]);

        for ($i = 1; $i <= 6; $i++) {
            $streams->add(['name' => 'Lee', 'twitch' => 'crosdale']);
        }

        return $streams;
    }
}
