<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Stock Transfer</h3>
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

                    <?php echo form_open(base_url('admin/stocktransfer/add'), 'class="form-horizontal"');  ?>

                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Transfer From</label>

                        <div class="col-sm-4">
                            <select name="transfer_from" class="form-control">
                                <?php
                                foreach($godownlist as $each)
                                { ?><option value="<?php echo $each['godown_id']; ?>"><?php echo $each['godown_name']; ?></option>';
                                <?php }
                                ?>
                            </select>
                        </div>

                        <label for="firstname" class="col-sm-1 control-label">Total Qty</label>

                        <div class="col-sm-4">
                            <input type="text" name="fromtotalqty" class="form-control" id="fromtotalqty" placeholder="">
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Transfer To</label>

                        <div class="col-sm-4">
                            <select name="transfer_to" class="form-control">
                                <?php
                                foreach($godownlist as $each)
                                { ?><option value="<?php echo $each['godown_id']; ?>"><?php echo $each['godown_name']; ?></option>';
                                <?php }
                                ?>
                            </select>
                        </div>

                        <label for="firstname" class="col-sm-1 control-label">Total Qty</label>

                        <div class="col-sm-4">
                            <input type="text" name="tototalqty" class="form-control" id="fromtotalqty" placeholder="">
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Date</label>

                        <div class="col-sm-5">
                            <input type="text" name="datepicker" class="form-control" id="datepicker" placeholder="">
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
                            <input type="number" step=".01" name="qty" class="form-control" id="qty" placeholder="">
                        </div>
                    </div>

                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Add Stock Transfer" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close( ); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

</section>

<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
    $('#datepicker').datepicker({
        autoclose: true,
        format:"dd-mm-yyyy"
    });
    $("#transaction").addClass('active');
</script>