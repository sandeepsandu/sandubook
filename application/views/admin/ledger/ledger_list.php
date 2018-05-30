 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Ledger</h3>

    </div>
       <a href="<?= base_url('admin/ledger'); ?>" class="btn btn-info btn-flat">Add Ledger</a>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>ID</th>
            <th>Date</th>

            <th>Description</th>

            <th>Mode</th>
            <th>Amount</th>
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($ledgerlist as $row): ?>
          <tr>
            <td><?= $row['led_id']; ?></td>
              <td><?= $row['led_date']; ?></td>
            <td><?= $row['led_desc']; ?></td>
              <td><?= $row['led_paymode']; ?></td>

              <td><?= $row['led_amount']; ?></td>

            <td class="text-right"><a href="<?= base_url('admin/ledger/edit/'.$row['led_id']); ?>" class="btn btn-info btn-flat">Edit</a><a onclick="return deletechecked();" href="<?= base_url('admin/ledger/del/'.$row['led_id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
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
$("#transaction").addClass('active');
</script>        
