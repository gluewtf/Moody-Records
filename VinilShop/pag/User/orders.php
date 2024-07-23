<?php
    error_reporting(E_ERROR | E_PARSE);
    header('Location: index.php?op=6');
?>


 

<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <h5 class="mt-2 mb-2">Encomendas</h5>

            <table class="table" id="encomendasTable">
                <thead>
                    <tr>
                        <th>#Encomenda</th>
                        <th>Data</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $orders = GetEncomendas($con);

                    if(mysqli_num_rows($orders) > 0){
                        foreach($orders as $order){
                    ?>
                        <tr>

                            <td>#<?= $order['encomenda_id'] ?></td>
                            <td><?= $order['Data_Criado'] ?></td>
                            <td><?= $order['Preco_Total'] ?>€</td>
                            <td><?= $order['status'] ?></td>
                            <td>
                                <a href="index.php?op=10&e=<?= $order['encomenda_id'] ?>" class="btn btn-dark btn-sm">Ver</a>
                                <a href="#" value="<?= $order['encomenda_id'] ?>" class="btn btn-danger btn-sm DeleteOrderBtn <?php if($order['status'] != 'Entregue' && $order['status'] != 'Cancelado'){ echo 'd-none'; } ?>">Apagar</a>
                            </td>
                        </tr>
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

 

