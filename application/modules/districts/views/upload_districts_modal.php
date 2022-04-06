<!-- Create Branch Modeal ------------>
<div class="modal fade" id="upload">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Import Branches/Districts</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form enctype="multipart/form-data" method="post" action="<?= site_url('import-districts') ?>">
                <div class="modal-body">
                      <div class="form-group">
                              <label>Choose Excel File</label>
                              <input type="file" class="form-control" name="upload_file">
                      </div>
               </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Upload <i class="fas fa-plus"></i></button>
                </div>
            </form>
          </div>
      </div>
  </div>