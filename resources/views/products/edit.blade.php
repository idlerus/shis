@extends('layouts.app')

@section('content')

    <div class="columns is-centered">
        <div class="column is-5">
            <a href="/products" class="button is-secondary is-small">< {{ __('generic.return') }}</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="is-size-3">{{ __('form/product.updateTitle') }}</h1>
                <p>{{ __('form/product.updateText') }}</p>

                <hr>

                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="field">
                            <label for="name">{{ __('form/product.name') }}</label>
                            <div class="control">
                                <input type="text" id="name" class="input" name="name" value="{{ $product->name }}" required>
                            </div>
                            <p class="help">{{ __('form/product.helpName') }}</p>
                        </div>
                        <div class="field">
                            <label for="shortDesc">{{ __('form/product.shortDesc') }}</label>
                            <div class="control">
                                <input type="text" id="shortDesc" class="input" name="shortDesc" value="{{ $product->shortDesc }}" required>
                            </div>
                            <p class="help">{{ __('form/product.helpShortDesc') }}</p>
                        </div>
                        <div class="field">
                            <label for="fullDesc">{{ __('form/product.fullDesc') }}</label>
                            <div class="control">
                                <textarea id="fullDesc" class="textarea" name="fullDesc" rows="5" required>{{ $product->fullDesc }}</textarea>
                            </div>
                            <p class="help">{{ __('form/product.helpFullDesc') }}</p>
                        </div>
                        <div class="field">
                            <label for="brand">{{ __('form/product.brand') }}</label>
                            <div class="control">
                                <input type="text" id="brand" class="input" name="brand" value="{{ $product->brand }}" required>
                            </div>
                            <p class="help">{{ __('form/product.helpBrand') }}</p>
                        </div>
                        <div class="field">
                            <label for="country">{{ __('form/product.country') }}</label>
                            <div class="control">
                                <input type="text" id="country" class="input" name="country" value="{{ $product->country }}" required>
                            </div>
                            <p class="help">{{ __('form/product.helpCountry') }}</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="button is-primary">
                                {{ __('form/product.update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
