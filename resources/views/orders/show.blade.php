@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-6 offset-3">
                <h2 class="text-secondary text-center">Order Info</h2>
                <form>
                    @foreach($order->items as $item)
                    @php
                        $game=$games->where('id',$item->game_id)->first();

                    @endphp
                    <div class="form-group">
                        <label for="name">Game</label>
                        <input type="text" class="form-control text-cent" id="name" name="name"
                            value="{{ old('name', $game->name) }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">GameId</label>
                        <input type="text" class="form-control text-cent" id="name" name="name"
                            value="{{ old('name', $item->game_id) }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">GameId</label>
                        <input type="text" class="form-control text-cent" id="name" name="name"
                            value="{{ old('name', $item->game_id) }}" disabled>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <a class="btn btn-success" href="/photos">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection