
<?php

    //incluindo conexao
    include("Class/Sql.php");

    $html = '<table>';
    $html .= '<thead style="font-weight: bold;">';
        $html .= '<tr>';
            $html .= '<td style="border: 3px solid #ddd;">Código de Venda</td>';
            $html .= '<td style="border: 3px solid #ddd;">Nome Cliente</td>';
            $html .= '<td style="border: 3px solid #ddd;">Data da Venda</td>';
            $html .= '<td style="border: 3px solid #ddd;">Forma de Pagamento</td>';
            $html .= '<td style="border: 3px solid #ddd;">Status</td>';
        $html .= '</tr>';
    $html .= '</thead>';

    $queryVenda = mysqli_query($conn, "SELECT * FROM Venda a INNER JOIN Cliente b USING(CodCliente) WHERE CodVenda > 1");
    foreach($queryVenda as $row):

        $html .= '<tbody>';
            $html .= '<tr><td style="border: 3px solid #ddd;">'.$row['CodVenda'] . "</td>";
            $html .= '<td style="border: 3px solid #ddd;">'. $row['NomeCliente'] . "</td>";
            $html .= '<td style="border: 3px solid #ddd;">'. $row['DataVenda'] . "</td>";
            $html .= '<td style="border: 3px solid #ddd;">'. $row['FormaPagamento'] . "</td>";
            $html .= '<td style="border: 3px solid #ddd;">'. $row['StatusPedido'] . "</td></tr>";
        $html .= '</tbody>';

    endforeach;

    $html .= '</table>';

    //referenciar o DomPDF com namespace (Para nao dar conflito com autoload)
    use Dompdf\Dompdf;

    //incluir autoload
    require_once("dompdf/autoload.inc.php"); 

    //Criando instancia de classe
    $dompdf = new DOMPDF();

    //Carrega o html
    $dompdf->load_html('
        <h1 style="text-align:center;">Relatório de Vendas</h1>
        ' .$html. '
    ');

    //renderizar o html
    $dompdf->render();

    //Exibir a página
    $dompdf->stream(
        "relatorio_vendas.pdf",
        array(
            "Attachment" => true //Para realizar o download é so mudar para true
        )
    )

?>