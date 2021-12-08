@extends('layouts.app')
@section('content')
    <div class="columns is-centered pt-2">
        <div class="column is-8">
            <a href="/category/{{ $product->category_id }}" class="button is-secondary is-small">< {{ __('generic.return') }}</a>
            <h1 class="is-size-3">{{ ucfirst($product->brand) }} - {{ ucfirst($product->name) }}</h1>
            <p class="is-size-6 has-text-info">{{ __('category') }}: {{ trans_choice($product->Category->name, 1) }}</p>
            <p class="is-size-6 has-text-secondary">{{ __('tags') }}: {{ implode(', ', $product->Tags()->pluck('name')->all()) }}</p>
            <hr/>
            <p>{!! $product->fullDesc !!}</p>
            @if (Auth::user()->hasPermission('moderator'))
                <hr>
                <div class="columns">
                    <div class="column is-narrow">
                        <a href="/products/{{ $product->id }}/edit" class="button is-primary">{{ __('product.edit') }}</a>
                    </div>
                    <div class="column is-narrow">
                        <form id="delete-frm" class="" action="" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="button is-danger">{{ __('product.delete') }}</button>
                        </form>
                    </div>
                    @if(!(bool) $product->published)
                        <div class="column is-narrow">
                            <form action="/products/{{ $product->id }}/publish" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="button is-warning">{{ __('product.publish') }}</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="columns is-centered">
        <div class="column is-8 pt-2">
            <h1 class="is-size-4">{{ __('generic.comments') }}</h1>
            <article class="message pt-1">
                <div class="message-header">
                    <p>{{ __('generic.createComment') }}</p>
                </div>
                <div class="message-body">
                    <textarea class="textarea" placeholder="e.g. Hello world"></textarea>
                    <button class="button is-info mt-2">{{ __('generic.sendComment') }}</button>
                </div>
            </article>
            @foreach($product->comments as $comment)
                <article class="message pt-1">
                    <div class="message-header">
                        <p>{{ $comment->user->name }}</p>
                        <p>{{ date('Y-m-d', strtotime($comment->created_at)) }}</p>
                    </div>
                    <div class="message-body">
                        {{ $comment->comment }}
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@endsection
