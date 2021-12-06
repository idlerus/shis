@extends('layouts.app')

@section('content')
    <div class="columns is-centered mt-4">
        <div class="column is-5">
            <form class="box" action="{{ route('register') }}" method="POST">
                @csrf
                <p class="is-size-3">{{ ucfirst(__('generic.register')) }}</p>

                <div class="field">
                    <label class="label" for="username">{{ ucfirst(__('generic.username')) }}</label>
                    <div class="control">
                        <input class="input" type="text" name="username" id="username" placeholder="{{ ucfirst(__('generic.username')) }}...">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="email">{{ ucfirst(__('generic.email')) }}</label>
                    <div class="control">
                        <input class="input" type="email" name="email" id="email" placeholder="{{ ucfirst(__('generic.email')) }}...">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="password">{{ ucfirst(__('generic.password')) }}</label>
                    <div class="control">
                        <input class="input" type="password" name="password" id="password" placeholder="{{ ucfirst(__('generic.password')) }}...">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox">
                            {{ ucfirst(__('generic.agreeRules')) }}
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">{{ ucfirst(__('generic.registerButton')) }}</button>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <a class="button is-link is-light" href="login">{{ ucfirst(__('generic.loginButton')) }}</a>{{ ucfirst(__('generic.alreadyLoggedIn')) }}?
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
