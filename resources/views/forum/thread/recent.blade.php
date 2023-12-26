@extends ('forum.master', ['thread' => null, 'breadcrumbs_append' => [trans('forum::threads.recent')]])

@section ('content')
    <div id="new-posts">
        <h2 class="text-3xl text-gray-50 font-medium my-3">{{ trans('forum::threads.recent') }}</h2>

        @if (! $threads->isEmpty())
            <div class="bg-gray-100 shadow rounded text-gray-500 text-center py-4">
                @foreach ($threads as $thread)
                    @include ('forum.thread.partials.list')
                @endforeach
            </div>
        @else
            <div class="bg-gray-100 shadow rounded text-gray-500 text-center py-4">
                <div class="card-body text-center text-muted">
                    {{ trans('forum::threads.none_found') }}
                </div>
            </div>
        @endif
    </div>
@stop
