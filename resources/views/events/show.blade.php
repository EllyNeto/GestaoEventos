@extends('layouts.main')

@section('tittle', $event->tittle)

@section('content')

<div class="container">
    <div class="detail-card col-md-12">
        <div class="row">
            <div id="image-container" class="col-md-6 mb-4 mb-md-0">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->tittle }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->tittle }}</h1>
                
                <div class="info-badge">
                    <ion-icon name="location-outline"></ion-icon> 
                    <span>{{ $event->city }}</span>
                </div>
                
                <div class="info-badge">
                    <ion-icon name="people-outline"></ion-icon> 
                    <span>{{ count($event->users) }} {{ count($event->users) === 1 ? 'Participante' : 'Participantes' }}</span>
                </div>

                <div class="info-badge">
                    <ion-icon name="star-outline"></ion-icon> 
                    <span>Organizador: <strong>{{ $eventOnwer['name'] }}</strong></span>
                </div>

                @if(!$hasUserJoined)
                    <form action="/events/join/{{ $event->id }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg w-100" id="event-submit">
                            <ion-icon name="checkmark-circle-outline"></ion-icon> Confirmar Presença
                        </button>
                    </form>
                @else
                    <div class="already-joined-msg">
                        <ion-icon name="checkmark-done-circle-outline" style="font-size: 1.4rem;"></ion-icon> 
                        Você já está participando deste evento!
                    </div>
                @endif

                <h3>Estrutura do evento:</h3>
                @if(!empty($event->items) && is_iterable($event->items))
                    <ul class="infrastructure-tags">
                        @foreach($event->items as $item)
                            <li>
                                <ion-icon name="checkmark-outline"></ion-icon> {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhum item de infraestrutura informado.</p>
                @endif
            </div>

            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento</h3>
                <p class="event-description">{{ $event->description }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
