<?php

use Livewire\Component;
use App\Models\Post;

new class extends Component
{
    public int $postId; //from url

    public function render()
    {
        $post = Post::with('author', 'comments', 'likes')
            ->findOrFail($this->postId);

        return view('pages.post.⚡detail', [
            'post' => $post,
        ]);
    }

};
?>

<div class="flex flex-col">
    <div class="flex flex-col space-y-10 ">
        <div>
            <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
            <h2 class="text-sm text-gray-500">
                {{ $post->created_at->format('d.m.Y') }}
                •
                {{ $post->author->name }}
            </h2>
        </div>

        <p>{{ $post->body }}</p>

        <div class="flex flex-row">

            <button wire:navigate href="/post/{{$post->id}}"
                    class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 border border-green-600 rounded w-40 ">
              {{count($post->likes)}}  Like it!
            </button>

        </div>

        <div class="flex gap-4 text-sm text-gray-600">
        </div>
    </div>
    <livewire:post.comments :post-id="$postId"></livewire:post.comments>
</div>


