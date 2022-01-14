
                <form method="post" action="<?= site_url('save-activity') ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Objective Title</label>

                                    <input type="hidden" name="objective_id" value="<?php echo $objective->id; ?>">
                                   
                                    <textarea class="form-control" rows="3" readonly
                                       style="width: 100%;"><?php echo $objective->objective_name; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Activity Title</label>
                                    <textarea class="form-control" rows="3" name="activity_name" style="width: 100%;"> </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="10" name="activity_description" style="width: 100%;"> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info pull-right">   
                        Save <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </form>