</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html">Soham's Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo site_url(uri: 'Home') ?>">Home</a></li>
                    <!-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.html">About</a></li> -->
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo site_url(uri: 'Blog/myBlogs') ?>">Your Blogs</a></li>
                    <!-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.html">Contact</a></li> -->

                    <?php if (!$this->session->userdata('uId')) : ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo site_url(uri: 'Signin') ?>">Sign In</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo site_url(uri: 'Signup') ?>">Sign Up</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo site_url(uri: 'Blog/newBlog') ?>">New Blog</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo site_url(uri: 'Signin/logout') ?>">Log Out</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>