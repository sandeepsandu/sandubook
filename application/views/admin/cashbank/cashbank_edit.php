<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Cash/Bank</h3>
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

                    <?php echo form_open(base_url('admin/cashbank/edit/'.$user['cb_id']), 'class="form-horizontal"');  ?>

                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Cash/Bank</label>

                        <div class="col-sm-5">
                            <select name="bank_name" class="form-control">
                                <?php
                                foreach($banklist as $each)
                                { ?><option value="<?php echo $each['bank_id']; ?>" <?php if($user['cb_bank_id']==$each['bank_id']) echo 'selected="selected"'; ?>><?php echo $each['bank_name']; ?></option>';
                                <?php }
                                ?>
                            </select>
                        </div>

                        <label for="firstname" class="col-sm-1 control-label">Date</label>

                        <div class="col-sm-3">
                            <input type="text" name="datepicker" value="<?=date("d-m-Y", strtotime($user['cb_date']));?>" class="form-control" id="datepicker" placeholder="">
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="input_fields_wrap">
                            <button class="add_field_button">Add More</button>
                            <table>
                                <?php
//                                print_r($cbtranslist);
//                                exit;

                                ?>
                                <?php
                                $i=0;
                                foreach($cbtranslist as $row2):
                                    $i++;?>
                                <tr>

                                    <td><select name="accname[]" id="accnamefirst<?= $i;?>" class="form-control">


                                        </select>
                                    </td>
                                    <td>  <input type="text" name="desc[]" value="<?= $row2['cbt_desc'];?>" placeholder="Description" class="form-control">
                                    <td>  <select name="paymenttype[]" class="form-control"><option value="1">Paid</option><option value="2">Recieved</option></select>
                                    <td>  <input type="text" name="amount[]"  value="<?= $row2['cbt_amount'];?>"  placeholder="Amount" class="form-control">
                                <td><a href="#" class="remove_field">Delete</a></td>
                                </tr>


                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Add" class="btn btn-info pull-right">
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
    $('#datepicker').datepicker({
        autoclose:true,
        todayHighlight: true,
        format:'dd-mm-yyyy'
    });
    $("#datepicker").datepicker("setDate", new Date());

    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                var idname="accname"+x;
                $(wrapper).append('<tr><td><select name="accname[]" id="'+idname+'" class="form-control"> </select><td><input class="form-control" type="text" name="desc[]" placeholder="Description"><td><select class="form-control" name="paymenttype[]"><option value="1">Paid</option><option value="2">Recieved</option></select><td><input type="text" class="form-control" name="amount[]" placeholder="Amount"><td><a href="#" class="remove_field">Delete</a></tr>'); //add input box
            }
            $('#accname'+x).append(dropdownval);
            $('#accname'+x).select2({
                //configuration
            });

        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault();  $(this).parent().closest('tr').remove(); x--;
            // e.preventDefault(); $(this).parent().remove(); x--;
        })
    });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='<?= base_url() ?>public/dist/js/select2.min.js' type='text/javascript'></script>

<!-- CSS -->
<link href='<?= base_url() ?>public/dist/css/select2.min.css' rel='stylesheet' type='text/css'>

<script>

    //    $("#accname").autocomplete({
    //        source:  '<?php //echo base_url();?>//admin/customers/GetCountryName',
    //    });





    var html  = '<option value="">---Select Name---</option>';
    var dropdownval= '<option value="">---Select Name---</option><?php foreach($banklist as $each){ ?><option value="BK<?php echo $each["bank_id"]; ?>"><?php echo $each["bank_name"]; ?></option><?php }?>';

    dropdownval += '<?php foreach($all_customers as $each){ ?><option value="CU<?php echo $each["cust_id"]; ?>"><?php echo $each["cust_name"]; ?></option><?php }?>';
    dropdownval += '<?php foreach($all_suppliers as $each){ ?><option value="SU<?php echo $each["suplr_id"]; ?>"><?php echo $each["suplr_name"]; ?></option><?php }?>';


    $('#accnamefirst').append(dropdownval);
    // Initialize select2
    $("#accnamefirst").select2();
var i,lastcount;
    lastcount=<?php echo $i;?>;
    for(i=0;i<4;i++)
    {

        $('#accnamefirst'+i).append(dropdownval);
        $('#accnamefirst'+i).select2();
    }
</script>