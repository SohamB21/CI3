<!-- Page Header-->
<header class="masthead" style="background-image: url(<?php echo base_url(uri: 'assets/images/home-bg.jpg') ?>)">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>
                        Blogs of <?php echo $this->session->userdata('uFullName')
                                        ? $this->session->userdata('uFullName')
                                        : 'User'; ?>
                    </h1>
                    <span class="subheading">Sharing Knowledge, One Blog At A Time.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php if (!empty($allBlogs)) : ?>
                <?php foreach ($allBlogs as $blog) : ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="<?php echo site_url(uri: 'Blog/readBlog/' . $blog->bId) ?>">
                            <h2 class="post-title"><?php echo $blog->bTitle; ?></h2>
                            <h3 class="post-subtitle"><?php echo substr($blog->bBody, 0, 40) . '...'; ?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">
                                <?php echo !empty($blog->fullName)
                                    ? $blog->fullName
                                    : $this->session->userdata('uFullName'); ?>
                            </a>
                            on <?php echo date('F d, Y', strtotime($blog->bDate)); ?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                <?php endforeach; ?>
            <?php else : ?>
                <p>There are no blogs.</p>
            <?php endif; ?>

            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
        </div>
    </div>
</div>