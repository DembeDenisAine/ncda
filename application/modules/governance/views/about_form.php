<div class="row">
    <form method="post" action="<?=site_url('about')?>">
        <div class="col-md-12">
            <div class="form-group">
                <label>About UNCDA</label>
                <textarea class="form-control"  name="about"><?=$settings()->about?></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>UNCDA Mission</label>
                <textarea class="form-control"  name="mission"><?=$settings()->mission?></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>UNCDA Vision</label>
                <textarea class="form-control"  name="vision"><?=$settings()->vision?></textarea>
            </div>
        </div>
    </form>
    </div>