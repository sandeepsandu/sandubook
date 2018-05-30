 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Sale Report</h3>

    </div>

       <div>
           <?php echo form_open(base_url('report/sale/index'), 'class="form-horizontal"');  ?>
           Date From<input type="text" value="<?=$datefrom;?>" id="datepicker2" name="datefrom" readonly="readonly">
           Date From<input type="text" value="<?=$dateto;?>" id="datepicker1" name="dateto" readonly="readonly">
           Customer Name <select name="cust_name">
               <option value="0">Select Customer</option>
               <?php
               foreach($customer as $each)
               { ?><option value="<?php echo $each['cust_id']; ?>" <?php if($custid==$each['cust_id']) echo 'selected="selected"'; ?>  ><?php echo $each['cust_name']; ?></option>';
               <?php }
               ?>
           </select>
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
          <th>customer</th>

          <th>Godown</th>
            <th>Description</th>
          <th>Qty</th>
            <th>Rate</th>
            <th>Amount</th>

        </tr>
        </thead>
        <tbody>
          <?php foreach($saledisplay as $row): ?>
          <tr>
            <td><?= $row['sale_id']; ?></td>
              <td><?= $row['sale_date']; ?></td>
            <td><?= $row['cust_name']; ?></td>
            <td><?= $row['godown_name']; ?></td>
            <td><?= $row['sale_desc']; ?></td>
              <td><?= $row['sale_qty']; ?></td>
              <td><?= $row['sale_rate']; ?></td>
              <td><?= $row['sale_amount']; ?></td>

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