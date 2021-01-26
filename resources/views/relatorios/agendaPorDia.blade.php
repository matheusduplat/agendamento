<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendados do Dia</title>
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
<h1 style="text-align: center">Agendamento Do dia {{date('d/m/y',strtotime($data_i))}} a {{date('d/m/y',strtotime($data_f))}}</h1>
    
<div class="container">



<br><br>

    <table class="table tabela">
    <thead class="thead-dark">
      <tr >
        <th scope="col">FORNECEDOR</th>
        <th scope="col">AREA</th>
              </tr>
    </thead>
    @foreach($registros as $registro)
    <tbody >
      <tr  >

      
        <td>{{mb_strtoupper($registro->fornecedor)}}</td>
        <td>{{$registro->relArea->nome}}</td>
       
        
      </tr>
     
    </tbody>
    @endforeach
  </table>



   






</div>
</body>
</html>