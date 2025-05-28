<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Declaração de Comprovante</title>
        <style>
            body {
                font-family: DejaVu Sans, sans-serif;
                font-size: 14px;
                padding: 30px;
            }
            h1 {
                text-align: center;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <h1>Declaração de Atividade Complementar</h1>

        <p>Declaramos que o(a) aluno(a) <strong>{{ $comprovante->aluno->user->name }}</strong> participou da seguinte atividade complementar:</p>

        <p><strong>{{ $comprovante->atividade }}</strong></p>

        <p>Carga horária: <strong>{{ $comprovante->horas }} horas</strong></p>

        <p>Categoria: <strong>{{ $comprovante->categoria->nome }}</strong></p>

        <br><br>
        <p>Emitido em {{ now()->format('d/m/Y') }}.</p>
    </body>
</html>
