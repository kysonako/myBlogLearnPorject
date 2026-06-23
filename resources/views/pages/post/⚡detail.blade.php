<?php

use Livewire\Component;
use App\Models\Post;
use App\Models\Like;

new class extends Component
{
    public int $postId;
    public Post $post;
    public bool $isLiked = false;

    public function render()
    {
        $this->post = Post::with('author', 'comments')
            ->withCount('likes')
            ->findOrFail($this->postId);

        $this->isLiked = $this->isLikedByUser();

        return view('pages.post.⚡detail', [
            'post' => $this->post,
            'isLiked' => $this->isLiked,
        ]);
    }

    public function addLikeToPost()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userId = auth()->id();
        $like = Like::where('post_id', $this->postId)
            ->where('user_id', $userId)
            ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'post_id' => $this->postId,
                'user_id' => $userId,
            ]);
        }

        // Обновляем данные
        $this->post = Post::withCount('likes')->findOrFail($this->postId);
        $this->isLiked = $this->isLikedByUser();
    }

    public function isLikedByUser(): bool
    {
        return Like::where('post_id', $this->postId)
            ->where('user_id', auth()->id())
            ->exists();
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

        <div class="flex flex-row justify-between">

            <button wire:click="addLikeToPost(postId)"
                    class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 border border-green-600 rounded w-40 ">
                Like it!
            </button>
            <div class="flex">

                @if($this->isLiked)
                    <x-heroicon-s-heart class="w-6 h-6 text-red-500"/>
                @else
                    <x-heroicon-o-heart class="w-6 h-6 text-red-500"/>
                @endif
                    {{$post->likes_count}}




            </div>

        </div>

        <div class="flex gap-4 text-sm text-gray-600">
        </div>
    </div>
    <livewire:post.comments :post-id="$postId"></livewire:post.comments>
</div>


