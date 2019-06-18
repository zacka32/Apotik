<script src="dist/jquery-3.1.1.min.js"></script>
<script src="dist/highcharts.js"></script>
<script src="dist/exporting.js"></script>

<script>
$(document).ready(function () {

  Highcharts.chart('container', {

    title: {
        text: 'Solar Employment Growth by Sector, 2010-2016'
    },

    subtitle: {
        text: 'Source: thesolarfoundation.com'
    },

    yAxis: {
        title: {
            text: 'Number of Employees'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [{
        name: 'Installation',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }, {
        name: 'Manufacturing',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, {
        name: 'Sales & Distribution',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }, {
        name: 'Project Development',
        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    }, {
        name: 'Other',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

});
  </script>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	  
		<div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" style="
													font-size: 16px;
													color: blue;
													font-family: cursive;
												">
			  Penjualan Kasir Hari Ini</span>
              <span class="info-box-number" style="font-size: 30px;">
			  <?php $d = mysql_query("select sum(harga * jumlah) as total from detail_transaksi where id_transaksi 
										in(select id_transaksi from transaksi where created_user='12345' and tgl_beli= CURDATE())
									");
					$h = mysql_fetch_array($d);
					$total = number_format($h['total'],0,",",".");
					echo "$total"; ?>
			</span>
            </div>
			
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
		
		<div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box border">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" >Total Penjualan Hari Ini</span>
              <span class="info-box-number">  <?php $d1 = mysql_query("select sum(harga * jumlah) as total from detail_transaksi where id_transaksi 
										in(select id_transaksi from transaksi where tgl_beli= CURDATE())
									");
					$h1 = mysql_fetch_array($d1);
					$total1 = number_format($h1['total'],0,",",".");
					echo "$total1"; ?></span>
            </div>
			
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
		
		
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> <img src="png/package.png" width="64px"></h3>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?module=produk&act=produk" class="small-box-footer">Master Produk <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
               <h3> <img src="png/idea.png" width="64px"></h3>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?module=suppliyer" class="small-box-footer">Master Suppliyer<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
            <h3> <img src="png/online-shop.png" width="64px"></h3>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="?module=transaksi" class="small-box-footer">Penjualan <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
             <h3> <img src="png/presentation.png" width="64px"></h3>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="?module=transaksi&act=listtransaksi" class="small-box-footer">List Penjualan <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		
		
		
		
			<!--  untuk grafik
        <section class="col-lg-12 connectedSortable">
        
          <div class="box box-primary">
              <div class="box-body">
                <div id="container"></div>
    
              </div>
          </div>

        </section> /.row -->
      </div>
      <!-- /.row -->

    </section>
