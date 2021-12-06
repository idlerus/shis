@extends('layouts.app')

@section('content')

    <div class="columns is-centered">
        <div class="column is-5">
            <a href="/products" class="button is-secondary is-small">< {{ __('generic.return') }}</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">{{ __('form.product.createTitle') }}</h1>
                <p>{{ __('form.product.createText') }}</p>

                <hr>

                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="field">
                            <label for="name">{{ __('form.product.name') }}</label>
                            <div class="control">
                                <input type="text" id="name" class="input" name="name" placeholder="{{ __('form.product.enterName') }}" required>
                            </div>
                            <p class="help">This is a help text</p>
                        </div>
                        <div class="control-group col-12">
                            <label for="name">{{ __('form.product.name') }}</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="{{ __('form.product.enterName') }}" required>
                        </div>
                        <div class="control-group col-12">
                            <label for="shortDesc">{{ __('form.product.shortDesc') }}</label>
                            <input type="text" id="shortDesc" class="form-control" name="shortDesc" placeholder="{{ __('form.product.enterShortDesc') }}" required>
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="fullDesc">{{ __('form.product.fullDesc') }}</label>
                            <textarea id="fullDesc" class="form-control" name="fullDesc" placeholder="{{ __('form.product.enterFullDesc') }}" rows="" required></textarea>
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="brand">{{ __('form.product.brand') }}</label>
                            <input type="text" id="brand" class="form-control" name="brand" placeholder="{{ __('form.product.enterBrand') }}" required>
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="country">{{ __('form.product.country') }}</label>
                            <input type="text" id="country" class="form-control" name="country" placeholder="{{ __('form.product.enterCountry') }}" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="btn btn-primary">
                                {{ __('form.product.create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
