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

$sqlUS = "SELECT * FROM usuario";
$result = $conn->query($sqlUS);

// Agora $resposta contém os resultados da consulta
$resposta = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>


<table id='listarUsuario'>
    <thead>
        <tr>
            <th style="background-color: #007bff; color: #fff; padding: 8px; border: .5px solid #000; text-align:center; ">Nome</th>
            <th style="background-color: #007bff; color: #fff; padding: 8px;border: .5px solid #000;text-align:center;">Cpf</th>
            <th style="background-color: #007bff; color: #fff; padding: 8px;border: .5px solid #000;text-align:center;">Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($resposta as $dados) {
            echo '<tr>';
            echo '<td style="padding: 5px; border: .5px solid #000; "> ' . $dados["nome"] . '</td>';
            echo '<td style="padding: 5px; border: .5px solid #000;"> ' . formatar_cpf_cnpj($dados["cpf"]) . '</td>';
            echo '<td style="padding: 5px; border: .5px solid #000;"> ' . $dados["email"] . '</td>';
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
$pdf->SetTitle('Relatório de Usuários');
$pdf->SetSubject('Relatório de Usuários');
$pdf->SetKeywords('TCPDF, PDF, exemplo, relatório, usuários');

$pdf->setHeaderData('',6, 'Relatório de Usuários', ''); // Definir os dados do cabeçalho do PDF

$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128)); // Definir os dados do rodapé do PDF

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); // Definir a fonte padrão monoespaçada

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); // Definir as margens

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM,); // Definir quebras de página automáticas

$pdf->SetFont('dejavusans', '', 10); // Definir fonte

$pdf->AddPage(); // Adicionar uma nova página ao documento PDF

$pdf->writeHTML($html, true, false, true, false, ''); // Escrever HTML no documento PDF

$pdf->lastPage(); // Terminar o documento PDF

$pdf->Output('relatorio_usuarios.pdf', 'I'); // Saída do PDF (diretamente para o navegador = I/ Baixar = D)


