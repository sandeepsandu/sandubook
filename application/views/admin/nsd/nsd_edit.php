<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit NSD</h3>
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
           
            <?php echo form_open(base_url('admin/nsd/edit/'.$user['nsd_id']), 'class="form-horizontal"' )?>

            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Supplier</label>

                <div class="col-sm-4">
                    <select name="suplr_name" class="form-control">
                        <?php
                        foreach($supplier as $each)
                        { ?><option value="<?php echo $each['suplr_id']; ?>"  <?php if($user['nsd_suplr_id']==$each['cust_id']) echo 'selected="selected"'; ?>><?php echo $each['suplr_name']; ?></option>';
                        <?php }
                        ?>
                    </select>
                </div>
                <label for="firstname" class="col-sm-2 control-label">Customer</label>

                <div class="col-sm-4">
                    <select name="cust_name" class="form-control">
                        <?php
                        foreach($customer as $each)
                        { ?><option value="<?php echo $each['cust_id']; ?>"  <?php if($user['nsd_cust_id']==$each['cust_id']) echo 'selected="selected"'; ?>><?php echo $each['cust_name']; ?></option>';
                        <?php }
                        ?>
                    </select>
                </div>



            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Date</label>

                <div class="col-sm-5">
                    <input type="text" name="datepicker" value="<?=$user['nsd_date'];?>" class="form-control" id="datepicker" placeholder="">
                </div>
            </div>


            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-9">
                    <textarea class="form-control" name="description" id="description" placeholder=""><?=$user['nsd_desc'];?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Qty</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="qty"  value="<?=$user['nsd_qty'];?>" class="form-control" id="qty" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="mobile_no" class="col-sm-3 control-label">Purchase Rate</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="purrate" value="<?=$user['nsd_purrate'];?>"  class="form-control" id="purrate" placeholder="">
                </div>

                <label for="mobile_no" class="col-sm-3 control-label">Purchase Amount</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="puramount" readonly  value="<?=$user['nsd_puramount'];?>" class="form-control" id="puramount" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="mobile_no" class="col-sm-3 control-label">Sale Rate</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="salerate" value="<?=$user['nsd_salerate'];?>"  class="form-control" id="salerate" placeholder="">
                </div>

                <label for="mobile_no" class="col-sm-3 control-label">Sale Amount</label>

                <div class="col-sm-2">
                    <input type="number" step=".01" name="saleamount" value="<?=$user['nsd_saleamount'];?>" class="form-control" id="saleamount" placeholder="">
                </div>
            </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update NSD" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section>
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
    $("#transaction").addClass('active');
    $('#datepicker').datepicker({
        todayHighlight: true,
        format:"dd-mm-yyyy",
        autoclose:true
    });
    $('#purrate,#salerate,#qty').change(function(){
        // alert("hai");
        //Selected value
        var prate=$('#purrate').val();
        var srate=$('#salerate').val();
        var qty=$('#qty').val();
        var saleamt=srate*qty;
        $('#saleamount').val(saleamt);
        var puramt=prate*qty;
        $('#puramount').val(puramt);
    })

</script>