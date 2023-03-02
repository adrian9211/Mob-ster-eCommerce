<?php
?>
<?php
# Set page title
$page_title = "Products";
# Include header file
include('includes/header.php');

?>


<!-- banner -->
<div id="slidey" style="display:none;">

<?php
require_once ("db.php");

        $result = mysqli_query($conn, "SELECT Title, Description, file_name, MovieID, file_name_narrow FROM movies");

echo "<ul>";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            echo "<li>";
            echo "<img src='uploads/".$row['file_name_narrow']."' alt='File from database ".$row['file_name']."' >";
//            echo "<div class='slidey-overlay card-img-top'></div>";
            echo "<div class='banner-text'>";
            echo "<h3 class='title'>" . $row['Title'] . "</h3>";
            echo "<p class='description'>" . $row['Description'] . "</p>";
//            echo "</div>";
            echo "</li>";
        }
echo "</ul>";

?>

</div>
<script src="js/jquery.slidey.js"></script>
<script src="js/jquery.dotdotdot.min.js"></script>
<script type="text/javascript">
    $("#slidey").slidey({
        interval: 8000,
        listCount: 5,
        autoplay: false,
        showList: true
    });
    $(".slidey-list-description").dotdotdot();
</script>
<!-- //banner -->




<!-- banner-bottom -->
<div class="banner-bottom">
    <div class="container">
        <div class="Limelight_agile_banner_bottom_grid">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <?php
                $result = mysqli_query($conn, "SELECT Type, Rating, file_name, Title, MovieID FROM movies");
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<div class='item'>";
                    echo "<div class='Limelightl-movie-gride-agile Limelightl-movie-gride-agile1'>";
                    echo "<a href='single-products.php?MovieID=" . $row['MovieID'] ." ' class='hvr-shutter-out-horizontal card-img-top'><img src='uploads/" . $row['file_name'] . "' title='album-name' class='' alt='File from database ".$row['file_name']."' />
                                <div class='Limelightl-action-icon'><i class='fa fa-play-circle' aria-hidden='true'></i></div>
                                ";
                    echo "</a>";
                    echo "<div class='mid-1 agileits_Limelightlayouts_mid_1_home'>";
                    echo "<div class='Limelightl-movie-text'>";
                    echo "<h6 class='mb-2 fw-bold'>" . $row['Title'] . " </h6>";
                    echo "<h6>" . $row['Type'] . "</h6>";
                    echo "</div>";
                    echo "<div class='mid-2 agile_mid_2_home'>";
                    echo "<div class='block-stars'>";
                    echo "<ul class='Limelightl-ratings'>";
                    echo "<p>" . $row['Rating'] . "</p>";
                    while ($row['Rating'] > 0) {
                        echo "<li><a href='#'><i class='fa fa-star' aria-hidden='true'></i></a></li>";
                        $row['Rating']--;
                    }
                    echo "</ul>";
                    echo "<div class='ribben'>";
                    echo "<p>NEW</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                };

                ?>

            </div>
        </div>
    </div>
</div>
<!-- //banner-bottom -->






<!-- general -->

<div class="general">
    <h4 class="latest-text Limelight_latest_text">All Movies</h4>
    <div class="container">
        <div class="row justify-content-md-center">
                <?php
                $result = mysqli_query($conn, "SELECT Type, Rating, file_name, Title, MovieID FROM movies");
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<div class='col-md-3 col-sm-6 shadow-sm p-3 d-flex flex-column'> ";
                    echo "<a href='single-products.php?MovieID=" . $row['MovieID'] ." ' class='hvr-shutter-out-horizontal card-img-top'><img src='uploads/" . $row['file_name'] . "' title='album-name' class='card-img-top' alt='File from database ".$row['file_name_narrow']."' />
                                <div class='Limelightl-action-icon'><i class='fa fa-play-circle' aria-hidden='true'></i></div>
                                ";
                    echo "</a>";
                    echo "<h6 class='card-title'><a href='single.html' >" . $row['Title'] . " </a></h6>";
                    echo "<h6><a href='single.html'>" . $row['Type'] . "</a></h6>";
                    echo "<div class='mid-2 agile_mid_2_home'>";
                    echo "<div class='block-stars'>";
                    echo "<ul class='Limelightl-ratings'>";
                    echo "<p>" . $row['Rating'] . "</p>";
                    while ($row['Rating'] > 0) {
                        echo "<li><a href='#'><i class='fa fa-star' aria-hidden='true'></i></a></li>";
                        $row['Rating']--;
                    }
                    echo "</ul>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                };
                ?>
        </div>
    </div>
</div>

<!-- general -->




<!-- Latest-tv-series -->
<div class="Latest-tv-series">
    <h4 class="latest-text Limelight_latest_text Limelight_home_popular">Most Popular Movies</h4>
    <div class="container">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="agile_tv_series_grid row ">
                            <div class="col-md-6 agile_tv_series_grid_left">
                                <div class="Limelightls_market_video_grid1">
                                    <img src="images/h1-1.jpg" alt="a " class="img-responsive" />
                                    <a class="Limelight_play_icon" href="#small-dialog">
                                        <span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 agile_tv_series_grid_right">
                                <p class="fexi_header">the conjuring 2</p>
                                <p class="fexi_header_para"><span class="conjuring_Limelight">Story Line<label>:</label></span> 720p,Bluray HD Free Movie Downloads, Watch Free Movies Online with high speed Free Movie Streaming | MyDownloadTube Lorraine and Ed Warren go to north London to help a single...</p>
                                <p class="fexi_header_para"><span>Date of Release<label>:</label></span> Jun 10, 2016 </p>
                                <p class="fexi_header_para">
                                    <span>Genres<label>:</label> </span>
                                    <a href="genres.html">Drama</a> |
                                    <a href="genres.html">Adventure</a> |
                                    <a href="genres.html">Family</a>
                                </p>
                                <p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                </p>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="agileinfo_flexislider_grids row">
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m22.jpg" title="album-name" class="img-responsive" alt="b " />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Assassin's Creed 3</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m2.jpg" title="album-name" class="img-responsive" alt=" c" />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Bad Moms</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m9.jpg" title="album-name" class="img-responsive" alt="d " />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Central Intelligence</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m7.jpg" title="album-name" class="img-responsive" alt=" f" />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Light B/t Oceans</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m11.jpg" title="album-name" class="img-responsive" alt=" e" />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">X-Men</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m17.jpg" title="album-name" class="img-responsive" alt=" g" />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Peter</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="agile_tv_series_grid row">
                            <div class="col-md-6 agile_tv_series_grid_left">
                                <div class="Limelightls_market_video_grid1">
                                    <img src="images/h2-1.jpg" alt=" h" class="img-responsive" />
                                    <a class="Limelight_play_icon1" href="#small-dialog1">
                                        <span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 agile_tv_series_grid_right">
                                <p class="fexi_header">a haunting in cawdor</p>
                                <p class="fexi_header_para"><span class="conjuring_Limelight">Story Line<label>:</label></span> Vivian Miller, sent to a rehabilitation programme for young offenders, where a theatre camp is used as an alternative to jail time. After she views tape ...</p>
                                <p class="fexi_header_para"><span>Date of Release<label>:</label></span> Oct 09, 2015 </p>
                                <p class="fexi_header_para">
                                    <span>Genres<label>:</label> </span>
                                    <a href="genres.html">Thriller</a> |
                                    <a href="genres.html">Horror</a>
                                </p>
                                <p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                </p>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="agileinfo_flexislider_grids row">
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m2.jpg" title="album-name" class="img-responsive" alt="i " />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Bad Moms</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m9.jpg" title="album-name" class="img-responsive" alt="j " />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Central Intelligence</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m7.jpg" title="album-name" class="img-responsive" alt="a " />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Light B/t Oceans</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m11.jpg" title="album-name" class="img-responsive" alt="b " />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">X-Men</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m17.jpg" title="album-name" class="img-responsive" alt=" c" />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Peter</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m21.jpg" title="album-name" class="img-responsive" alt="d " />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">The Jungle Book</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="agile_tv_series_grid row">
                            <div class="col-md-6 agile_tv_series_grid_left">
                                <div class="Limelightls_market_video_grid1">
                                    <img src="images/h3-1.jpg" alt="a " class="img-responsive" />
                                    <a class="Limelight_play_icon2" href="#small-dialog2">
                                        <span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 agile_tv_series_grid_right">
                                <p class="fexi_header">civil war captain America</p>
                                <p class="fexi_header_para"><span class="conjuring_Limelight">Story Line<label>:</label></span> After the Avengers leaves some&nbsp;collateral damage, political pressure mounts to install a system of accountability.&nbsp;The new status quo deeply divides ...</p>
                                <p class="fexi_header_para"><span>Date of Release<label>:</label></span> May 06, 2016 </p>
                                <p class="fexi_header_para">
                                    <span>Genres<label>:</label> </span>
                                    <a href="genres.html">Action</a> |
                                    <a href="genres.html">Adventure</a>
                                </p>
                                <p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                </p>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="agileinfo_flexislider_grids row">
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m2.jpg" title="album-name" class="img-responsive" alt=" b" />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Bad Moms</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m9.jpg" title="album-name" class="img-responsive" alt="c " />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Central Intelligence</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m7.jpg" title="album-name" class="img-responsive" alt=" d" />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Light B/t Oceans</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m11.jpg" title="album-name" class="img-responsive" alt=" e" />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">X-Men</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m17.jpg" title="album-name" class="img-responsive" alt=" f" />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">Peter</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="col-md-2 Limelightl-movie-gride-agile">
                                    <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m20.jpg" title="album-name" class="img-responsive" alt="a " />
                                        <div class="Limelightl-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1 agileits_Limelightlayouts_mid_1_home">
                                        <div class="Limelightl-movie-text">
                                            <h6><a href="single.html">The Secret Life of Pets</a></h6>
                                        </div>
                                        <div class="mid-2 agile_mid_2_home">
                                            <p>2016</p>
                                            <div class="block-stars">
                                                <ul class="Limelightl-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- flexSlider -->
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
            $(window).load(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
        <!-- //flexSlider -->
    </div>
</div>
<!-- pop-up-box -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box -->
<div id="small-dialog" class="mfp-hide">
    <iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
</div>
<div id="small-dialog1" class="mfp-hide">
    <iframe src="https://player.vimeo.com/video/148284736"></iframe>
</div>
<div id="small-dialog2" class="mfp-hide">
    <iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<script>
    $(document).ready(function() {
        $('.Limelight_play_icon,.Limelight_play_icon1,.Limelight_play_icon2').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<!-- //Latest-tv-series -->

<?php
# Include footer
include('includes/footer.php');
?>

