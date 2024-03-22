<?php
require_once('../tcpdf/tcpdf.php');

ob_start(); // Iniciar buffer de saída

// Seu código HTML e PHP aqui
include 'scriptLogin/conexao.php';
include 'scriptLogin/funcoes.php';
include 'scriptLogin/verificaLogado.php';
if (!isset($_SESSION)) {
    session_start();
} #se não tiver sessao crie

$sqlUS = "SELECT * FROM dados INNER JOIN estado ON dados.estado = estado.id";
$result = $conn->query($sqlUS);


// Agora $resposta contém os resultados da consulta
$resposta = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<style>
td {
    font-size: 9px;
    padding: 5px;
    border: .5px solid #000;
}

th {
    background-color: #007bff;
    color: #fff;
    padding: 8px;
    border: .5px solid #000;
    text-align: center;
}
</style>
<table id='listarCadastro'>
    <thead>
        <tr>
            <th>Nome</th>
            <th style="width:25%;">Email</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($resposta as $dados) {
            echo '<tr>';
            echo '<td> ' . $dados["nome"] . '</td>';
            echo '<td style="width:25%;"> ' . $dados["email"] . '</td>';
            echo '<td> ' . date('d/m/Y',  strtotime($dados["dtnascimento"])) . '</td>';
            echo '<td> ' . $dados["telefone"] . '</td>';
            echo '<td> ' . $dados["estado"] . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>


<?php
$html = ob_get_contents(); // Obter o conteúdo do buffer de saída
ob_end_clean(); // Limpar (limpar) o buffer de saída

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); // Instanciar a classe TCPDF

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Area Admin');
$pdf->SetTitle('Relatório de Cadastro');
$pdf->SetSubject('Relatório de Cadastrs');
$pdf->SetKeywords('TCPDF, PDF, exemplo, relatório, usuários');

$pdf->setHeaderData('',6, 'Relatório de Cadastro', ''); // Definir os dados do cabeçalho do PDF

$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128)); // Definir os dados do rodapé do PDF

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); // Definir a fonte padrão monoespaçada

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); // Definir as margens

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM,); // Definir quebras de página automáticas

$pdf->SetFont('dejavusans', '', 10); // Definir fonte

$pdf->AddPage(); // Adicionar uma nova página ao documento PDF

$pdf->writeHTML($html, true, false, true, false, ''); // Escrever HTML no documento PDF

$pdf->lastPage(); // Terminar o documento PDF

$pdf->Output('relatorio_cadastro.pdf', 'I'); // Saída do PDF (diretamente para o navegador = I/ Baixar = D)