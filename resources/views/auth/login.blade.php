@extends('layouts.app')

@section('content')
    <div class="columns is-centered mt-4">
        <div class="column is-5">
            <form class="box" action="{{ route('login') }}" method="POST">
                @csrf
                <p class="is-size-3">{{ ucfirst(__('generic.login')) }}</p>

                <div class="field">
                    <label class="label" for="name">{{ ucfirst(__('generic.username')) }}</label>
                    <div class="control">
                        <input class="input" type="text" name="name" id="name" placeholder="{{ ucfirst(__('generic.username')) }}">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="password">{{ ucfirst(__('generic.password')) }}</label>
                    <div class="control">
                        <input class="input" type="password" name="password" id="password" placeholder="{{ ucfirst(__('generic.password')) }}">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            {{ ucfirst(__('generic.keepLoggedIn')) }}
                        </label>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-link">{{ ucfirst(__('generic.loginButton')) }}</button>
                    </div>
                    <div class="control">
                        <a class="button is-link is-light" href="register">{{ ucfirst(__('generic.registerButton')) }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
