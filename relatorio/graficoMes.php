<?php
  include_once("../conexao.php");
  include_once("funcaoMes.php"); // php com funções
?>

<?php 
  // Variaveis da sessão
  session_start();
  $nome = $_SESSION['nome'];

  //Variavel POST
  $mes = $_POST['mes'];
  $dia = $_POST['dia'];
  $ano = $_POST['ano'];

  //vetor nome dos meses
  $meses = array(
    1 =>'Janeiro',
    'Fevereiro',
    'Março',
    'Abril',
    'Maio',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro'
  );

  //Numero de dias do mes
  $numDiasMes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
  //Consumo de dias
  $consumosAguaFria = consumo($con, $nome, 0, $ano, $mes, $dia);
  $consumosAguaQuente = consumo($con, $nome, 1, $ano, $mes, $dia);
  //Consumo Total do mes
  $totalAguaFria = consumoTotal($consumosAguaFria, $ano, $mes);

?>

<!--Função Grafico Chart-->
<script type="text/javascript">
  var options = {
    responsive:true,
    legend: {
        display: true,
        position: "bottom",
    }
  };

  var data = {
      labels: <?php echo qtdDias($consumosAguaFria, $ano, $mes ); ?>,
      datasets: [
        {
          label: "Água Quente",
          fill: true,
          lineTension: 0.1,
          backgroundColor: "rgba( 217, 83, 79,0.4)",
          borderColor: "rgba( 217, 83, 79,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(  217, 83, 79,1)",
          pointBackgroundColor: "#ffffff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(255,255,255,1)",
          pointHoverBorderColor: "rgba( 217, 83, 79,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 1,
          pointHitRadius: 10,
          pointStyle: "circle",
          data: <?php echo consumoGrafico($consumosAguaQuente, $ano, $mes ); ?>,
          spanGaps: false,
        },
        {
          label: "Água Fria",
          fill: true,
          lineTension: 0.1,
          backgroundColor: "rgba(77,144,254,0.4)",
          borderColor: "rgba(77,144,254,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(77,144,254,1)",
          pointBackgroundColor: "#ffffff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(255,255,255,1)",
          pointHoverBorderColor: "rgba(77,144,254,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 1,
          pointHitRadius: 10,
          pointStyle: "circle",
          data: <?php echo consumoGrafico($consumosAguaFria, $ano, $mes ); ?>,
          spanGaps: false,
        }
      ]
  };

  
  var ctx = document.getElementById("GraficoLine").getContext("2d");
  var LineChart = new Chart.Line(ctx, {data: data, options: options});
  
  </script>


<section class="area-grafico">

  <!-- Div do plota grafico -->
  <div class="row marge-grafico">
    <div class="col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">
      <canvas id="GraficoLine"></canvas>
    </div>
  </div>

  <!--Consumo Total do mês-->
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
      <h3>Consumo Total de <?php echo $meses[$mes].': '.$totalAguaFria.' m³' ?> </h3>
    </div>
  </div>
  
</section>



<section class="area-tabela">

  <!--Cabeçalho da tabela-->
  <div class="row">
    <div class="col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
      <div class="page-header">
        <h1>Consumo do Mês<small> unidade: <?php echo $nome ?></small></h1>
      </div>
    </div>
  </div>

 
  <!--Tabela de consumo do ano-->
  <div class="row marge-tabela">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-primary">
        <div class="panel-heading tabela-titulo"><strong>Consumo Diário de Água no Mês de <?php echo $meses[$mes] ?></strong></div>
        <!-- Tabela -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped tabela table-hover table-condensed">
            <tr>
              <th class="tabela-nome-coluna">Dia</th>
              <th class="tabela-nome-coluna">Consumo (m³)</th>
            </tr>

            <?php
              for($i = 1; $i <= $numDiasMes; $i++){
            ?>
            <tr>
              <td><?php echo date('d/m/Y',strtotime($consumosAguaFria[1][$i]) ) ?></td>
              <td><?php echo $consumosAguaFria[0][$i] ?></td>
            </tr>
            <?php
             } 
            ?>
            <tr class="info">
              <td><strong>TOTAL</strong></td>
              <td><?php echo $totalAguaFria ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

</section>