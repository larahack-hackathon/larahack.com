@if($event->isNotStarted())
    <p class="display-5 mt-4">Countdown To Start</p>
@elseif($event->isNotVotingStarted())
    <p class="display-5 mt-4">Countdown To Voting</p>
@elseif($event->isVotingStarted() && $event->isNotEnded())
    <p class="display-5 mt-4">Countdown To End</p>
@endif
