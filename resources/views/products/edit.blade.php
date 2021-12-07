@extends('layouts.app')

@section('content')

    <div class="columns is-centered">
        <div class="column is-5">
            <a href="/products" class="button is-secondary is-small">< {{ __('generic.return') }}</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="is-size-3">{{ __('product.form.updateTitle') }}</h1>
                <p>{{ __('product.form.updateText') }}</p>

                <hr>

                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="field">
                            <label for="name">{{ __('product.form.name') }}</label>
                            <div class="control">
                                <input type="text" id="name" class="input" name="name" value="{{ $product->name }}" required>
                            </div>
                            <p class="help">{{ __('product.form.helpName') }}</p>
                        </div>
                        <div class="field">
                            <label for="shortDesc">{{ __('product.form.shortDesc') }}</label>
                            <div class="control">
                                <input type="text" id="shortDesc" class="input" name="shortDesc" value="{{ $product->shortDesc }}" required>
                            </div>
                            <p class="help">{{ __('product.form.helpShortDesc') }}</p>
                        </div>
                        <div class="field">
                            <label for="fullDesc">{{ __('product.form.fullDesc') }}</label>
                            <div class="control">
                                <textarea id="fullDesc" class="textarea" name="fullDesc" rows="5" required>{{ $product->fullDesc }}</textarea>
                            </div>
                            <p class="help">{{ __('product.form.helpFullDesc') }}</p>
                        </div>
                        <div class="field">
                            <label for="brand">{{ __('product.form.brand') }}</label>
                            <div class="control">
                                <input type="text" id="brand" class="input" name="brand" value="{{ $product->brand }}" required>
                            </div>
                            <p class="help">{{ __('product.form.helpBrand') }}</p>
                        </div>
                        <div class="field">
                            <label for="country">{{ __('product.form.country') }}</label>
                            <div class="control">
                                <input type="text" id="country" class="input" name="country" value="{{ $product->country }}" required>
                            </div>
                            <p class="help">{{ __('product.form.helpCountry') }}</p>
                        </div>
                    </div>
                    <div class="field">
                        <label for="category">{{ __('product.form.category') }}</label>
                        <div class="control">
                            <div class="select">
                                <select id="category" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ trans_choice($category->name, 1) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p class="help">{{ __('product.form.helpCategory') }}</p>
                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="button is-primary">
                                {{ __('product.form.update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
