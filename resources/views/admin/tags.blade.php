@extends('layouts.app')

@section('content')
    <div class="columns is-centered mt-4">
        <div class="column is-8">
            <a href="/admin" class="button is-secondary is-small">< {{ __('generic.return') }}</a>
            <h1 class="is-size-2">{{ __('admin.tags') }}</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('admin.tag.id') }}</th>
                    <th>{{ __('admin.tag.name') }}</th>
                    <th>{{ __('admin.tag.nameTranslated') }}</th>
                    <th>{{ __('admin.tag.productsCount') }}</th>
                    <th>{{ __('admin.tag.options') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ __($tag->name) }}</td>
                        <td>{{ $tag->Products->count() ? :0 }}</td>
                        <td>
                            <div class="columns">
                                <div class="column">
                                    <a class="button is-info" disabled><span class="mdi mdi-pen"></span></a>
                                </div>
                                <div class="column">
                                    <form id="delete-frm" class="" action="/admin/tags/{{$tag->id}}" method="POST">
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
                    <td colspan="5"><a class="button is-success" href="/admin/tags/create"><span class="mdi mdi-plus"></span></a></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
