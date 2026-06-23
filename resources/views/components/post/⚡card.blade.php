<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Post;
use Livewire\WithPagination;
use App\Models\Like;

new class extends Component
{
    use WithPagination;
        //



    public function render()
    {
       $posts = Post::with('author')->withCount('likes')->orderBy('posts.created_at')->paginate(10);


       return view('components.post.⚡card',
       [
           'posts' => $posts
       ]
       );

    }
    public function isLikedByUser($postId): bool
    {
        return Like::where('post_id', $postId)
            ->where('user_id', auth()->id())
            ->exists();
    }


};
?>

<div class="flex space-y-8 flex-col">
    @foreach($posts as $post)
        <div class="flex flex-col space-y-3 p-10 border-1 rounded-xl shadow-green-500/50 shadow-md ">


            <div>
                <h1 class="text-2xl font-bold">{{$post->title}}</h1>
            </div>
            <div>
                <p>{{$post->getSmallBody()}}</p>
            </div>


            <div class="flex justify-between" >
                <button wire:navigate href="/post/{{$post->id}}"
                    class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 border border-green-600 rounded ">
                    Подробнее
                </button>
                <div class="flex">

                    @if($this->isLikedByUser($post->id))
                        <x-heroicon-s-heart class="w-6 h-6 text-red-500" />
                    @else
                        <x-heroicon-o-heart class="w-6 h-6 text-red-500" />
                    @endif

                    {{$post->likes_count}}
                </div>
            </div>

        </div>
    @endforeach


        {{ $posts->links() }}
</div>
