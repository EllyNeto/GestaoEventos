@extends('layouts.main')

@section('tittle', 'Criar Evento')

@section('content')

<div class="container">
    <div class="glass-form-container">
        <h1><ion-icon name="add-circle-outline" style="color: var(--liquid-secondary); vertical-align: middle;"></ion-icon> Crie o seu evento</h1>
        
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="image"><ion-icon name="image-outline"></ion-icon> Imagem do Evento:</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>

            <div class="form-group">
                <label for="title"><ion-icon name="text-outline"></ion-icon> Nome do Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Ex: Festival de Música 2026" required>
            </div>

            <div class="form-group">
                <label for="date"><ion-icon name="calendar-outline"></ion-icon> Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="city"><ion-icon name="location-outline"></ion-icon> Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ex: São Paulo - SP" required>
            </div>

            <div class="form-group">
                <label for="private"><ion-icon name="lock-closed-outline"></ion-icon> O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não (Público)</option>
                    <option value="1">Sim (Privado)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description"><ion-icon name="document-text-outline"></ion-icon> Descrição:</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="O que vai acontecer no evento? Detalhe a programação..." required></textarea>
            </div>

            <div class="form-group">
                <label><ion-icon name="construct-outline"></ion-icon> Infraestrutura disponível:</label>
                <div class="checkbox-grid">
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Cadeiras">
                        <span>Cadeiras</span>
                    </label>
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Palco">
                        <span>Palco</span>
                    </label>
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Open bar">
                        <span>Open bar</span>
                    </label>
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Open food">
                        <span>Open food</span>
                    </label>
                    <label class="checkbox-chip">
                        <input type="checkbox" name="items[]" value="Brindes">
                        <span>Brindes</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-4">
                <ion-icon name="checkmark-sharp"></ion-icon> Criar Evento
            </button>
        </form>
    </div>
</div>

@endsection