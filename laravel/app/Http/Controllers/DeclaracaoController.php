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

        $html = View::make('declaracao.comprovante', compact('comprovante'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('declaracao-comprovante.pdf', ['Attachment'=>false]);
    }

    public function declaracaoAluno(String $id) {

        $total_horas = Comprovante::where('aluno_id', $id)->sum('horas');

        $html = View::make('declaracao.aluno',[
            'total_horas'=>$total_horas,
        ])->render();

        $dompdf = new Dompdf(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('declaracao-horas-afins.pdf', ['Attachment' => false]);
    }
}
