@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-md-3 col-sm-12 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle" alt="" style="width:100px;">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                    <a href="/p/create">Crear Nuevo Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Editar Perfil</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> seguidores</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> siguiendo</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5 pb-4">
        @foreach($user->posts as $post)
        <div class="col-md-4 col-sm-12 py-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
