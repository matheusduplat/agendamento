<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status do Dia</title>
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
    
    
    

 <h1 style="text-align: center">Status Do dia {{date('d/m/y',strtotime(now()))}}</h1>




<br><br>

    <table class="table tabela">
    <thead class="thead-dark">
      <tr >
        <th scope="col">FORNECEDOR</th>
        <th scope="col">AREA</th>
        <th scope="col">Status</th>
        <th scope="col">Observação</th>
              </tr>
    </thead>
    @foreach($registros as $registro)
    <tbody >
        
      <tr  >
        <td>{{mb_strtoupper($registro->fornecedor)}}</td>
        <td>{{$registro->relArea->nome}}</td>        
        <td>{{$registro->relStatus->nomeStatus}}</td> 
        <td>{{$registro->observacao}}</td>
        
      </tr>
      
    </tbody>
    @endforeach
  </table>



   






</div>
</body>
</html>