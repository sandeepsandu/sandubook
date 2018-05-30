 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">NSD</h3>

    </div>
       <a href="<?= base_url('admin/nsd'); ?>" class="btn btn-info btn-flat">Add NSD</a>
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
            <th>Purchase Rate</th>
            <th>Purchase Amount</th>
            <th>Sale Rate</th>
            <th>Sale Amount</th>
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($salelist as $row): ?>
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

            <td class="text-right"><a href="<?= base_url('admin/nsd/edit/'.$row['nsd_id']); ?>" class="btn btn-info btn-flat">Edit</a><a onclick="return deletechecked();" href="<?= base_url('admin/nsd/del/'.$row['nsd_id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
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
