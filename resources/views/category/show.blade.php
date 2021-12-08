@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <h1 class="is-size-2">{{ trans_choice($category->name, 2) }}</h1>
                <form class="form" method="GET">
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="name">Name</label>
                        </div>
                        <div class="field-body">
                            <div class="control">
                                <input class="input" name="name" id="name" type="text" value="{{ app('request')->input('name') }}" placeholder="Text input">
                            </div>
                            <div class="control">
                                <input class="input" name="brand" id="brand" type="text" value="{{ app('request')->input('brand') }}" placeholder="Text input">
                            </div>
                            <div class="control">
                                <div class="select is-multiple">
                                    <select id="tags" name="tags[]" multiple size="1">
                                        @foreach($tags as $tag)
                                            <option {{ app('request')->input('tags') !== null && !in_array($tag->id, app('request')->input('tags')) ? : 'selected' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control">
                                <button class="button is-link">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
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
