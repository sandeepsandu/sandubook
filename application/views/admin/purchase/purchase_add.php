<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Purchase</h3>
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
           
            <?php echo form_open(base_url('admin/purchase/add'), 'class="form-horizontal"');  ?>

            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Supplier</label>

                <div class="col-sm-5">
                    <select name="suplr_name" class="form-control">
                    <?php
                    foreach($suplr as $each)
                    { ?><option value="<?php echo $each['suplr_id']; ?>"><?php echo $each['suplr_name']; ?></option>';
                    <?php }
                    ?>
                    </select>
                </div>

                <label for="firstname" class="col-sm-1 control-label">Date</label>

                <div class="col-sm-3">
                  <input type="text" name="datepicker" class="form-control" id="datepicker" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Godown</label>

                <div class="col-sm-9">
                    <select name="godownid" class="form-control">
                        <?php
                        foreach($godown as $each)
                        { ?><option value="<?php echo $each['godown_id']; ?>"><?php echo $each['godown_name']; ?></option>';
                        <?php }
                        ?>
                    </select>
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-9">
                    <textarea class="form-control" name="description" id="description" placeholder=""></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Qty</label>

                <div class="col-sm-2">
                  <input type="number" step=".01" name="qty" class="form-control" id="qty" value="0">
                </div>

                <label for="mobile_no" class="col-sm-2 control-label">Rate</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="rate" class="form-control" id="rate" value="0">
                </div>

                <label for="mobile_no" class="col-sm-2 control-label">Amount</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="amount" class="form-control" id="amount" placeholder="" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Payment Mode</label>

                <div class="col-sm-2">
                    <select name="paymentmode" class="form-control">
                        <?php
                        foreach($paymodes as $each)
                        { ?><option value="<?php echo $each['pm_id']; ?>"><?php echo $each['pm_name']; ?></option>';
                        <?php }
                        ?>
                    </select>

                </div>



                <label for="mobile_no" class="col-sm-2 control-label">Amount Paid</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="amountrecieved" class="form-control" id="amount" placeholder="">
                </div>
            </div>


              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add Purchase" class="btn btn-info pull-right">
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
$("#transaction").addClass('active');

</script>
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>

    $('#rate,#qty').change(function(){
        // alert("hai");
        //Selected value
        var rate=$('#rate').val();
        var qty=$('#qty').val();
        var amt=rate*qty;
        $('#amount').val(amt);
    })
    $('#datepicker').datepicker({
        autoclose: true,
       format: "dd-mm-yyyy"
    });

</script>