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
                            <td>{{ __($category->name) }}</td>
                            <td>
                                <div class="columns">
                                    <div class="column">
                                        <a class="button is-info" disabled><span class="mdi mdi-pen"></span></a>
                                    </div>
                                    <div class="column">
                                        <form id="delete-frm" class="" action="/admin/categories/{{$category->id}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="button is-danger"><span class="mdi mdi-delete"></span></button>
                                        </form>
                                    </div>
                                </div>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"><a class="button is-success" href="/admin/categories/create"><span class="mdi mdi-plus"></span></a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
