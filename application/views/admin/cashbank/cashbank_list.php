 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Cash/Bank</h3>

    </div>
       <a href="<?= base_url('admin/cashbank'); ?>" class="btn btn-info btn-flat">Add Cash/Bank</a>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>ID</th>
            <th>Date</th>
          <th>Cash/Bank</th>
            <th style="width: 150px;" class="text-right">Option</th>

<!--          <th>Name</th>-->
<!--            <th>Description</th>-->
<!--          <th>Payment Type</th>-->
<!---->
<!--            <th>Amount</th>-->

        </tr>
        </thead>
        <tbody>
          <?php foreach($cashbanklist as $row): ?>
          <tr>
            <td><?= $row['cb_id']; ?></td>
              <td><?= $row['cb_date']; ?></td>
            <td><?= $row['bank_name']; ?></td>

<!--              <td></td>-->
<!--            <td>--><?//= $row['cbt_desc']; ?><!--</td>-->
<!--            <td>--><?//= $row['cbt_paymenttype']==1?'Paid':'Recieved'; ?><!--</td>-->
<!--              <td>--><?//= $row['cbt_amount']; ?><!--</td>-->

              <td class="text-right"><a href="<?= base_url('admin/cashbank/edit/'.$row['cb_id']); ?>" class="btn btn-info btn-flat">Edit</a><a onclick="return deletechecked();" href="<?= base_url('admin/cashbank/del/'.$row['cb_id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
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
  $(function () {
    $("#example1").DataTable();
  });
</script> 
<script>
$("#view_users").addClass('active');
</script>        
