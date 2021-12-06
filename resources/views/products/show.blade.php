@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/products" class="button is-secondary is-small">< {{ __('generic.return') }}</a>
                <h1 class="is-size-3">{{ ucfirst($product->name) }}</h1>
                <p class="is-size-6 has-text-info">{{ __('category') }}: {{ __($product->Category->name) }}</p>
                <hr/>
                <p>{!! $product->fullDesc !!}</p>
                <hr>
                <a href="/products/{{ $product->id }}/edit" class="button is-primary">Edit Post</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="button is-danger">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
