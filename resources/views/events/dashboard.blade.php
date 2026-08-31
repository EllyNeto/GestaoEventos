@extends('layouts.main')

@section('tittle', 'Dashboard')

@section('content')

<div class="dashboard-container">
    <div class="dashboard-title-container">
        <h1><ion-icon name="calendar-outline" style="color: var(--liquid-secondary);"></ion-icon> Meus Eventos</h1>
    </div>

    <div class="glass-table-card">
        @if(count($events) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome do Evento</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td scope="row"><strong>{{ $loop->index + 1 }}</strong></td>
                                <td><a href="/events/{{ $event->id }}">{{ $event->tittle }}</a></td>
                                <td>
                                    <span class="badge" style="background: rgba(124, 58, 237, 0.2); color: #c084fc; border: 1px solid rgba(124, 58, 237, 0.4); padding: 6px 12px; border-radius: 999px;">
                                        <ion-icon name="people-outline"></ion-icon> {{ count($event->users) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="actions-cell">
                                        <a href="/events/edit/{{ $event->id }}" class="btn btn-info btn-sm">
                                            <ion-icon name="create-outline"></ion-icon> Editar
                                        </a>
                                        <form action="/events/{{ $event->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <ion-icon name="trash-outline"></ion-icon> Deletar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <ion-icon name="calendar-clear-outline"></ion-icon>
                <p>Você ainda não criou nenhum evento. <a href="/events/create">Criar novo evento</a></p>
            </div>
        @endif
    </div>

    <div class="dashboard-title-container mt-5">
        <h1><ion-icon name="people-circle-outline" style="color: var(--liquid-pink);"></ion-icon> Eventos que estou participando</h1>
    </div>

    <div class="glass-table-card">
        @if(count($eventsasparticipant) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome do Evento</th>
                            <th scope="col">Participantes</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eventsasparticipant as $event)
                            <tr>
                                <td scope="row"><strong>{{ $loop->index + 1 }}</strong></td>
                                <td><a href="/events/{{ $event->id }}">{{ $event->tittle }}</a></td>
                                <td>
                                    <span class="badge" style="background: rgba(6, 182, 212, 0.2); color: var(--liquid-secondary); border: 1px solid rgba(6, 182, 212, 0.4); padding: 6px 12px; border-radius: 999px;">
                                        <ion-icon name="people-outline"></ion-icon> {{ count($event->users) }}
                                    </span>
                                </td>
                                <td>
                                    <form action="/events/leave/{{ $event->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <ion-icon name="exit-outline"></ion-icon> Sair do Evento
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <ion-icon name="walk-outline"></ion-icon>
                <p>Você ainda não está participando de nenhum evento. <a href="/">Veja todos os eventos</a></p>
            </div>
        @endif
    </div>
</div>

@endsection