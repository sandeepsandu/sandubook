<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Customer</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('admin/customers/add'), 'class="form-horizontal"');  ?>

            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Customer Group</label>

                <div class="col-sm-9">
                    <select name="cust_group" class="form-control">
                    <?php
                    foreach($cust_group as $each)
                    { ?><option value="<?php echo $each['cust_groupid']; ?>"><?php echo $each['cust_groupname']; ?></option>';
                    <?php }
                    ?>
                    </select>
                </div>
            </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-9">
                  <input type="text" name="firstname" class="form-control" id="firstname" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Address</label>

                <div class="col-sm-9">
                  <input type="text" name="lastname" class="form-control" id="lastname" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" id="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>

                <div class="col-sm-9">
                  <input type="number" step=".01" name="mobile_no" class="form-control" id="mobile_no" placeholder="">
                </div>
              </div>
            <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Opening Credit</label>

                <div class="col-sm-9">
                    <input type="number" step=".01" name="opencredit" class="form-control" id="opencredit" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Opening Debit</label>

                <div class="col-sm-9">
                    <input type="number" step=".01" name="opendebit" class="form-control" id="opendebit" placeholder="">
                </div>
            </div>
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Select Status</label>

                <div class="col-sm-9">
                  <select name="user_role" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add Customer" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section>


<script>
    $("#master").addClass('active');
</script>    