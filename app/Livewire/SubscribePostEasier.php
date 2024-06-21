<?php

namespace App\Livewire;

use App\Models\Admin\Subscribe;
use App\Models\Admin\SubscribeSection;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SubscribePostEasier extends Component
{
    public $style;

    public function mount($style = null)
    {
        $this->style = $style;
    }

    #[Rule('required|email')]
    public $email = '';

    public function save()
    {
        $this->validate();

        Subscribe::firstOrCreate([
            'email' => $this->email,
        ]);

        // Reset value
        $this->email = '';

        return redirect()->with('success', 'content.created_successfully');
    }

    public function render()
    {
        return view('livewire.subscribe-post-easier');
    }
}
