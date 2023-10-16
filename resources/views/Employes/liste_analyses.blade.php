@extends('adminlte::page')

@section('title')
    Dashboard Admin | GSM-APP
@endsection

@section('content')
<style>
    .small-box {
        background: linear-gradient(
            to right, #8be4ec, #d6dd139b, #9aba9c, #9b5d61, #acac6c, #8e8eb9);
        background-size: 400% 400%;
        animation: animate-background 10s infinite ease-in-out;
    }

    @keyframes animate-background {
        0% {
            background-position: 0 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0 50%;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-2 bg-light">
                <div class="card-body">
                    @forelse($data->chunk(4) as $chunk)
                    <div class="row">
                        @php ($icons = ["fas fa-prescription-bottle", "fas fa-solid fa-hand-holding-medical", "fas fa-vial", "fas fa-flask"])
                        @foreach($chunk as $add)
                        <div class="col-md-3">
                            <div class="small-box text-white">
                                <div class="inner">
                                    <h3>{{ $add->abrv }}</h3>
                                    <p>{{ $add->designation }}</p>
                                </div>
                                <div class="icon">
                                    <i class="{{ $icons[array_rand($icons)] }}"></i>
                                </div>
                                <a href="{{ route('analyses.show', $add->id_analyse) }}" class="small-box-footer">
                                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @empty
                    <p>No data available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
