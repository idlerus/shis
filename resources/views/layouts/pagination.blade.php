@if ($paginator->hasPages())
    <div class="columns m-1 is-0">
        <div class="column is-narrow p-1">
            @if ($paginator->onFirstPage())
                <button class="button is-secondary" disabled aria-disabled="true" aria-label="@lang('pagination.previous')"><span class="mdi mdi-arrow-left"></span></button>
            @else
                <a class="button is-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><span class="mdi mdi-arrow-left"></span></a>
            @endif
        </div>
        @foreach ($elements as $element)
            @if (is_string($element))
                <div class="column is-narrow p-1" aria-disabled="true"><button disabled class="button is-secondary">{{ $element }}</button></div>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="active column is-narrow p-1" aria-current="page">
                            <button class="button is-secondary" disabled>{{ $page }}</button>
                        </div>
                    @else
                        <div class="column is-narrow p-1">
                            <a class="button is-secondary" href="{{ $url }}">{{ $page }}</a>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <div class="column is-narrow p-1">
                <a class="button is-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><span class="mdi mdi-arrow-right"></span></a>
            </div>
        @else
            <div class="column is-narrow p-1" aria-disabled="true" aria-label="@lang('pagination.next')">
                <button disabled class="button is-secondary" aria-hidden="true"><span class="mdi mdi-arrow-right"></span></button>
            </div>
        @endif
    </div>
@endif
