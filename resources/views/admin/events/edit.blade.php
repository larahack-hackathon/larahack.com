@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('admin.nav', ['page' => 'events'])
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Event
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.events.update', $event) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="event_type_id">Event Type</label>
                                <select class="form-control @error('event_type_id') is-invalid @enderror" name="event_type_id" id="event_type_id">
                                    <option value="">Please Select</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}" @if(old('event_type_id', $event->event_type_id) == $type->id) selected @endif>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('event_type_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="vote_category_ids[]">Voting Categories</label>
                                <select class="form-control @error('vote_category_ids[]') is-invalid @enderror" name="vote_category_ids[]" id="vote_category_ids[]" multiple>
                                    @foreach($vote_categories as $vote_category)
                                        <option value="{{ $vote_category->id }}" @if (in_array($vote_category->id, $event->vote_categories->pluck('id')->toArray())) selected @endif>{{ $vote_category->name }}</option>
                                    @endforeach
                                </select>
                                @error('vote_category_ids[]')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $event->name) }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="start_at">Start At</label>
                                <input type="datetime-local" class="form-control @error('start_at') is-invalid @enderror" id="start_at" name="start_at" value="{{ old('start_at', optional($event->start_at)->toDateTimeLocalString()) }}">
                                @error('start_at')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="voting_start_at">Voting Start At</label>
                                <input type="datetime-local" class="form-control @error('voting_start_at') is-invalid @enderror" id="voting_start_at" name="voting_start_at" value="{{ old('voting_start_at', optional($event->voting_start_at)->toDateTimeLocalString()) }}">
                                @error('voting_start_at')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end_at">End At</label>
                                <input type="datetime-local" class="form-control @error('end_at') is-invalid @enderror" id="end_at" name="end_at" value="{{ old('end_at', optional($event->end_at)->toDateTimeLocalString()) }}">
                                @error('end_at')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="theme">Theme</label>
                                <input type="text" class="form-control @error('theme') is-invalid @enderror" id="theme" name="theme" value="{{ old('theme', $event->theme) }}">
                                @error('theme')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="first_place_prize">First Place Prize</label>
                                <input type="text" class="form-control @error('first_place_prize') is-invalid @enderror" id="first_place_prize" name="first_place_prize" value="{{ old('first_place_prize', $event->first_place_prize) }}">
                                @error('first_place_prize')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="second_place_prize">Second Place Prize</label>
                                <input type="text" class="form-control @error('second_place_prize') is-invalid @enderror" id="second_place_prize" name="second_place_prize" value="{{ old('second_place_prize', $event->second_place_prize) }}">
                                @error('second_place_prize')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="third_place_prize">Third Place Prize</label>
                                <input type="text" class="form-control @error('third_place_prize') is-invalid @enderror" id="third_place_prize" name="third_place_prize" value="{{ old('third_place_prize', $event->third_place_prize) }}">
                                @error('third_place_prize')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="runner_up_prize">Runner Up Prize</label>
                                <input type="text" class="form-control @error('runner_up_prize') is-invalid @enderror" id="runner_up_prize" name="runner_up_prize" value="{{ old('runner_up_prize', $event->runner_up_prize) }}">
                                @error('runner_up_prize')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="runner_up_amount">Runner Up Amount</label>
                                <input type="number" class="form-control @error('runner_up_amount') is-invalid @enderror" id="runner_up_amount" name="runner_up_amount" value="{{ old('runner_up_amount', $event->runner_up_amount) }}">
                                @error('runner_up_amount')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Active</label><br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('active') is-invalid @enderror" type="radio" name="active" id="active_yes" value="1" @if(old('active', $event->active ? '1' : '0') === '1') checked @endif>
                                    <label class="form-check-label" for="active_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline @error('active') is-invalid @enderror">
                                    <input class="form-check-input @error('active') is-invalid @enderror" type="radio" name="active" id="active_no" value="0" @if(old('active', $event->active ? '1' : '0') === '0') checked @endif>
                                    <label class="form-check-label" for="active_no">No</label>
                                </div>
                                @error('active')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
