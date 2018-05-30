 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Bank</h3>

    </div>
       <a href="<?= base_url('admin/bank/add'); ?>" class="btn btn-info btn-flat">Add Bank</a>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>

          <th>Mobile No.</th>
            <th>Credit Bal</th>
            <th>Debit Bal</th>
          <th>Status</th>
          <th style="width: 150px;" class="text-right">Option</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_banks as $row): ?>
          <tr>
            <td><?= $row['bank_name']; ?></td>
            <td><?= $row['bank_address']; ?></td>
            <td><?= $row['bank_mob']; ?></td>
              <td><?= $row['bank_opencredit']; ?></td>
              <td><?= $row['bank_opendebit']; ?></td>
            <td><span class="btn btn-primary btn-flat btn-xs"><?= ($row['bank_status'] == 1)? 'Active': 'Inactive'; ?><span></td>
            <td class="text-right"><a href="<?= base_url('admin/bank/edit/'.$row['bank_id']); ?>" class="btn btn-info btn-flat">Edit</a><a onclick="return deletechecked();" href="<?= base_url('admin/bank/del/'.$row['bank_id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
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
$("#master").addClass('active');
</script>        
