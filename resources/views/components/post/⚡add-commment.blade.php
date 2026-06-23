<?php

use Livewire\Component;
use App\Models\Comment;

new class extends Component
{
    public $postId;
    public $body;

    public function render()
    {
        return view('components.post.⚡add-commment',
        [
            'postId' => $this->postId,

        ]
        );
    }

    public function addCommentToPost()
    {
        if (auth()->check()){

                $this->validate([
                    'body' => 'required|string|min:1',

                ],
                    [
                        'body.required' => 'Please enter your comment',
                        'body.min'=> 'Minimum 1 character'
                    ]
                );

                $userId = auth()->id();
                $comment = Comment::create([
                    'body' => $this->body,
                    'user_id' => $userId,
                    'post_id' => $this->postId,
                ]);
            $this->body = '';
            session()->flash('success', 'Комментарий добавлен!');
            $this->dispatch('comment-added');



        }else{
            return redirect()->route('login');
        }
    }
};
?>

<div class="flex flex-col">
    <div class=" w-full">


    <label for="message" class="block mb-2.5 text-sm font-medium text-heading">Your message</label>
   <textarea wire:model="body" class="bg-gray-600 w-full rounded-xl placeholder:text-body" placeholder="Write your thoughts here...">  </textarea>
        @error('body')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex justify-end">
        <button wire:click="addCommentToPost(postId)"
                class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 border border-green-600 rounded w-40 ">
            Add comment
        </button>
    </div>

</div>
