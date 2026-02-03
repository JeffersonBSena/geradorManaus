<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BudgetPdfController extends Controller
{
    public function download(Budget $budget)
    {
        $budget->load(['customer', 'items.product']);

        $pdf = Pdf::loadView('pdf.budget', compact('budget'));

        return $pdf->stream('orcamento-' . $budget->id . '.pdf');
    }

    public function verify(Request $request, $token = null)
    {
        $searchToken = $token ?? $request->input('token');
        $budget = null;
        $status = null; // 'valid', 'invalid', 'expired'
        $message = null;

        if ($searchToken) {
            // Expected format: B{ID}-{HASH}
            if (preg_match('/^B(\d+)-([A-F0-9]{4})$/i', $searchToken, $matches)) {
                $id = $matches[1];
                $hash = strtoupper($matches[2]);

                $budget = Budget::with('customer', 'items')->find($id);

                if ($budget) {
                    $expectedToken = $budget->validation_token;
                    // Check if token matches (by comparing the whole string or just the hash part, logic is consistent)
                    $expectedHash = strtoupper(substr(md5($budget->id . $budget->created_at . 'MANAUS_SECRET'), 0, 4));

                    if ($hash === $expectedHash) {
                        $status = 'valid';
                        
                        // Check expiration
                        if ($budget->valid_until && $budget->valid_until->isPast()) {
                            $status = 'expired';
                            $message = 'Este orçamento é autêntico, porém sua validade expirou em ' . $budget->valid_until->format('d/m/Y') . '.';
                        } else {
                            $message = 'Orçamento válido e autêntico.';
                        }
                    } else {
                        $status = 'invalid';
                        $message = 'Código de validação incorreto.';
                        $budget = null; // Don't show details if invalid
                    }
                } else {
                    $status = 'invalid';
                    $message = 'Orçamento não encontrado.';
                }
            } else {
                $status = 'invalid';
                $message = 'Formato de token inválido.';
            }
        }

        return view('budget.verify', compact('budget', 'status', 'message', 'searchToken'));
    }
}
