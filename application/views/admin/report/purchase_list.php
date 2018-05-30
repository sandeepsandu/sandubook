 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Purchase Report</h3>

    </div>

       <div>

           <?php echo form_open(base_url('report/purchase/index'), 'class="form-horizontal"');  ?>
           Date From<input type="text" value="<?=$datefrom;?>" id="datepicker2" name="datefrom" readonly="readonly">
           Date From<input type="text" value="<?=$dateto;?>" id="datepicker1" name="dateto" readonly="readonly">
           Supplier Name <select name="suplr_name">
               <option value="0">Select Supplier</option>
               <?php
               foreach($suplr as $each)
               { ?><option value="<?php echo $each['suplr_id']; ?>"  <?php if($suplrid==$each['suplr_id']) echo 'selected="selected"'; ?>><?php echo $each['suplr_name']; ?></option>';
               <?php }
               ?>
           </select>
           <input type="submit" name="submit" value="Search">
           </form>
       </div>
  <!-- /.box-header -->
    <div class="box-body table-responsive" id="printtable">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>ID</th>
            <th>Date</th>
          <th>Supplier</th>

          <th>Godown</th>
            <th>Description</th>
          <th>Qty</th>
            <th>Rate</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody>
          <?php foreach($purch as $row): ?>
          <tr>
            <td><?= $row['pur_id']; ?></td>
              <td><?= $row['pur_date']; ?></td>
            <td><?= $row['suplr_name']; ?></td>
            <td><?= $row['godown_name']; ?></td>
            <td><?= $row['pur_desc']; ?></td>
              <td><?= $row['pur_qty']; ?></td>
              <td><?= $row['pur_rate']; ?></td>
              <td><?= $row['pur_amount']; ?></td>

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

</script> 
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
//     $(document).ready(function() {
//         $('#example1').DataTable( {
//             dom: 'Bfrtip',
//             buttons: [
//                 'print'
//             ]
//         } );
//     } );
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