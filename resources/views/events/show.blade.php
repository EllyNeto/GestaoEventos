@extends('layouts.main')

@section('tittle', $event->tittle)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $event->title }}</h1>
        <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
        @if(count($event->users) < 2 && count($event->users) > 0)
            <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} Participante</p>
        @else
            <p class="events-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} Participantes</p>
        @endif
        <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOnwer['name'] }}</p>
        @if(!$hasUserJoined)
          <form action="/events/join/{{ $event->id }}" method="POST">
            @csrf
              <a href="/events/join/{{ $event->id }}" 
                class="btn btn-primary" 
                id="event-submit" 
                onclick="event.preventDefault(); this.closest('form').submit();">
                Confirmar Presença
              </a>
          </form>
        @else
          <p class="already-joined-msg"> Voce ja esta a participar neste evento!</p>
        @endif
        <h3>O evento conta com:</h3>
        @if(!empty($event->items) && is_iterable($event->items))
          <ul>
              @foreach($event->items as $item)
                  <li>{{ $item }}</li>
              @endforeach
          </ul>
        @else
          <p>Nenhum item informado para este evento.</p>
        @endif
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o evento:</h3>
        <p class="event-description">{{ $event->description }}</p>
      </div>
    </div>
  </div>
  
@endsection
