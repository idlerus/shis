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
                            <th>{{ __('category.brand') }}</th>
                            <th>{{ __('category.rating') }}</th>
                            <th>{{ __('category.link') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            @if((bool) $product->published || Auth::user()->hasPermission('moderator'))
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->getRatingAvg() }}/5</td>
                                <td>
                                    <div class="columns">
                                        <div class="column">
                                            <a href="/products/{{ $product->id }}" class="button is-small is-info">{{ __('generic.open') }}</a>
                                        </div>
                                        @if(!(bool) $product->published)
                                            <div class="column">
                                                <form action="/products/{{ $product->id }}/publish" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="button is-small is-warning">{{ __('product.publish') }}</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="100%">{{ $products->links('layouts.pagination') }}</td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
