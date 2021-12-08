@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="column is-5">
            <a href="/admin/categories" class="button is-secondary is-small">< {{ __('generic.return') }}</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="is-size-3">{{ __('tag.form.createTitle') }}</h1>
                <p>{{ __('tag.form.createText') }}</p>

                <hr>

                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="field">
                            <label for="name">{{ __('tag.form.name') }}</label>
                            <div class="control">
                                <input type="text" id="name" class="input" name="name" placeholder="{{ __('tag.form.enterName') }}" required>
                            </div>
                            <p class="help">{{ __('tag.form.helpName') }}</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="button is-primary">
                                {{ __('tag.form.create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
