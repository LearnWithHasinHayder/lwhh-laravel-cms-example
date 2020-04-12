@extends('layout')

@section('form')

@endsection

@section('status')
@foreach ($status as $st)
<div class="container mt-3">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="status shadow-sm" class="">
                <div class="row p-3 pb-2">
                    <div class="col-md-2">
                        <img style="width:50px;"
                            src="{{ empty($st->user->avatar)? asset( 'images/avatar.jpg' ):$st->user->avatar  }}"
                            class="mt-3 rounded-circle img-thumbnail mx-auto d-block" alt="">
                    </div>
                    <div class="col-md-10 p-3 pr-5">
                        <p class="author">
                            <strong>{{ $st->user->name }}</strong> Said
                            {{-- <span class="date">7:58 PM, 7th May 2020 </span> --}}
                            <span class="date"> {{ date('H:i A, dS M Y', strtotime($st->created_at)) }} </span>
                        </p>
                        <p class="content">
                            {{ $st['status'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('script')

@endsection

@section('actions')

@endsection