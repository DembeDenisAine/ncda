<div class="row">
                <div class="form-group col-md-12">
                        <label>Meeting Title</label>
                        <input type="text" value="<?=(@$row)?$row->meeting_name:''?>" class="form-control" name="title" placeholder="Meeting title">
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Meeting Venue</label>
                         <input type="text" value="<?=(@$row)?$row->venue:''?>" class="form-control" name="venue" placeholder="Meeting Venue">
                    </div>
                    <div class="form-group">
                        <label>Meeting Date</label>
                         <input type="text" value="<?=(@$row)?$row->meeting_date:''?>" class="form-control datepicker" autocomplete="off" name="date" placeholder="Meeting Date">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Start Time</label>
                            <input type="text" value="<?=(@$row)?$row->start_at:''?>" class="form-control time" name="start_time" placeholder="Start Time">
                        </div>

                        <div class="form-group col-md-6">
                            <label>End  Time</label>
                            <input type="text" value="<?=(@$row)?$row->end_at:''?>" class="form-control time" name="end_time" placeholder="End Time">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="7" name="description" style="width: 100%;"><?=(@$row)?$row->meeting_description:''?></textarea>
                    </div>
                </div>
            </div>