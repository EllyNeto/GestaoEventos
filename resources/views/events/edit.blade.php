@extends('layouts.main')

@section('tittle', 'Editando: ' . $event->tittle)

@section('content')

<div class="container">
    <div class="glass-form-container">
        <h1><ion-icon name="create-outline" style="color: var(--liquid-secondary); vertical-align: middle;"></ion-icon> Editando: {{ $event->tittle }}</h1>
        
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="image"><ion-icon name="image-outline"></ion-icon> Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <div class="mt-2">
                    <small class="text-muted d-block">Imagem atual:</small>
                    <img src="/img/events/{{ $event->image }}" alt="{{ $event->tittle }}" class="img-preview">
                </div>
            </div>

            <div class="form-group">
                <label for="tittle"><ion-icon name="text-outline"></ion-icon> Nome do Evento:</label>
                <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Nome do evento" value="{{ $event->tittle }}" required>
            </div>

            <div class="form-group">
                <label for="date"><ion-icon name="calendar-outline"></ion-icon> Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date ? $event->date->format('Y-m-d') : '' }}" required>
            </div>

            <div class="form-group">
                <label for="city"><ion-icon name="location-outline"></ion-icon> Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ $event->city }}" required>
            </div>

            <div class="form-group">
                <label for="private"><ion-icon name="lock-closed-outline"></ion-icon> O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não (Público)</option>
                    <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim (Privado)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description"><ion-icon name="document-text-outline"></ion-icon> Descrição:</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="O que vai acontecer no evento?" required>{{ $event->description }}</textarea>
            </div>

            <div class="form-group">
                <label><ion-icon name="construct-outline"></ion-icon> Infraestrutura do evento:</label>
                <div class="checkbox-grid">
                    @php
                        $itemsArr = is_array($event->items) ? $event->items : [];
                    @endphp
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Cadeiras" {{ in_array('Cadeiras', $itemsArr) ? 'checked' : '' }}>
                        <span>Cadeiras</span>
                    </label>
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Palco" {{ in_array('Palco', $itemsArr) ? 'checked' : '' }}>
                        <span>Palco</span>
                    </label>
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Cerveja grátis" {{ in_array('Cerveja grátis', $itemsArr) ? 'checked' : '' }}>
                        <span>Cerveja grátis</span>
                    </label>
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Open food" {{ in_array('Open food', $itemsArr) || in_array('Open Food', $itemsArr) ? 'checked' : '' }}>
                        <span>Open food</span>
                    </label>
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Brindes" {{ in_array('Brindes', $itemsArr) ? 'checked' : '' }}>
                        <span>Brindes</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-4">
                <ion-icon name="save-outline"></ion-icon> Salvar Alterações
            </button>
        </form>
    </div>
</div>

@endsection