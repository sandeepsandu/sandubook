  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Currency Converter
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Currency Converter</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="height: 100%">
   <iframe src="https://www.xe.com/currencyconverter/" width="100%" height="500px"></iframe>
    </section>

  <script>
      $("#currency").addClass('active');
  </script>