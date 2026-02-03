<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class Financeiro extends Component
{
    #[Layout('components.layouts.site')]
    public function render()
    {
        $totalSaldo = Document::where('user_id', Auth::id())->sum('total');
        $pendenciasCount = Document::where('user_id', Auth::id())->count();

        return view('livewire.financeiro', [
            'totalSaldo' => $totalSaldo,
            'pendenciasCount' => $pendenciasCount,
        ]);
    }
}
