@extends('layouts.app')
@section('content')
    <div class="columns p-2">
        <div class="column">
            <div class="pt-2">
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
                <div class="columns p-2">
                    <div class="list has-overflow-ellipsis">
                        @foreach($products as $product)
                            <div class="list-item">
                                <div class="list-item-image">
                                    <figure class="image is-64x64">
                                        <img class="is-rounded" src="https://via.placeholder.com/128x128.png?text=Image">
                                    </figure>
                                </div>

                                <div class="list-item-content">
                                    <div class="list-item-title"><a href="/products/{{ $product->id }}" class="is-link">{{ $product->name }}</a></div>
                                    <div class="list-item-description">
                                        <div class="tag">{{ $product->getRatingAvg() }}/5 <span class="mdi mdi-star"></span></div>
                                        <div class="tag">{{ $product->brand }}</div>
                                    </div>
                                    <div class="list-item-description">
                                        <div class="tag">{{ $product->shortDesc }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{ $products->links('layouts.pagination') }}
            </div>
        </div>
    </div>
@endsection
