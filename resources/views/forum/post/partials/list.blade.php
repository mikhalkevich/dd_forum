<div @if (! $post->trashed())id="post-{{ $post->sequence }}"@endif
    class="bg-green_bg border text-gray-50 border-coin mb-2 rounded-lg {{ $post->trashed() || $thread->trashed() ? 'opacity-50' : '' }}"
    :class="{ 'border-blue-500': selectedPosts.includes({{ $post->id }}) }">
    <div class="bg-green_bg  px-4 py-2 flex justify-between flex-row-reverse border-t border-green_text">
        @if (! isset($single) || ! $single)
            <span class="float-end">
                <a href="{{ Forum::route('thread.show', $post) }}" class="text-green_text">#{{ $post->sequence }}</a>
                @if ($post->sequence != 0)
                    @can ('deletePosts', $post->thread)
                        @can ('delete', $post)
                            <input type="checkbox" name="posts[]" :value="{{ $post->id }}" v-model="selectedPosts">
                        @endcan
                    @endcan
                @endif
            </span>
        @endif

        <div>
            {{ $post->authorName }}
            <span class="text-gray-500">
                @include ('forum.partials.timestamp', ['carbon' => $post->created_at])
                @if ($post->hasBeenUpdated())
                    ({{ trans('forum::general.last_updated') }} @include ('forum.partials.timestamp', ['carbon' => $post->updated_at]))
                @endif
            </span>
        </div>
    </div>
    <div class="p-4">
        @if ($post->parent !== null)
            @include ('forum.post.partials.quote', ['post' => $post->parent])
        @endif

        @if ($post->trashed())
            @can ('viewTrashedPosts')
                {!! Forum::render($post->content) !!}
                <br>
            @endcan
            <x-forum.badge type="danger">{{ trans('forum::general.deleted') }}</x-forum.badge>
        @else
            {!! Forum::render($post->content) !!}
        @endif

        @if (! isset($single) || ! $single)
            <div class="flex items-center gap-4 justify-end text-gray-50">
                @if (! $post->trashed())
                    <a href="{{ Forum::route('post.show', $post) }}" class="text-gray-500">{{ trans('forum::general.permalink') }}</a>
                    @if ($post->sequence != 1)
                        @can ('deletePosts', $post->thread)
                            @can ('delete', $post)
                                <a href="{{ Forum::route('post.confirm-delete', $post) }}" class="text-red-500">{{ trans('forum::general.delete') }}</a>
                            @endcan
                        @endcan
                    @endif
                    @can ('edit', $post)
                        <a href="{{ Forum::route('post.edit', $post) }}" class="text-green_text">{{ trans('forum::general.edit') }}</a>
                    @endcan
                    @can ('reply', $post->thread)
                        <a href="{{ Forum::route('post.create', $post) }}" class="text-green_text">{{ trans('forum::general.reply') }}</a>
                    @endcan
                @else
                    @can ('restorePosts', $post->thread)
                        @can ('restore', $post)
                            <a href="{{ Forum::route('post.confirm-restore', $post) }}" class="card-link">{{ trans('forum::general.restore') }}</a>
                        @endcan
                    @endcan
                @endif
            </div>
        @endif
    </div>
</div>
