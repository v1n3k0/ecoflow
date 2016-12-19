<?php include_once("../header.php"); ?> 
<?php include_once("../validar.php"); ?>
<?php include_once("consumo.php"); ?>

<?php 
  // Variaveis da sessão
  $login = $_SESSION['login'];
  $nome = $_SESSION['nome'];

  //Ano atual
  date_default_timezone_set('UTC');
  if(isset($_POST['ano'])){
    $ano = $_POST['ano'];
  }else{
    $ano = date("Y");  
  }

?>
<div class="row">
  <?php 
    //Nome da Unidade
    echo '<h3> Unidade: '.$nome.'</h3>';
   ?>
</div>

<div class="row">
  <form class="form-inline" method="POST" action="graficoAno.php">
      <div class="form-group">
        <label>Ano</label>
        <select class="form-control" name="ano">
          <?php
            $numAno = date("Y");
            for($i = 2016; $i <= $numAno; $i++){
              if($i == $ano) $seleciona = 'selected'; else $seleciona = '';
              echo '<option value="'.$i.'"'.$seleciona.'>'.$i.'</option>';
            }
           ?>
        </select>      
      </div>

      <button type="submit" class="btn btn-default">Aplicar</button>
  </form>
</div>

<script>
  //API  do google para criação de graficos
  google.charts.load('current', {packages: ['corechart', 'line']});
  google.charts.setOnLoadCallback(drawBasic);

  function drawBasic() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Mês');
    data.addColumn('number', 'Consumo');

    data.addRows([
      <?php echo consumoAno($con, $login, $ano); ?>
    ]);

    var options = {
      hAxis: {
        title: 'Mês',
        //baseline:31,
        
        gridlines: {
          count:12,
        }
      },
      vAxis: {
        title: 'm³'
      },
      width: 900,
      height: 300,
      title:'Consumo Mensal de Água no Ano: <?php echo $ano ?>',
    };  

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

    chart.draw(data, options);
  }
</script>

<!-- Div do plota grafico -->
<div class="row">
  <div id="chart_div"></div>
</div>

<div class="row">
  <?php
    // Consumo Total do Ano
    echo '<h4>Consumo Total do Ano: '.consumoTotalAno($con, $login, $ano).'</h4>';  
  ?>
</div>

<?php include_once("../footer.php") ?>