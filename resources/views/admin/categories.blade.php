@extends('layouts.app')

@section('content')
    <div class="columns is-centered mt-4">
        <div class="column is-8">
            <a href="/admin" class="button is-secondary is-small">< {{ __('generic.return') }}</a>
            <h1 class="is-size-2">{{ __('admin.categories') }}</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('admin.id') }}</th>
                        <th>{{ __('admin.categoryName') }}</th>
                        <th>{{ __('admin.categoryNameTranslated') }}</th>
                        <th>{{ __('admin.categoryOptions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ __($category->name )}}</td>
                            <td>
                                <a class="button is-info"><span class="mdi mdi-pen"></span></a>
                                <a class="button is-danger"><span class="mdi mdi-delete"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"><a class="button is-success"><span class="mdi mdi-plus"></span></a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
