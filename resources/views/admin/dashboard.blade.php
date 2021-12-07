@extends('layouts.app')

@section('content')

    <div class="columns is-centered mt-4">
        <div class="column is-8">
            <aside class="menu">
                <p class="menu-label">
                    {{ __('admin.users') }}
                </p>
                <ul class="menu-list">
                    <li><a>{{ __('admin.usersList') }}</a></li>
                    <li><a>{{ __('admin.usersBanlist') }}</a></li>
                </ul>
                <p class="menu-label">
                    {{ __('admin.categories') }}
                </p>
                <ul class="menu-list">
                    <li><a href="/admin/categories/">{{ __('admin.categoriesList') }}</a></li>
                </ul>
                <p class="menu-label">
                    {{ __('admin.products') }}
                </p>
                <ul class="menu-list">
                    <li><a>{{ __('admin.productsList') }}</a></li>
                    <li><a>{{ __('admin.productsStats') }}</a></li>
                </ul>
            </aside>
        </div>
    </div>
@endsection
