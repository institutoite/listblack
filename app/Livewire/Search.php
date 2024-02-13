<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Persona;

class Search extends Component
{
    public $searchTerm;
    public $users;
    public function updatedSearchTerm()
    {
        $this->searchTerm="esto fue cambiado en server";
        return $this->render();
    }

    public function render()
    {
        return view('livewire.search');
    }
}
