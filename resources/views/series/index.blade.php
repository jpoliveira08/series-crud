<x-layout title="Séries">
    <a class="btn btn-dark mb-2" href="/series/criar">Adicionar uma nova Serie</a>
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie }}</li>
        @endforeach
    </ul>
</x-layout>