
<section id="grafik" class="grafik" >
    <div class="container">
        <div class="row">
            <div class="offset-sm-3 col-sm-6">
        
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Pie Chart</h5>
            
                      <!-- Pie Chart -->
                      <canvas id="pieChart" style="max-height: 400px;"></canvas>
                      <script>
                        document.addEventListener("DOMContentLoaded", () => {
                          new Chart(document.querySelector('#pieChart'), {
                            type: 'pie',
                            data: {
                            //   labels: [
                            //     'Red',
                            //     'Blue',
                            //     // 'Yellow'
                            //   ],
                                labels:{!! json_encode($pieJenis) !!},
                              datasets: [{
                                label: 'My First Dataset',
                                // data: [
                                //     300, 
                                //     50, 
                                //     // 100
                                // ],
                                    data:{!! json_encode($pieSkor) !!},
                                backgroundColor: [
                                  'rgb(255, 99, 132)',
                                  'rgb(54, 162, 235)',
                                //   'rgb(255, 205, 86)'
                                ],
                                hoverOffset: 4
                              }]
                            }
                          });
                        });
                      </script>
                      <!-- End Pie CHart -->
            
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>