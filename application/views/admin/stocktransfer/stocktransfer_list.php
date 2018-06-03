 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Stock Transfer</h3>

    </div>
       <a href="<?= base_url('admin/stocktransfer'); ?>" class="btn btn-info btn-flat">Add Stock Transfer</a>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>ID</th>
            <th>Date</th>
          <th>Transfer From</th>

          <th>Transfer To</th>
            <th>Description</th>
          <th>Qty</th>
<th>Option</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($stocktransferlist as $row): ?>
          <tr>
            <td><?= $row['st_id']; ?></td>
              <td><?= $row['st_date']; ?></td>
              <td><?= $row['gfrom']; ?></td>
            <td><?= $row['gto']; ?></td>

            <td><?= $row['st_desc']; ?></td>

              <td><?= $row['st_qty']; ?></td>

      <td class="text-right"><a href="<?= base_url('admin/stocktransfer/edit/'.$row['st_id']); ?>" class="btn btn-info btn-flat">Edit</a><a onclick="return deletechecked();" href="<?= base_url('admin/stocktransfer/del/'.$row['st_id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
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
