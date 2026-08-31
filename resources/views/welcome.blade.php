@extends('layouts.main')

@section('tittle', 'HDC Events - Encontre e Crie Eventos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento proximo</h1>
    <form action="/" method="GET">
        <div class="search-input-wrap">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar por evento, cidade ou categoria..." value="{{ $search ?? '' }}">
            <ion-icon name="search-outline"></ion-icon>
        </div>
    </form>
</div>

<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Resultados para: "<span style="color: var(--liquid-secondary);">{{$search}}</span>"</h2>
    @else
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Confira os eventos incríveis agendados para os próximos dias</p>
    @endif

    <div id="cards-container" class="cards-grid">
        @foreach($events as $event)
        <a href="/events/{{$event->id}}" class="event-card-wrapper">
            <div class="card">
                <div class="card-img-wrapper">
                    <img src="/img/events/{{$event->image}}" alt="{{$event->tittle}}">
                </div>
                <div class="card-body">
                    <p class="card-date">
                        <ion-icon name="calendar-clear-outline"></ion-icon>
                        {{date('d/m/Y', strtotime($event->date))}}
                    </p>
                    <h5 class="card-title">{{$event->tittle}}</h5>
                    <p class="events-participants">
                        <ion-icon name="people-outline"></ion-icon> 
                        {{ count($event->users) }} {{ count($event->users) === 1 ? 'Participante' : 'Participantes' }}
                    </p>
                    <span class="btn btn-primary">
                        Saber mais <ion-icon name="arrow-forward-outline"></ion-icon>
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    @if(count($events) == 0 && $search)
        <div class="empty-state">
            <ion-icon name="search-discontent-outline"></ion-icon>
            <h3>Nenhum evento encontrado para "{{$search}}"</h3>
            <p>Tente procurar por outros termos ou <a href="/">veja todos os eventos</a> disponíveis.</p>
        </div>
    @elseif(count($events) == 0)
        <div class="empty-state">
            <ion-icon name="calendar-number-outline"></ion-icon>
            <h3>Não há eventos cadastrados no momento</h3>
            <p>Seja o primeiro a <a href="/events/create">criar um evento</a>!</p>
        </div>
    @endif
</div>

@endsection