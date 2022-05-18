

<div class="row">
    <form method="post" action="<?=site_url('about')?>">
        <div class="col-md-12">
            <div class="form-group">
                <label>About UNCDA</label>
                <textarea class="form-control summernote"  name="about"><?=setting()->about?></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>UNCDA Mission</label>
                <textarea class="form-control summernote"  name="mission"><?=setting()->mission?></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>UNCDA Vision</label>
                <textarea class="form-control summernote"  name="vision"><?=setting()->vision?></textarea>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-10"></div>
            <div class="col-lg-2">
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg" value="Save Changes">
                </div>
            </div>
         </div>

    </form>
    </div>