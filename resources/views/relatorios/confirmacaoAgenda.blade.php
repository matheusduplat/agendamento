<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Agendamento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <style>

.tabela{

    border: solid;
    
}


  </style>


</head>
<body>
    
<div class="container">


<!--<img src="{{asset('assets/img/logo/logo_relatorio.png')}}" alt="">-->
@foreach($registros as $registro)
    

    <h4 style="text-align: center">Confirmação de Agendamento</h4>

<br><br>

    <h6>Fornecedor: {{mb_strtoupper($registro->fornecedor)}}</h6>
    <br>
    <h6>Entrega: Atacadão Pereira</h6>
    <br>
    <h6>Agendado para dia: {{date('d/m/y',strtotime($registro->data))}}</h6>
    <br>
    <h6>Setor de descarga: {{$registro->relArea->nome}}</h6>
    <br>
    <h6>Horário de Chegada: {{date('H:i',strtotime($registro->time))}}</h6>

    
    
<h5>No dia da entrega enviar esse documento junto com a nota fiscal</h5>


@endforeach
   






</div>
</body>
</html>