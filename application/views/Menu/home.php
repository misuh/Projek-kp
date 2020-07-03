<div class="container">
  <?= $this->session->flashdata('message');  ?>
	<div class="row">
        <?= validation_errors();  ?>
          <?= form_error('home','<div class="alert alert-danger" role="alert">','</div>'); ?>
           <?= $this->session->flashdata('message'); ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Jumlah Gangguan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-unlink fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Durasi Gangguan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dur ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-clock fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </div>
          
              <canvas id="myChart" width="400" height="600"></canvas>
              <script>
                var param = [];
                var params = [];
                $.post("<?php echo base_url(); ?>home/getdata ",
                    function(data){
                      var obj = JSON.parse(data);

                      $.each(obj,function(i,item){
                        param.push(item.dates);
                        params.push(item.jumlah);
                      });

                      var ctx = $('#myChart');
                      var myChart = new Chart(ctx, {
                          type: 'line',
                          data: {
                              labels: param,
                              datasets: [{
                                  label: 'Grafik Durasi ',
                                  data: params,
                                  fill: false,
                                  pointBackgroundColor: ' rgb(0, 0, 0)',
                                  pointBorderColor:'  rgb(0, 0, 0)',
                                  borderColor:'rgb(0, 64, 255)',
                                  borderWidth: 1
                              }]
                          },
                          options: {
                              responsive: true,
                              maintainAspectRatio: false,
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    userCallback: function(v) { return epoch_to_hh_mm_ss(v) },
                                    stepSize: 30 * 60
                                  }
                                }]
                              },
                              tooltips: {
                                callbacks: {
                                  label: function(tooltipItem, data) {
                                    return data.datasets[tooltipItem.datasetIndex].label + ': ' + epoch_to_hh_mm_ss(tooltipItem.yLabel)
                                  }
                                }
                              }
                            }
                          });

                          function epoch_to_hh_mm_ss(epoch) {
                            return new Date(epoch*1000).toISOString().match("T(.*).000Z")[1]
                          }
                          });
                          
                         

              
              </script>
            <!-- Area Chart
            <div class="col">
              
            </div> -->

       
</div>