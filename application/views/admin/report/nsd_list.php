 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">NSD Report</h3>

    </div>

       <div>
           <?php echo form_open(base_url('report/nsd/index'), 'class="form-horizontal"');  ?>
           Date From<input type="text" value="<?=$datefrom;?>" id="datepicker2" name="datefrom" readonly="readonly">
           Date From<input type="text" value="<?=$dateto;?>" id="datepicker1" name="dateto" readonly="readonly">

           <input type="submit" name="submit" value="Search">
           </form>
       </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>ID</th>
            <th>Date</th>
            <th>Supplier</th>
          <th>Customer</th>


            <th>Description</th>
          <th>Qty</th>
            <th>Pur.Rate</th>
            <th>Pur.Amount</th>
            <th>Sale.Rate</th>
            <th>Sale.Amount</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($nsdlist as $row): ?>
          <tr>
              <td><?= $row['nsd_id']; ?></td>
              <td><?= $row['nsd_date']; ?></td>
              <td><?= $row['suplr_name']; ?></td>
              <td><?= $row['cust_name']; ?></td>

              <td><?= $row['nsd_desc']; ?></td>
              <td><?= $row['nsd_qty']; ?></td>
              <td><?= $row['nsd_purrate']; ?></td>
              <td><?= $row['nsd_puramount']; ?></td>
              <td><?= $row['nsd_salerate']; ?></td>
              <td><?= $row['nsd_saleamount']; ?></td>
         </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
$("#report").addClass('active');
</script>

 <script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
 <script>
     $('#datepicker2').datepicker({
         autoclose: true,
         format:"dd-mm-yyyy"
     });
     $('#datepicker1').datepicker({
         autoclose: true,
         format:"dd-mm-yyyy"
     });
 </script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
 <script>
     $(document).ready(function() {
         $('#example1').DataTable( {
             dom: 'Bfrtip',
             buttons: [
                 {
                     extend: 'print',
                     customize: function ( win ) {
                         $(win.document.body)
                             .css( 'font-size', '10pt' )
                             .prepend(
                                 '<img src="" style="position:absolute; top:0; left:0;" />'
                             );

                         $(win.document.body).find( 'table' )
                             .addClass( 'compact' )
                             .css( 'font-size', 'inherit' );
                     }
                 }
             ]
         } );
     } );
 </script>