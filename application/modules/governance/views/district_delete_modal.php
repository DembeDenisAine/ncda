 <!-- Delete Modeal ------------>
<div class="modal fade" id="del<?php echo $district->id; ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form method="post" action="<?= site_url('delete-district') ?>/<?php echo $district->id; ?>">
                        <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        This action is irreversible! Are you sure you want to delete <br> <u><?php echo $district->district_name; ?></u>?
                                        <input type="hidden" name="id" value="<?php echo $district->id; ?>">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete <i class="fas fa-minus"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
