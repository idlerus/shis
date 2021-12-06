@extends('layouts.app')
@section('content')
            <div class="columns pt-2 is-centered">
                <div class="column is-centered">
                    <div class="is-half">
                        <h1 class="is-size-1">Our sheesh</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    <div class="columns">
                        <div class="column is-8">
                            @forelse($products as $product)
                                <ul>
                                    <li><a href="./products/{{ $product->id }}">{{ ucfirst($product->name) }}</a></li>
                                </ul>
                            @empty
                                <p class="text-warning">No blog Posts available</p>
                            @endforelse
                        </div>
                        <div class="column is-4">
                            <p>Create new Product</p>
                            <a href="/products/create/post" class="button is-primary is-small">Add Product</a>
                        </div>
                    </div>
                </div>
            </div>
@endsection
