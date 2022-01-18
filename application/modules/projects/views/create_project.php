
<form method="post" action="<?= site_url('save-project') ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Project Title</label>
                    <textarea placeholder="Project Ttile" class="form-control" rows="5" name="project_name" style="width: 100%;"> </textarea>
                </div>
                </div>
                <div class="col-md-6">
                    
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" class="form-control date" name="start_date" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>End date</label>
                            <input type="date"  class="form-control date" name="end_date" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select type="text" name="status" class="form-control select2" style="width: 100%;">
                                <option>select-----</option>
                                <option value="Active">Active</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Budget (numbers only)</label>
                            <input type="number" class="form-control date" placeholder="Budget Amount" name="budget" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Currency</label>
                            <select id="currencyList" type="text" name="currency" class="form-control select2" style="width: 100%;">
                                <option>select-----</option>
                                <option value="UGX">Ugandan shilling (UGX)</option>
                                <option value="USD">US Dollar (USD)</option>
                                <option value="GBP">Pound sterling (GBP)</option>
                                <option value="EUR">Euro (EUR)</option>
                                <option value="TZS">Tanzanian shilling (TZS)</option>
                                <option value="JPY">Japanese yen (JPY)</option>
                                <option value="ZAR">South African rand (ZAR)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Project Description</label>
                    <textarea placeholder="Describe the project" class="form-control summernote" rows="10" name="project_description" style="width: 100%;"> </textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success pull-right">   
        <i class="fas fa-plus"></i> Save Project
        </button>
    </div>
</form>
