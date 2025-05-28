<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Declaração de Atividades</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; line-height: 1.6; }
        .header { text-align: center; margin-bottom: 40px; }
        .content { margin: 0 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Declaração de Atividades Complementares</h2>
    </div>

    <div class="content">
        <p>
            Declaramos para os devidos fins que <strong>{{ $aluno->user->name }}</strong>, regularmente matriculado no curso de 
            <strong>{{ $aluno->curso->nome }}</strong>, cumpriu 
            <strong>{{ $totalHoras }} horas</strong> de atividades complementares, conforme regulamentação do curso.
        </p>

        <p>
            Esta declaração é emitida com base nos comprovantes e documentos aprovados inseridos no sistema.
        </p>

    </div>
</body>
</html>
