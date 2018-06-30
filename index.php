<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Curah Hujan - Modelling & Simulation</title>
</head>
<body>
  <?php 
    $data = array(
      (object) ['week' => 1, 'data' => 2.175],
      (object) ['week' => 2, 'data' => 3.787],
      (object) ['week' => 3, 'data' => 6.7],
      (object) ['week' => 4, 'data' => 11.711],
      (object) ['week' => 5, 'data' => 20.495],
      (object) ['week' => 6, 'data' => 35.904],
      (object) ['week' => 7, 'data' => 62.789],
      (object) ['week' => 8, 'data' => 109.96],
      (object) ['week' => 9, 'data' => 192.419],
      (object) ['week' => 10, 'data' => 336.75],
      (object) ['week' => 11, 'data' => 589.3],
      (object) ['week' => 12, 'data' => 1031],
      (object) ['week' => 13, 'data' => 1800.95],
      (object) ['week' => 14, 'data' => 3157.987],
      (object) ['week' => 15, 'data' => 5525.766],
    );

    $question = array(
      (object) ['number' => '1', 'text' => 'Tentukan uraian verifikasi matematis dengan linearisasi untuk pembentukan model tersebut agar metoda regresi linier dapat dilakukan.'],
      (object) ['number' => '2', 'text' => 'Bagaimana anda menghitung parameter a dan b dengan metoda regresinya?'],
      (object) ['number' => '3', 'text' => 'Berdasarkan pertanyaan 2, tentukan nilai parameter a dan b untuk model tersebut.'],
      (object) ['number' => '4', 'text' => 'Validasi model yang anda buat dengan menghitung data pengamatan melalui model tersebut'],
      (object) ['number' => '5', 'text' => 'Gambarkan grafik data pengamatan yang sebenaranya dan grafik data pengamatan model'],
      (object) ['number' => '6', 'text' => 'Simulasikan melalui model, untuk memperkirakan data curah hujan (dalam mm3) pada minggu ke 16. Apa pendapat anda tentang data curah hujan di masa-masa yang akan datang menurut model yang anda peroleh tersebut.'],
    );
  ?>

  <div class="container">
    <h1 class="text-center mt-3">Curah Hujan</h1>
    <hr>
    <div class="row">
      <div class="col col-12 col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <table class="table">
          <thead>
            <tr>
              <th>Minggu</th>
              <th>Curah Hujan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data as $key => $value) { ?>
            <tr>
              <td><?php echo $value->week; ?></td>
              <td><?php echo $value->data; ?></td>
            </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Minggu</th>
              <th>Curah Hujan</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="col col-12 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card text-white bg-dark my-3">
          <div class="card-body">
            <h5 class="card-title">Petunjuk</h5>
            <p class="card-text">
              Hasil pengamatan 15 minggu pertama terhadap curah hujan di suatu wilayah diperoleh data seperti yang tetulis pada tabel. 
              Jika suatu pemodelan matematis dari data pengamatan tersebut ada kecenderungan berbentuk y = (a*b)^x dengan a, b adalah parameter data pengamatan, dan x, y adalah variable data pengamatan.
            </p>
          </div>
        </div>

        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <?php foreach($question as $key => $value) { ?>
            <a class="nav-item nav-link <?php echo ($key == 0) ? 'active' : ''; ?>" id="<?php echo 'nav-tab-' . $key; ?>" data-toggle="tab" href="<?php echo '#tab-' . $key; ?>" role="tab" aria-controls="<?php echo 'tab-' . $key; ?>" aria-selected="true">
              <?php echo $value->number; ?>
            </a>
            <?php } ?>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <?php foreach($question as $key => $value) { ?>
          <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : ''; ?>" id="<?php echo 'tab-' . $key; ?>" role="tabpanel" aria-labelledby="<?php echo 'nav-tab-' . $key; ?>">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo 'Pertanyaan ' . $value->number; ?></h5>
                <p class="card-text"><?php echo $value->text; ?></p>
                <a href="#" class="btn btn-primary">Lihat Jawaban</a>
              </div>
            </div>                            
          </div>
          <?php } ?>
        </div>

        <div class="card my-3">
          <div class="card-body">
            <div id="answer-1">

            </div>
            <div id="answer-2">

            </div>
            <div id="answer-3">

            </div>
            <div id="answer-4">

            </div>

            <div id="answer-5">
              <div class="row">
                <div class="col col-12 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <canvas id="statistic-input" width="400" height="400"></canvas>
                </div>
              </div>
            </div>
            <div id="answer-6">

            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <footer class="pt-4 my-md-4 pt-md-4 border-top">
    <div class="container">
      <div class="row">
        <div class="col col-12 col-lg-5 col-md-6 col-sm-12 pull-left text-left">
          <strong>Copyright © Gurisa.Com <?php echo date('Y'); ?> all right reserved</strong>
        </div>
        <div class="col col-12 col-lg-7 col-md-6 col-sm-12 pull-right text-right">
          <a class="" style="margin: 0 4px;" href="#">Raka Suryaardi Widjaja</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="assets/js/jquery.min.js" type="text/javascript"></script>  
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/chart.min.js" type="text/javascript"></script>
  <script src="index.js" type="text/javascript"></script>
</body>
</html>