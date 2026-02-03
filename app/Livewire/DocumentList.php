<?php

namespace App\Livewire;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentList extends Component
{
    public function downloadPdf($id)
    {
        $document = Document::with('items')->findOrFail($id);

        if ($document->user_id !== Auth::id()) {
            abort(403);
        }

        $pdf = Pdf::loadView('pdf.document-pdf', ['document' => $document]);
        
        $filename = str_replace(['/', '\\'], '-', $document->number) . '.pdf';

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $filename);
    }

    #[Layout('components.layouts.site')]
    public function render()
    {
        return view('livewire.document-list', [
            'documents' => Document::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
