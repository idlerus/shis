@extends('layouts.app')

@section('content')
    <div class="columns is-centered mt-4">
        <div class="column is-8">
            <a href="/admin" class="button is-secondary is-small">< {{ __('generic.return') }}</a>
            <h1 class="is-size-2">{{ __('admin.products') }}</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('admin.product.id') }}</th>
                    <th>{{ __('admin.product.name') }}</th>
                    <th>{{ __('admin.product.brand') }}</th>
                    <th>{{ __('admin.product.rating') }}</th>
                    <th>{{ __('admin.product.options') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    @if(!(bool) $product->published)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->getRatingAvg() }}/5</td>
                            <td>
                                <div class="columns">
                                    <div class="column is-narrow">
                                        <a href="/products/{{ $product->id }}/edit" class="button is-primary"><span class="mdi mdi-pencil"></span></a>
                                    </div>
                                    <div class="column is-narrow">
                                        <form action="/products/{{ $product->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="button is-danger"><span class="mdi mdi-delete"></span></button>
                                        </form>
                                    </div>
                                    <div class="column is-narrow">
                                        <form action="/products/{{ $product->id }}/publish" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="button is-warning">{{ __('product.publish') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
