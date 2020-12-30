<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $body, $post_id;

    public $numResults = 20;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    protected $rules = [
        'body' => 'required|max:500',
    ];

    public function render()
    {
        $posts = Post::query()
                            ->where('team_id', auth()->user()->currentTeam->id)
                            ->orderBy('created_at', 'desc')
                            ->paginate($this->numResults);
        $this->emit('postStore');
        return view('livewire.posts', compact('posts'));
    }

    public function loadMore(){
        $this->numResults += 20;
    }

    public function store()
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'create')) {
            $this->validate();
            $post = new Post;
            $post->team_id = auth()->user()->currentTeam->id;
            $post->user_id = auth()->user()->id;
            $post->body = $this->body;
            $post->save();

            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Post Created Successfully!']);

            $this->resetInputFields();

            $notification = new Notification;
            $notification->notify('New Post Added', $post->body);
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to add posts to this team!']);
        }
    }

    private function resetInputFields(){
        $this->body = '';
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id == $post->user_id) {
            $post->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'You have deleted the post!']);
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to delete this post!']);
        }
    }
}
