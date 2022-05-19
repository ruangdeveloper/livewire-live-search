<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public $results = [];

    private function search($query)
    {
        if ($query == '') return [];

        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'Authentication' => 'token <ganti dengan access token>'
        ])->get('https://api.github.com/search/users', [
            'q' => $query,
            'per_page' => 100
        ]);

        return $response->json()['items'];
    }

    public function updated()
    {
        $this->results = $this->search($this->query);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
