<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Purchase</h3>
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
           
            <?php echo form_open(base_url('admin/purchase/edit/'.$user['pur_id']), 'class="form-horizontal"' )?>

            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Supplier</label>

                <div class="col-sm-5">
                    <select name="suplr_name" class="form-control">
                        <?php
                        foreach($suplr as $each)
                        { ?><option value="<?php echo $each['suplr_id']; ?>"  <?php if($user['pur_suplr_id']==$each['suplr_id']) echo 'selected="selected"'; ?>><?php echo $each['suplr_name']; ?></option>';
                        <?php }
                        ?>
                    </select>
                </div>

                <label for="firstname" class="col-sm-1 control-label">Date</label>

                <div class="col-sm-3">
                    <input type="text" name="datepicker" value="<?=$user['pur_date'];?>" class="form-control" id="datepicker" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Godown</label>

                <div class="col-sm-9">
                    <select name="godownid" class="form-control">
                        <?php
                        foreach($godown as $each)
                        { ?><option value="<?php echo $each['godown_id']; ?>"  <?php if($user['pur_godownid']==$each['godown_id']) echo 'selected="selected"'; ?>><?php echo $each['godown_name']; ?></option>';
                        <?php }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-9">
                    <textarea class="form-control" v name="description" id="description" placeholder=""><?=$user['pur_desc'];?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Qty</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="qty" value="<?=$user['pur_qty'];?>" class="form-control" id="qty" placeholder="">
                </div>

                <label for="mobile_no" class="col-sm-2 control-label">Rate</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="rate" value="<?=$user['pur_rate'];?>" class="form-control" id="rate" placeholder="">
                </div>

                <label for="mobile_no" class="col-sm-2 control-label">Amount</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="amount" value="<?=$user['pur_amount'];?>" class="form-control" id="amount" placeholder="">
                </div>
            </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update Purchase" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section>
<script>
    $("#transaction").addClass('active');
    $('#datepicker').datepicker({
        todayHighlight: true,
        format:"dd-mm-yyyy"
    });
</script>