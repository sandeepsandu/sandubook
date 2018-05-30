 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Purchase</h3>

    </div>
       <a href="<?= base_url('admin/purchase'); ?>" class="btn btn-info btn-flat">Add Purchase</a>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
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
          <th style="width: 150px;" class="text-right">Option</th>
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

            <td class="text-right"><a href="<?= base_url('admin/purchase/edit/'.$row['pur_id']); ?>" class="btn btn-info btn-flat">Edit</a><a onclick="return deletechecked();" href="<?= base_url('admin/purchase/del/'.$row['pur_id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
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
