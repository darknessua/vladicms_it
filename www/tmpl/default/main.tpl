<html>    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>%title%</title>
        <meta name="keywords" content="%meta_key%" />
        <meta name="description" content="%meta_desc%" />
        <link href="%tmpl_dir%templatemo_style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="%tmpl_dir%/js/tinymce/tinymce.min.js"></script>
        
    </head>
    <body>

        <div id="templatemo_header_wrapper">
            <div id="templatemo_header">

                <div id="site_title">
                    <h1><a href="/article/all">
                            <img src="%tmpl_dir%images/templatemo_logo.png" alt="tripod blog" /></a>
                        <span>CMS personale by VLADI</span>
                    </h1>
                </div>

                <div id="templatemo_rss">
                    <a href="" target="_parent">SUBSCRIBE<br /><span>OUR FEED</span></a>
                </div>

            </div> <!-- end of header -->

            <div id="templatemo_menu">

                <ul>
                    <li><a href="/user/registration/">Registrazione</a> </li> 
                    <li><a href="/user/login/">Login</a> </li>
                    
                </ul>

            </div> <!-- end of templatemo_menu -->

        </div> <!-- end of header wrapper -->

        <div id="templatemo_main_wrapper">
            <div id="templatemo_content_wrapper">

                <div id="templatemo_content">

                    %content%
              
                </div>

                <div id="templatemo_sidebar_one">
                    
                    <h4>User</h4>
                    <ul class="templatemo_list">
                        %auth_user%
                    </ul>

                    <div class="cleaner_h40"></div>
                    
                    <h4>Categories</h4>
                    <ul class="templatemo_list">
                        %category%
                    </ul>

                    <div class="cleaner_h40"></div>

                    <h4>Archives</h4>
                    <ul class="templatemo_list">
                        //archive
                    </ul>

                    <div class="cleaner_h40"></div>

                    <h4>Recent Posts</h4>
                    <div class="recent_comment_box">
                        %recent_post%
                    </div>


                </div>

                <div id="templatemo_sidebar_two">

                    <div class="banner_250x200">
                        <a href="" target="_parent"><img src="%tmpl_dir%images/250x200_banner.jpg" alt="templates" /></a>
                    </div>

                    <div class="banner_125x125">
                        <a href="" target="_parent"><img src="%tmpl_dir%images/templatemo_ads.jpg" alt="web 1" /></a>
                        <a href="" target="_parent"><img src="%tmpl_dir%images/templatemo_ads.jpg" alt="web 2" /></a>
                        <a href="" target="_parent"><img src="%tmpl_dir%images/templatemo_ads.jpg" alt="templates 2" /></a>
                        <a href="" target="_parent"><img src="%tmpl_dir%images/templatemo_ads.jpg" alt="templates 1" /></a>
                    </div>

                    <div class="cleaner_h40"></div>

                    <div class="sidebar_two_box">

                        <h4>Useful Resources</h4>
                        <ul class="templatemo_list">
                            <li><a href="" target="_parent">Free CSS Templates</a></li>
                            <li><a href="" target="_parent">Flash Templates</a></li>
                            <li><a href="" target="_parent">Website Templates</a></li>
                            <li><a href="" target="_parent">Web Design Blog</a></li>
                            <li><a href="" target="_parent">Flash Web Gallery</a></li>
                            <li><a href="#">Curabitur sed lacinia</a></li>
                            <li><a href="#">Vestibulum laoreet tincidunt</a></li>
                            <li><a href="#">Nullam nec mi enim</a></li>
                            <li><a href="#">Aliquam quam nulla</a></li>
                            <li><a href="#">Curabitur non felis massa</a></li>
                        </ul>
                    </div>

                </div>

                <div class="cleaner"></div>
            </div> <!-- end of content wrapper -->
        </div>

        <div id="templatemo_footer_wrapper">
            <div id="templatemo_footer">

                Copyright %year%
            </body>
            </html>