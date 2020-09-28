@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img src="{{ $post->user->profile->profileImage() }}" alt="" class="rounded-circle w-100" style="max-width:40px;">
                </div>
                <div>
                    <div class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span>
                        </a> 
                        @if ($post->user_id == auth()->user()->id)
                        <form action="{{ route('posts.destroy', $post)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-link">Eliminar Post</button>
                        </form> 
                        @endif
                    </div>
                </div>
        </div>

        <hr>

        <p>
            <span class="font-weight-bold">
                <a href="/profile/{{ $post->user->id }}">
                    <span class="text-dark">{{ $post->user->username }}</span>
                </a>
                
            </span>
        {{ $post->caption }}</p>
    </div>
</div>
@endsection
