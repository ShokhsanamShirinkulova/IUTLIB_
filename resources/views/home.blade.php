@extends('layouts.app')
  <style>
    .dashboardHeading{
      text-align: center; position: relative;left: 50%;transform: translateX(-50%);
    }
    .chart-container{
      position: relative; width:70%;left: 50%; transform: translateX(-50%);
    }
  </style>

@section('content')
  <div class="container">
    <div class="row">
      <h1 class="dashboardHeading">Total Issued Books + Expired But Not Returned Books</h1>
    </div>
    <br>
    <div class="row">
      <div class="chart-container" style="">
        <canvas id="chart"></canvas>
      </div>
    </div>
    <br>
    <div class="row">
      <h2 class="dashboardHeading">Overall Report</h2>
      <div class="col-md-4">
        <div class="totalNumbers">
          
        </div>
      </div>
      <div class="col-md-4">
        <div class="totalNumbers">
          
        </div>
      </div>
      <div class="col-md-4">
        <div class="totalNumbers">
          
        </div>
      </div>
    </div>
    <script>
      var ctx = document.getElementById("chart");
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ["Total issued books", "Expired But Not Returned Books"],
          datasets: [{
            label: '# of Votes',
            data: [95, 47],
            backgroundColor: [
              '#2196F3',
              '#01579B'
            ],
            borderColor: [
              '#1A237E',
              '#1A237E'
            ],
            borderWidth: 2
          }]
        },
        options: {
          legend: {
            labels: {
              fontColor: 'black',
              fontSize: 16,
              fontStyle: 'bold',
            }
          }
        },
        animation: {
          onProgress: function(animation) {
            progress.value = animation.animationObject.currentStep/animation.animationObject.numSteps;
          }
        }
      });
    </script>
  </div>
@endsection
