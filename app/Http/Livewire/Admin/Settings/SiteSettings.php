<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;

class SiteSettings extends Component
{
    public function render()
    {
        return view('livewire.admin.settings.site-settings')->layout('layouts.admin_base');
    }
}
