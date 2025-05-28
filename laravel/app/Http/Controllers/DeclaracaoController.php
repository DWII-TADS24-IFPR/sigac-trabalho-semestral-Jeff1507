<?php
namespace App\Http\Controllers;

use App\Models\Comprovante;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    public function declaracaoComprovante(string $id)
    {
        $comprovante = Comprovante::with(['categoria', 'aluno.user'])->findOrFail($id);

        // Gera o HTML a partir da view Blade
        $html = View::make('declaracao.comprovante', compact('comprovante'))->render();

        // Instância do Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Faz o download do PDF
        return $dompdf->stream('declaracao-comprovante.pdf', ['Attachment'=>false]);
    }
}
