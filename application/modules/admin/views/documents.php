<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Document</h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('attachment_docs'); ?>


            <div class="box-body">


                <div class="form-group">
                    <label>File Description</label>
                    <input type="text" class="form-control" name="desc" placeholder="File Description" maxlength="200" required>
                </div>

                <div class="form-group">
                    <div class='input-group'>
                        <input type='file' class="attach" name="file" placeholder="Choose File"  />
                        <span class="input-group-addon" onclick="$('.attach').click()">
                        <span class="glyphicon glyphicon-file"></span>
                    </span>
                    </div>
                </div>

            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Document</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
    </div>


    <div class="row mt-10" style="margin-top: 50px;">

    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table  table-striped" >
                                <thead>
                                <tr role="row">
                                    <th>Description</th>
                                    <th class="max-width-120"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($documents as $doc): ?>
                                    <tr>
                                        <td><?php echo html_escape($doc->description); ?></td>
                                        <td>
                                    <a href="<?php echo base_url().$doc->attachment; ?>" target='_blank'>View</a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
