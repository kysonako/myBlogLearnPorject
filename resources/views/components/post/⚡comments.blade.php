<?php

use Livewire\Component;
use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\WithPagination;

new class extends Component
{
    //
    public $postId;
    public $comments;

    public function mount($postId = null)
    {
        $this->postId = $postId;
        $this->loadComments(); // ← загружаем при монтировании
    }
    public function render()
    {
        return view('components.post.⚡comments', [
            'comments' => $this->comments,
        ]);
    }

    #[On('comment-added')]
    public function loadComments()
    {
        $this->comments = Comment::where('post_id', $this->postId)
            ->with('author')
            ->orderBy('created_at', 'desc') // чтобы новые были сверху
            ->get();
    }
};
?>

<div class="flex flex-col space-y-4">

    @foreach($comments as $comment)

        <div class="flex flex-col space-y-2">
            <div class="display flex flex-col space-y-1">
               <div>{{$comment->author->name}}</div>
                <div>{{$comment->created_at}}</div>

            </div>

        </div>
        <div class="flex flex-col space-y-2">
            {{$comment->body}}
        </div>
        <hr>



    @endforeach

</div>
