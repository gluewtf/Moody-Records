<?php
function GetSells($con,$date)
{
    $filter = '';

    switch ($date) {
        case 'Hoje':
            $filter = "DATE(Data_Criado) = CURDATE()";
            $filter_previous = "WHERE DATE(Data_Criado) = CURDATE() - INTERVAL 1 DAY";
            break;
        case 'Este mês':
            $filter = "YEAR(Data_Criado) = YEAR(CURRENT_DATE) AND MONTH(Data_Criado) = MONTH(CURRENT_DATE);";
            $filter_previous = "WHERE YEAR(Data_Criado) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
                                AND MONTH(Data_Criado) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
            break;
        case 'Este ano':
            $filter = "YEAR(Data_Criado) = YEAR(CURRENT_DATE) AND YEAR(Data_Criado) = YEAR(CURRENT_DATE);";
            $filter_previous = "WHERE YEAR(Data_Criado) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR)
                                AND YEAR(Data_Criado) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR)";
            break;
        default:

    }
    //Pega as vendas de acordo com o filtro
    $query_today = "SELECT COUNT(*) AS total
               FROM encomenda
               WHERE  " . $filter;
    $result_today = mysqli_query($con, $query_today);
    $row_today = mysqli_fetch_assoc($result_today);


    //Pega as vendas anteriores de acordo com o filtro
    $query_yesterday = "SELECT COUNT(*) AS total
    FROM encomenda
    " . $filter_previous;
    $result_yesterday = mysqli_query($con, $query_yesterday);
    $row_yesterday = mysqli_fetch_assoc($result_yesterday);
    $diference = $row_today['total'] - $row_yesterday['total']; //Calcula a diferenca
    if ($row_yesterday['total'] == 0) { //Se for = 0 entao a percentagem vai ser 100, para evitar a divisao por 0
        $percentFormated = 100; 
    } else {
        $percent = ($diference / $row_yesterday['total']) * 100; //Calculo da percentagem
        $percent = abs($percent) > 100 ? 100 : $percent; //Colocar a percentagem a numero postivo
        $percentFormated = number_format($percent, 0); //Arrendondar a percentagem para 0 casa decimais
    }
    $color = '';
    if ($diference > 0) {
        $status = 'Subiu';
        $color = 'success';
    } else {
        $status = 'Desceu';
        $color = 'danger';
    }
 



        $Quantidade = $row_today['total'];
        $content = "<div class='ps-3'>
       <h6>$Quantidade</h6>
       <span class='text-$color small pt-1 fw-bold'>$percentFormated%</span> <span class='text-muted small pt-2 ps-1'>$status</span>

     </div>";
     return $content;

    

}

function GetEarnings($con,$date)
{
    $filter = '';

    switch ($date) {
        case 'Hoje':
            $filter = "DATE(Data_Criado) = CURDATE()";
            $filter_previous = "WHERE DATE(Data_Criado) = CURDATE() - INTERVAL 1 DAY";
            break;
        case 'Este mês':
            $filter = "YEAR(Data_Criado) = YEAR(CURRENT_DATE) AND MONTH(Data_Criado) = MONTH(CURRENT_DATE);";
            $filter_previous = "WHERE YEAR(Data_Criado) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
                                AND MONTH(Data_Criado) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
            break;
        case 'Este ano':
            $filter = "YEAR(Data_Criado) = YEAR(CURRENT_DATE) AND YEAR(Data_Criado) = YEAR(CURRENT_DATE);";
            $filter_previous = "WHERE YEAR(Data_Criado) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR)
                                AND YEAR(Data_Criado) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR)";
            break;
        default:

    }
    $query_today = "SELECT SUM(Preco_Total) AS total
               FROM encomenda
               WHERE  " . $filter;
    $result_today = mysqli_query($con, $query_today);
    $row_today = mysqli_fetch_assoc($result_today);

    $query_yesterday = "SELECT SUM(Preco_Total) AS total
    FROM encomenda "
     . $filter_previous;
    
    $result_yesterday = mysqli_query($con, $query_yesterday);
    $row_yesterday = mysqli_fetch_assoc($result_yesterday);

    $diference = $row_today['total'] - $row_yesterday['total'];
    if ($row_yesterday['total'] == 0) {
        $percentFormated = 100;
    } else {
        $percent = ($diference / $row_yesterday['total']) * 100;
        $percent = abs($percent) > 100 ? 100 : $percent;
        $percentFormated = number_format($percent, 0);
    }
    $color = '';
    if ($diference > 0) {
        $status = 'Subiu';
        $color = 'success';
    } else {
        $status = 'Desceu';
        $color = 'danger';
    }
 



        $Ganhos = $row_today['total'] == null? 0: $row_today['total'];
        return " <h6>$Ganhos" . "€</h6>
            <span class='text-$color small pt-1 fw-bold'>$percentFormated%</span><span class='text-muted small pt-2 ps-1'>$status</span>";

    

}

function GetEncomendasDashTable($con, $date)
{
    $filter = '';

    switch ($date) {
        case 'Hoje':
            $filter = "DATE(Data_Criado) = CURDATE()";
            break;
        case 'Este mês':
            $filter = "YEAR(Data_Criado) = YEAR(CURRENT_DATE) AND MONTH(Data_Criado) = MONTH(CURRENT_DATE)";
            break;
        case 'Este ano':
            $filter = "YEAR(Data_Criado) = YEAR(CURRENT_DATE) AND YEAR(Data_Criado) = YEAR(CURRENT_DATE)";
            break;
        default:

    }
    
        $query = "SELECT e.*, u.nome as utilizador_nome, u.apelido as utilizador_apelido FROM encomenda e
                  LEFT JOIN utilizador u on u.utilizador_id = e.utilizador_id  WHERE  " . $filter;
        $query .= " AND (e.status = 'Cancelado' OR e.status = 'Pedido Recebido' OR e.status = 'Entregue')";
        $query_run = mysqli_query($con, $query);
        
        
        if ($query_run) {
            if ($query_run->num_rows > 0) {
                while ($row = $query_run->fetch_assoc()) {
            
                    $data[] = $row;
                            
                }
            }
    
        }
        
        $content = "<table class='table table-borderless' id='encomendas-recentes'>
                    <thead>
                      <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>Cliente</th>
                        <th scope='col'>Data</th>
                        <th scope='col'>Preço</th>
                        <th scope='col'>Status</th>
                      </tr>
                    </thead>
                    <tbody id='encomendas'>";

                  
    
      if(mysqli_num_rows($query_run) > 0)
      {
        foreach ($data as $row) {
            $id = $row["encomenda_id"];
            $cliente = $row["utilizador_nome"] . " " . $row["utilizador_apelido"];
            $data = $row["Data_Criado"];
            $preco = $row["Preco_Total"];
            $status = $row["status"];

            $content .= "<tr>
                        <th scope='row'>#$id</th>
                        <td>$cliente</td>
                        <td>$data</td>
                        <td>$preco" . "€" . "</td>
                        <td><span id='dashboard-order-status'class='badge bg-success'>$status</span></td>
                      </tr>";
        }

       
      }

      $content .= " </tbody>
      </table>";

        return $content;
       


}

?>