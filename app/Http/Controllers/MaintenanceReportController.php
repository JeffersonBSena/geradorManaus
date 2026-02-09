<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MaintenanceReport;
use Barryvdh\DomPDF\Facade\Pdf;

class MaintenanceReportController extends Controller
{
    public function download(MaintenanceReport $record)
    {
        $pdf = Pdf::loadView('pdf.maintenance_report', ['record' => $record]);

        return $pdf->stream("relatorio-manutencao-{$record->id}.pdf");
    }
}
