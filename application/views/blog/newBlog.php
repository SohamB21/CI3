<!-- Page Header-->
<header class="masthead" style="background-image: url(<?php echo base_url(uri: 'assets/images/home-bg.jpg') ?>)">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>New Blog</h1>
                    <span class="subheading">Sharing Knowledge, One Blog At A Time.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- New Blog Form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-2">
            <form action="<?php echo site_url(uri: 'Blog/addBlog'); ?>" method="post" id="" class="">
                <?php echo validation_errors(); ?>
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-warning">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="">Blog Title</label>
                    <input type="text" name="bTitle" class="form-control" placeholder="Enter your blog title">
                </div> <br>
                <div class="form-group">
                    <label for="">Blog Body</label>
                    <textarea type="text" name="bBody" class="form-control" placeholder="Enter your blog body" cols="10" rows="10"></textarea>
                </div> <br>
                <div class="form">
                    <button class="btn btn-primary float-end">Add Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>