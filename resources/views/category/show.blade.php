@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <h1 class="is-size-2">{{ trans_choice($category->name, 2) }}</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('category.product') }}</th>
                            <th>{{ __('category.rating') }}</th>
                            <th>{{ __('category.link') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>69/420</td>
                                <td><a href="/products/{{ $product->id }}" class="button is-small is-info">{{ __('generic.open') }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
