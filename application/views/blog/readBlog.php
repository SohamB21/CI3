<body>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <!-- <p><?php var_dump($blog) ?></p> -->
                        <h1><?php echo $blog[0]->bTitle ?></h1>
                        <h2 class="subheading"><?php echo substr($blog[0]->bBody, 0, 40) . '...'; ?></h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">
                                <?php echo !empty($blog[0]->fullName)
                                    ? $blog[0]->fullName : "Unknown" ?></a>
                            on <?php echo date('F d, Y', strtotime($blog[0]->bDate)); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p><?php echo $blog[0]->bBody ?></p>
                </div>
            </div>
        </div>
    </article>
</body>