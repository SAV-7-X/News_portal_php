<?php
require "getnews.php"
?>
<!DOCTYPE html>
<!--
	24 News by FreeHTML5.co
	Twitter: https://twitter.com/fh5co
	Facebook: https://fb.com/fh5co
	URL: https://freehtml5.co
-->
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>24 News — Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
    <link href="css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="css/style_1.css" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="js/modernizr-3.5.0.min.js"></script>
</head>
<body>
<div class="container-fluid fh5co_header_bg">
    <div class="container">
        <div class="row">
            <div class="col-12 fh5co_mediya_center"><a href="#" class="color_fff fh5co_mediya_setting"><i
            class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;<span id="day"></span>, <span id="cdate"></span> <span id="month"></span> <span id="year"></span></a>
                <div class="d-inline-block fh5co_trading_posotion_relative"><a href="#" class="treding_btn">Trending</a>
                    <div class="fh5co_treding_position_absolute"></div>
                </div>
                <a href="#" class="color_fff fh5co_mediya_setting"><?php echo htmlspecialchars($trending_title); ?></a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <img src="images/logo.png" alt="img" class="fh5co_logo_width"/>
            </div>
            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-search"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://twitter.com/fh5co" target="_blank" class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div></a>
                </div>
                <div class="text-center d-inline-block">
                    <a href="https://fb.com/fh5co" target="_blank" class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div></a>
                </div>
                <!--<div class="d-inline-block text-center"><img src="images/country.png" alt="img" class="fh5co_country_width"/></div>-->
                <div class="d-inline-block text-center dd_position_relative ">
                    <select class="form-control fh5co_text_select_option">
                        <option>English </option>
                        <option>French </option>
                        <option>German </option>
                        <option>Spanish </option>
                    </select>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                 
                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="" id="dropdownMenuButton2" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">Categories<span class="sr-only">(current)</span></a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
        <?php foreach ($categories as $category): ?>
            <a class="dropdown-item" href="blog.php?category_id=<?php echo htmlspecialchars($category['id']); ?>">
                <?php echo htmlspecialchars($category['name']); ?>
            </a>
        <?php endforeach; ?>
    </div>
</li>
                 
                    <li class="nav-item ">
                        <a class="nav-link" href="Contact_us.html">Contact <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="Contact_us.html">User Register/login <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="login.html">Admin Login <span class="sr-only">(current)</span></a>
                    </li>
                  
                </ul>
            </div>
        </nav>
    </div>
</div>

<?php
require 'db_connection.php';

// Get the category ID from the URL
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// Fetch news articles based on the category ID
$sql = "SELECT * FROM articles WHERE category_id = ? AND status = 'published' ORDER BY date DESC LIMIT 7";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();

$category_news = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $category_news[] = $row;
    }
}

// Fetch categories
$sql = "SELECT * FROM categories ORDER BY name DESC LIMIT 10";
$result = $conn->query($sql);

$categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Fetch old news for the most popular section
$sql = "SELECT * FROM articles WHERE status = 'published' ORDER BY date ASC LIMIT 4";
$result = $conn->query($sql);

$old_news = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $old_news[] = $row;
    }
}

$conn->close();
?>


<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                <?php if (!empty($category_news)): ?>
                    <?php foreach ($category_news as $news): ?>
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img">
                                    <img src="<?php echo htmlspecialchars($news['image']); ?>" alt="<?php echo htmlspecialchars($news['title']); ?>"/>
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="single.php?id=<?php echo htmlspecialchars($news['id']); ?>" class="fh5co_magna py-2">
                                <?php echo htmlspecialchars($news['title']); ?>
                            </a>
                            <a href="#" class="fh5co_mini_time py-3">
                                <?php echo date('F d, Y', strtotime($news['date'])); ?>
                            </a>
                            <div class="fh5co_consectetur">
                                <?php echo htmlspecialchars(substr($news['para1'], 0, 150)) . '...'; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No news articles found in this category.</p>
                <?php endif; ?>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <?php foreach ($categories as $category): ?>
                    <a href="?category_id=<?php echo htmlspecialchars($category['id']); ?>" class="fh5co_tagg"><?php echo htmlspecialchars($category['name']); ?></a>
                    <?php endforeach; ?>
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <?php foreach ($old_news as $news): ?>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="<?php echo htmlspecialchars($news['image']); ?>" alt="<?php echo htmlspecialchars($news['title']); ?>" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font">
                            <?php echo htmlspecialchars(substr($news['title'], 0, 50)) . '...'; ?>
                        </div>
                        <div class="most_fh5co_treding_font_123">
                            <?php echo date('F d, Y', strtotime($news['date'])); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            <?php foreach ($trending_news as $news): ?>
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img">
                        <img src="<?php echo htmlspecialchars($news['image']); ?>" alt="" class="fh5co_img_special_relative"/>
                    </div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="single.php?id=<?php echo htmlspecialchars($news['id']); ?>" class="text-white">
                            <?php echo htmlspecialchars($news['title']); ?>
                        </a>
                        <div class="fh5co_latest_trading_date_and_name_color">
                            <?php echo htmlspecialchars($news['date']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="images/white_logo.png" alt="img" class="footer_logo"/></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3"> About</div>
                <div class="footer_sub_about pb-3">
                    Welcome to our news portal, your trusted source for timely and accurate information. We are committed to delivering high-quality journalism, covering a wide range of topics from local events to global affairs. Our team of experienced reporters and editors work tirelessly to bring you the most relevant and impactful stories, ensuring you stay informed in today's fast-paced world.
                </div>
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a href="#" class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a href="#" class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a href="#" class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a href="#" class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3"> Categories</div>
                <ul class="footer_menu">
                    <?php foreach ($categories as $category): ?>
                    <li><a href="blog.php?categpry_id=<?php echo htmlspecialchars($category['id']); ?>" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; <?php echo htmlspecialchars($category['name']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                <div class="footer_main_title py-3"> Most Viewed Posts</div>
                <div class="footer_makes_sub_font"> Dec 31, 2016</div>
                <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
                <div class="footer_makes_sub_font"> Dec 31, 2016</div>
                <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
                <div class="footer_makes_sub_font"> Dec 31, 2016</div>
                <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
                <div class="footer_position_absolute"><img src="images/footer_sub_tipik.png" alt="img" class="width_footer_sub_img"/></div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 ">
                <div class="footer_main_title py-3"> Latest Articles</div>
                <?php 
$count = 0; // Initialize a counter

foreach ($trending_news as $article): 
    if ($count >= 9) {
        break; // Exit the loop after 9 iterations
    }
    ?>
    <a href="single.html?id=<?php echo htmlspecialchars($article['id']); ?>" class="footer_img_post_6">
        <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>"/>
    </a>
    <?php 
    $count++; // Increment the counter
endforeach; 
?>

            </div>
        </div>
        <div class="row justify-content-center pt-2 pb-4">
            <div class="col-12 col-md-8 col-lg-7 ">
                <div class="input-group">
                    <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control fh5co_footer_text_box" placeholder="Enter your email..." aria-describedby="basic-addon1">
                    <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Subscribe</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 py-4 Reserved"> © Copyright 2018, All rights reserved. Design by <a href="https://freehtml5.co" title="Free HTML5 Bootstrap templates">FreeHTML5.co</a>. </div>
            <div class="col-12 col-md-6 spdp_right py-4">
                <a href="index.html" class="footer_last_part_menu">Home</a>
                <a href="Contact_us.html" class="footer_last_part_menu">About</a>
                <a href="Contact_us.html" class="footer_last_part_menu">Contact</a>
                <a href="blog.html" class="footer_last_part_menu">Latest News</a></div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
<script>
    const date = new Date();
    day  = date.getDay();
    cdate = date.getDate();
    month = date.getMonth() + 1;
    year = date.getFullYear();
    const dayofweek = ['Sunday' , 'Monday' , 'Tuesday' , 'Wednesday' , 'Thursday' , 'Friday' , 'Saturday'];
   console.log(dayofweek[day]);
   const monthofYear  = ['January', 'February','March','April','May', 'June','July','August','September','October','November','December'];
   document.getElementById('day').innerText = dayofweek[day];
   document.getElementById('cdate').innerText = cdate;
   document.getElementById('month').innerText = monthofYear[month - 1];
   document.getElementById('year').innerText = year;
</script>
</body>
</html>