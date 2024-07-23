<?php

//pega os eventos
function GetEventos($con)
    {
        //Esta query vai so pegar os eventos que ainda vao acontecer
        $query = "SELECT * from evento where data_fim > CURRENT_DATE "
            ;
        $result = mysqli_query($con, $query);

            $data = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $data[] = $row;
                            
                }
            }

        //vai ser 'gerado' o html de cada evento consoante o numero destes
        foreach ($data as $row) {
            $nome = $row['nome'];
            $data = date_create($row['data_inicio']);
            $data_formatada = date_format($data,"F d, Y");
            $imagem = $row['imagem'];
            $link = $row['link'];
            $local = $row['local'];

            echo "<div class='col-12 col-md-6 col-lg-4'>
                    <div class='single-event-area mb-30'>
                        <div class='event-thumbnail'>
                            <img width='600px' heigth='748px' src='$imagem'>
                        </div>
                        <div class='event-text'>
                            <h4>$nome</h4>
                            <div class='event-meta-data'>
                                <a class='event-place'>$local</a>
                                <a class='event-date'>$data_formatada</a>
                            </div>
                            <a href='$link' target='_blank' class='btn see-more-btn'>Ver Evento</a>
                        </div>
                    </div>
                </div>";
        }
    }

?>