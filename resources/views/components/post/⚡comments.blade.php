<?php

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;

new class extends Component
{
    //
    public $postId;


    public function mount($postId = null)
    {
        $this->postId = $postId;
    }
    public function render()
    {

        $postComments = Comment::where('post_id','=',$this->postId)->with('author')->get();
        return view('components.post.⚡comments',[
            'comments' => $postComments
        ]);
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
