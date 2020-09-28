@extends('layouts.app')

@section('content')
<div class="container contenido">
<div class="row pb-4">
<h1>Recomendados: </h1>
    @foreach($recomendados as $recomendado)
        <p>
            <span class="font-weight-bold">
                <a href="/profile/{{ $recomendado->id }}">
                <img src="{{ $recomendado->profile->profileImage() }}" class="rounded-circle w-100 " style="max-width:40px;">

                    <span class="text-dark pr-4">{{ $recomendado->username }}</span>
                </a>    
        </p>
    @endforeach
    
</div>
<div class="row pb-4">
@foreach($recomendados as $recomendado)
        <p>
        @can('update', $recomendado->profile)
                    <a href="/profile/{{$recomendado->id}}">Ir a mi perfil</a>
        @endcan
        </p>
@endforeach

</div>
<div class="container">
    @foreach($posts as $post)
    <div class="">
        <div class="col-6 offset-3">
            <a href="/profile/{{ $post->user->id }}">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </a>
        </div>
    </div>
    <div class="row pt-2 pb-4">
        <div class="col-6 offset-3">
            <p>
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                    
                </span>
            {{ $post->caption }}</p>
        </div>
    </div>
    @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
</div>
@endsection
