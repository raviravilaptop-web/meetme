<?php
include_once('./login_system/_inc/config.php');
require_once("./counter/vis_counter_cookie.php");
ob_start();
session_start();

$username = null;
$user_email = null;
$uleveldis = null;
$uleveldis = null;
$province = null;
$ministry = null;
$me_Logout = "";
$me_Login = "";

if (!isset($_SESSION['me_user_name'])) {
    $Login = 'Login';
} else {
    $Logout = 'LogOut';
    $username = $_SESSION['me_user_email'];
    $user_email = $_SESSION['me_user_email'];
    $uleveldis = $_SESSION["me_accss_level"];
    $province = $_SESSION["me_province"];
    $ministry = $_SESSION["me_ministry"];
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>

        <!--- basic page needs
        ================================================== -->
        <meta charset="utf-8">
        <title>MeetMe</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="./index_lib/css/base.css">
        <link rel="stylesheet" href="./index_lib/css/vendor.css">
        <link rel="stylesheet" href="./index_lib/css/main.css">
        <!-- script
        ================================================== -->
        <script src="./index_lib/js/modernizr.js"></script>
        <!-- favicons
        ================================================== -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./login_system/libs/awesome-functions.min.js" type="text/javascript"></script>


    </head>
    <body id="top">
        <!-- preloader
          ================================================== -->

        <div id="preloader">
            <div id="loader" class="dots-jump">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

        <!-- header
        ================================================== -->
        <header class="s-header">

            <div class="header-logo">
                <a class="site-logo" href="index.php">
                    <i class="fa fa-handshake fa-fw fa-3x "></i>
                    <img src="images/logo2.png" alt="Homepage" >
                </a>
<?php
if (!isset($_SESSION['me_user_name'])) {
    ?>
                    <a class='dropdown-item'  href='./login_system/index.php'><i class='fas fa-power-off mr-2'></i> <?php echo $Login ?></a>
                    <?php
                } else {
                    ?>
                    <a class='dropdown-item '  href='./logout.php'><i class='fas fa-power-off mr-2'></i> <?php echo $Logout ?></a> 
                    <?php
                }
                ?>
            </div> <!-- end header-logo -->

            <nav class="header-nav">

                <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

                <h3>Navigate to</h3>

                <div class="header-nav__content">

                    <ul class="header-nav__list">
                        <li><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                        <li><a class="smoothscroll"  href="#about" title="about">About</a></li>
                        <li><a class="smoothscroll"  href="#services" title="services">Services</a></li>
                        <li><a class="smoothscroll"  href="#Organization" title="works">Organization</a></li>
                        <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
                        <li><a class="dropdown-item"  href="./login_system/index.php">Login to the System</a></li>
                    </ul>

                    <p>WIT AND GIS <a href='#0'> Unit, </a> Chief Secretory Office. Provincial Council  Complex, A Block,1st floor,  Kurunegala.</p>

                    <ul class="header-nav__social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-behance"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-dribbble"></i></a>
                        </li>
                    </ul>

                </div> <!-- end header-nav__content -->

            </nav> <!-- end header-nav -->

            <a class="header-menu-toggle" href="#0">
                <span class="header-menu-icon"></span>
            </a>

        </header> <!-- end s-header -->


        <!-- home
        ================================================== -->
        <section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="./index_lib/images/hero-bg.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

            <div class="grid-overlay">
                <div></div>
            </div>

            <div class="home-content">

                <div class="row home-content__main">

                    <h1 ><img src="images/province Logo/NWP_logo.png" alt="Homepage" alt="Province Logo" width="140" height="140" class="img-zoomin "> MeetMe  </h1>
                    <h3>
                        The relationship between the Public Services and the people
                    </h3>



                    <div class="home-content__button">
                        <a href="#about" class="smoothscroll btn btn--primary btn--large">
                            Mobile View
                        </a>

<?php
if (!isset($_SESSION['me_user_name'])) {
    ?>
                            <a href="./login_system/index.php" class="btn  btn--large ">
                                Let's Login
                            </a>
    <?php
} else {
    ?>
                            <a href="./dashboard.php"  class=" btn btn--large">
                                Let's Start
                            </a>
    <?php
}
?>
                    </div>

                </div> <!-- end home-content__main -->

                <div class="home-content__scroll">
                    <a href="#about" class="scroll-link smoothscroll">
                        Scroll
                    </a>
                </div>
            </div> <!-- end home-content -->

            <!--            <ul class="home-social">
            
                            <li>
                                <a href="#0" target="_blank" class="facebook"><i class="fa fa-youtube-play" style="font-size:24px;color:red"></i></a>
                            </li>
                            <li>
                                <a href="#0" target="_blank"  class="facebook"><i class="fa fa-facebook-square" style="font-size:24px;color:blue"></i></a>
                            </li>
                            <li>
                                <a href="#0" target="_blank" class="whatsapp"><i class="fa fa-whatsapp" style="font-size:24px;color:#00ff80"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i><span>Facebook</span></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-behance" aria-hidden="true"></i><span>Behance</span></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>
                            </li>
                        </ul>  end home-social -->

        </section> <!-- end s-home -->


        <!-- about
        ================================================== -->
        <section id="about" class="s-about target-section">

            <div class="row section-header bit-narrow" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead">Who We Are</h3>
                    <h1 class="display-1">
                        We are committed to identifying, analyzing, and solving who faced by clients interacting with government services.
                        රජයේ සේවාවන් සමඟ අන්තර් ක්‍රියා කරන සේවාදායකයින් මුහුණ දෙන ගැටළු හඳුනා ගැනීමට, විශ්ලේෂණය කිරීමට සහ විසඳීමට අපි කැපවී සිටිමු.
                    </h1>

                </div>
            </div> <!-- end section-header -->

            <div class="row bit-narrow" data-aos="fade-up">
                <div class="col-full">
                    <p class="lead">
                        The true effectiveness of the public sector can only be measured by the response given by the public who receive the service.
                        Effectiveness must be for the benefit of the public. A more transparent, responsive,
                        and people-centered provincial public service system can be created by increasing trust and engagement between the public and the provincial government 
                        and improving service quality and operational efficiency across government departments. As public officials, we are centrally committed to that productivity.
                    </p>
                    <p class="lead">
                        රාජ්‍ය අංශයේ සැබෑ ඵලදායීතාවය මැනිය හැක්කේ සේවාව ලබා ගත් මහජනතාව විසින් ලබා දෙන ප්‍රතිචාරයෙන් පමණි. 
                        ඵලදායීතාවය මහජනතාවගේ යහපත සඳහා විය යුතුය. මහජනතාව සහ පළාත් රජ්‍ය අතර විශ්වාසය හා සම්බන්ධතාවය වැඩි කිරීම සහ රජයේ දෙපාර්තමේන්තු හරහා සේවා ගුණාත්මකභාවය සහ මෙහෙයුම් කාර්යක්ෂමතාව වැඩි දියුණු කිරීම තුලින් වඩාත් විනිවිද පෙනෙන, ප්‍රතිචාරාත්මක සහ ජනතාව කේන්ද්‍ර කරගත් පළාත් රාජ්‍ය සේවා පද්ධතියක් ඇති කළ හැකිය. 
                        රාජ්‍ය නිලධාරීන් ලෙස අපි කේන්ද්‍රගතව එම ඵලදායීතාවය වෙනුවෙන් කැපවී සිටිමු.
                    </p>
                </div>
            </div> <!-- end about-desc -->

            <div class="row bit-narrow">

                <div class="about-process process block-1-2 block-tab-full">

                    <div class="col-block item-process" data-aos="fade-up">
                        <div class="item-process__text">
                            <h4 class="item-title">Problem Resolution Hub</h4>
                            <p>
                                A dedicated platform for customers to report service-related challenges and receive timely support (online and in-person). This is believed to enable more effective resolution of service-related issues.
                            </p>
                            <p>
                                පාරිභෝගිකයින්ට සේවා ආශ්‍රිත අභියෝග වාර්තා කිරීමට සහ කාලෝචිත සහාය ලබා ගැනීමට කැපවූ වේදිකාවක් (මාර්ගගතව සහ පෞද්ගලිකව). මෙමඟින් සේවා ආශ්‍රිත ගැටළු වඩාත් ඵලදායී ලෙස විසඳීමට හැකි බව විශ්වාස කෙරේ.
                            </p>
                        </div>
                    </div>
                    <div class="col-block item-process" data-aos="fade-up">
                        <div class="item-process__text">
                            <h4 class="item-title">Advisory and Support Team</h4>
                            <p>
                                A team of experts assigned to assess issues, provide solutions, and offer guidance on navigating public service processes.
                            </p>
                            <p>
                                ගැටළු තක්සේරු කිරීම, විසඳුම් ලබා දීම සහ රාජ්‍ය සේවා ක්‍රියාවලීන් සැරිසැරීම පිළිබඳ මග පෙන්වීම සඳහා පවරා ඇති විශේෂඥ කණ්ඩායමක්.
                            </p>
                        </div>
                    </div>
                    <div class="col-block item-process" data-aos="fade-up">
                        <div class="item-process__text">
                            <h4 class="item-title">Public Feedback Mechanism</h4>
                            <p>
                                Regular surveys and consultations to gather insights from citizens and stakeholders to improve service quality.
                            </p>
                            <p>
                                සේවා ගුණාත්මකභාවය වැඩිදියුණු කිරීම සඳහා පුරවැසියන්ගෙන් සහ කොටස්කරුවන්ගෙන් අදහස් රැස් කිරීම සඳහා නිතිපතා සමීක්ෂණ සහ උපදේශන.
                            </p>
                        </div>
                    </div>
                    <div class="col-block item-process" data-aos="fade-up">
                        <div class="item-process__text">
                            <h4 class="item-title">Collaboration</h4>
                            <p>
                                Collaboration with Provincial Departments – Direct coordination with relevant government institutions to address policy and operational concerns efficiently.
                            </p>
                            <p>
                                පළාත් දෙපාර්තමේන්තු සමඟ සහයෝගීතාවය - ප්‍රතිපත්තිමය සහ මෙහෙයුම් ගැටළු කාර්යක්ෂමව විසඳීම සඳහා අදාළ රාජ්‍ය ආයතන සමඟ සෘජු සම්බන්ධීකරණය.
                            </p>
                        </div>
                    </div>
                    <div class="col-block item-process" data-aos="fade-up">
                        <div class="item-process__text">
                            <h4 class="item-title">Monitoring and Evaluation</h4>
                            <p>
                                A structured framework to track reported issues, measure resolution effectiveness, and continuously improve service standards.
                            </p>
                            <p>
                                වාර්ථා වූ ගැටළු නිරීක්ෂණය කිරීම, විසඳුම් කාර්යක්ෂමතාව මැනීම සහ සේවා ප්‍රමිතීන් අඛණ්ඩව වැඩිදියුණු කිරීම සඳහා ව්‍යුහගත රාමුවකි.
                            </p>
                        </div>
                    </div>
                </div> <!-- end process -->
            </div> <!-- end row -->
        </section> <!-- end s-about -->
        <!-- about
        ================================================== -->




        <section id="Organization" class="s-about target-section">
            <div class="row section-header bit-narrow" data-aos="fade-up">
                <div class="col-full">

                    <div id="fontSizeWrapper">
                        <label for="fontSize">Font size</label>
                        <input type="range" value="1" id="fontSize" step="0.5" min="0.5" max="5" />
                    </div>



                    <div class="col-full">
                        <h3 class="subhead">Organization Chart</h3>
                        <h1 class="display-1">North Western Province</h1>
                    </div>
                    <ul class="tree">

                        <li>
                            <input type="checkbox"  id="c1" />
                            <label class="tree_label" for="c1">Chief Secretary</label>
                            <ul>
                                <input type="checkbox"  id="psc" />
                                <label class="tree_label" for="psc">Public Service Commission</label> 
                            </ul>
                            <ul>
                                <input type="checkbox"  id="gs" />
                                <label class="tree_label" for="gs">Governor's secretariat</label> 
                                <ul>
                                    <li><span class="tree_label">Governor's Residence</span></li>
                                </ul>
                            </ul>
                            <ul>
                                <input type="checkbox"  id="cs" />
                                <label class="tree_label" for="cs">Council Secretariat</label> 
                            </ul>
                            <!--============================== Chief Ministry =======================================-->  
                            <ul>
                                <input type="checkbox"  id="cm" />
                                <label class="tree_label" for="cm">Chief Ministry</label> 
                                <ul>
                                    <input type="checkbox"  id="dlg" />
                                    <label class="tree_label" for="dlg">Department of Local Government</label> 
                                    <ul>
                                        <li><span class="tree_label">Municipal Council</span></li>
                                        <li><span class="tree_label">Urban Councils x2</span></li>
                                        <li><span class="tree_label">Pradeshiya Sabha x 29</span></li>
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="de" />
                                    <label class="tree_label" for="de">Department of Provincial Education</label> 
                                    <ul>
                                        <input type="checkbox"  id="zeo" />
                                        <label class="tree_label" for="zeo">Zonal Education Office</label> 
                                        <ul>
                                            <input type="checkbox"  id="ch" />
                                            <label class="tree_label" for="ch">Chilaw</label> 
                                            <ul>
                                                <li><span class="tree_label">Schools (159)</span></li>
                                            </ul>
                                        </ul>
                                        <ul>
                                            <input type="checkbox"  id="gir" />
                                            <label class="tree_label" for="gir">Giriulla </label> 
                                            <ul>
                                                <li><span class="tree_label">Schools (137)</span></li>
                                            </ul>
                                        </ul>
                                        <ul>
                                            <input type="checkbox"  id="ibba" />
                                            <label class="tree_label" for="ibba">Ibbagamuwa</label> 
                                            <ul>
                                                <li><span class="tree_label">Schools (109)</span></li>
                                            </ul>
                                        </ul>
                                        <ul>
                                            <input type="checkbox"  id="kuli" />
                                            <label class="tree_label" for="kuli">Kuliyapitiya</label> 
                                            <ul>
                                                <li><span class="tree_label">Schools (166)</span></li>
                                            </ul>
                                        </ul>
                                        <ul>
                                            <input type="checkbox"  id="kuru" />
                                            <label class="tree_label" for="kuru">Kurunegala</label> 
                                            <ul>
                                                <li><span class="tree_label">Schools (119)</span></li>
                                            </ul>
                                        </ul>
                                        <ul>
                                            <input type="checkbox"  id="mh" />
                                            <label class="tree_label" for="mh">Maho</label> 
                                            <ul>
                                                <li><span class="tree_label">Schools (188)</span></li>
                                            </ul>
                                        </ul>
                                        <ul>
                                            <input type="checkbox"  id="niw" />
                                            <label class="tree_label" for="niw">Nikaweratiya</label> 
                                            <ul>
                                                <li><span class="tree_label">Schools (160)</span></li>
                                            </ul>
                                        </ul>
                                        <ul>
                                            <input type="checkbox"  id="pttm" />
                                            <label class="tree_label" for="pttm">Puttalam</label> 
                                            <ul>
                                                <li><span class="tree_label">Schools (205)</span></li>
                                            </ul>
                                        </ul>
                                    </ul>
                                    <ul>
                                        <input type="checkbox"  id="eti" />
                                        <label class="tree_label" for="eti">Education Training Institutes</label> 
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="dpe" />
                                    <label class="tree_label" for="dpe">Department of Provincial Engineering</label> 
                                    <ul>
                                        <li><span class="tree_label">Divisional Engineering Office</span></li>
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="rwsu" />
                                    <label class="tree_label" for="rwsu">Rural Water Supply & Environmental Sanitatoin Unit</label> 
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="ath" />
                                    <label class="tree_label" for="ath">Authorites</label> 
                                    <ul>
                                        <li><span class="tree_label">Wayamba Development Authority</span></li>
                                        <li><span class="tree_label">Machinery Equipment Authority</span></li>
                                        <li><span class="tree_label">Environmental Authority</span></li>
                                        <li><span class="tree_label">Industrial Services Bureau</span></li>
                                        <li><span class="tree_label">Human Recourse Development Authority</span></li>
                                        <li><span class="tree_label">Early Childhood Development Authority</span></li>
                                    </ul>
                                </ul>
                            </ul>

                            <!--============================== Chief Road =======================================-->  
                            <ul>
                                <input type="checkbox"  id="mr" />
                                <label class="tree_label" for="mr">Ministry of Road,Transport,Housing & Construction,Industrrial & Rural Development</label> 
                                <ul>
                                    <input type="checkbox"  id="dhc" />
                                    <label class="tree_label" for="dhc">Department of Housisng & Construction</label> 
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="dprd" />
                                    <label class="tree_label" for="dprd">Department of Provincial Road Development</label> 
                                    <ul>
                                        <input type="checkbox"  id="deo" />
                                        <label class="tree_label" for="deo">Divisional Engineer's Office x</label> 
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="did" />
                                    <label class="tree_label" for="did">Department of Industrial Development</label> 
                                    <ul>
                                        <li><span class="tree_label">Carpenter School</span></li>
                                        <li><span class="tree_label">Centers x</span></li>
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="doprd" />
                                    <label class="tree_label" for="doprd">Department of Provincial Rural Development</label>  
                                    <ul>
                                        <li><span class="tree_label">Training Centre - Atamune</span></li>
                                    </ul>
                                </ul>
                            </ul>
                            <!--============================== Chief o-operative Development =======================================-->  
                            <ul>
                                <input type="checkbox"  id="mco" />
                                <label class="tree_label" for="mco">Ministry of Co-operative Development & Trade, Land, Electricity & Energy,Sports And Yourth Affairs, Cultural & Art & Information Technology</label> 
                                <ul>
                                    <input type="checkbox"  id="doplc" />
                                    <label class="tree_label" for="doplc">Department of Provincial Land Commissioner </label> 
                                </ul>                            
                                <ul>
                                    <input type="checkbox"  id="pcoec" />
                                    <label class="tree_label" for="pcoec">Provincial Co-operative Employee's Commission </label> 
                                </ul>                            
                                <ul>
                                    <input type="checkbox"  id="dpcod" />
                                    <label class="tree_label" for="dpcod">Department of Provincial Co-operative Development </label> 
                                    <ul>
                                        <input type="checkbox"  id="acmo" />
                                        <label class="tree_label" for="acmo">Assistant Commissioner’s Office x 2 </label> 
                                    </ul>   
                                    <ul>
                                        <input type="checkbox"  id="caun" />
                                        <label class="tree_label" for="caun">Culture Affairs Unit </label> 
                                    </ul>   
                                    <ul>
                                        <input type="checkbox"  id="copi" />
                                        <label class="tree_label" for="copi">Cooperative Provincial Institutes </label> 
                                    </ul>   
                                </ul>                            
                                <ul>
                                    <input type="checkbox"  id="yas" />
                                    <label class="tree_label" for="yas">Youth Affairs & Sports Unit </label> 
                                </ul>                            
                                <ul>
                                    <input type="checkbox"  id="cau" />
                                    <label class="tree_label" for="cau">Culture Affairs Unit </label> 
                                </ul>                            
                            </ul>
                            <!--============================== Chief o-operative Agriculture =======================================-->  
                            <ul>
                                <input type="checkbox"  id="mag" />
                                <label class="tree_label" for="mag">Provincial Ministry of Agriculture, Lands, Irrigation Fisheries, Animal Product & Health & Agrarian Development</label> 
                                <ul>
                                    <input type="checkbox"  id="dpagre" />
                                    <label class="tree_label" for="dpagre">Department of Provincial Agriculture</label> 
                                    <ul>
                                        <input type="checkbox"  id="irso" />
                                        <label class="tree_label" for="irso">Agriculture Sub Offices</label> 
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="dpi" />
                                    <label class="tree_label" for="dpi">Department of Provincial Irrigation</label> 
                                    <ul>
                                        <input type="checkbox"  id="irsoff" />
                                        <label class="tree_label" for="irsoff">Irrigation Sub Offices</label> 
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="daph" />
                                    <label class="tree_label" for="daph">Department of Animal Production and Health</label> 
                                    <ul>
                                        <input type="checkbox"  id="zoff" />
                                        <label class="tree_label" for="zoff">Zonel Offices</label> 
                                    </ul>
                                    <ul>
                                        <input type="checkbox"  id="wgmf" />
                                        <label class="tree_label" for="wgmf">Wannigama Farm</label> 
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="funit" />
                                    <label class="tree_label" for="funit">Fisheries Unit</label> 
                                    <ul>
                                        <input type="checkbox"  id="rrda" />
                                        <label class="tree_label" for="rrda">Regional Recourses Development Authority</label> 
                                    </ul>
                                </ul>
                            </ul>
                            <!--============================== Chief o-operative Health =======================================-->  
                            <ul>
                                <input type="checkbox"  id="mhea" />
                                <label class="tree_label" for="mhea">Ministry of Provincial Health,Indigenous Medicine, Social Welfare, Probationary & Child Care, Women's Affair & Council Affairs</label> 
                                <ul>
                                    <input type="checkbox"  id="dphe" />
                                    <label class="tree_label" for="dphe">Department of Provincial Health </label>                                     <ul>
                                        <input type="checkbox"  id="rhokuru" />
                                        <label class="tree_label" for="rhokuru">Regional Health Offices - Kurunegala </label> 
                                        <ul>
                                            <li><span class="tree_label">MOH Offices </span></li>
                                        </ul>
                                        <ul>
                                            <li><span class="tree_label">Base Hospitals </span></li>
                                        </ul>
                                        <ul>
                                            <li><span class="tree_label">Other Hospitals </span></li>
                                        </ul>
                                        <ul>
                                            <li><span class="tree_label">Other Units </span></li>
                                        </ul>
                                    </ul>
                                    <ul>
                                        <input type="checkbox"  id="rhopttm" />
                                        <label class="tree_label" for="rhopttm">Regional Health Offices - Puttlam </label> 
                                        <ul>
                                            <li><span class="tree_label">MOH Offices </span></li>
                                        </ul>
                                        <ul>
                                            <li><span class="tree_label">Base Hospitals </span></li>
                                        </ul>
                                        <ul>
                                            <li><span class="tree_label">Other Hospitals </span></li>
                                        </ul>
                                        <ul>
                                            <li><span class="tree_label">Other Units </span></li>
                                        </ul>
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="dpser" />
                                    <label class="tree_label" for="dpser">Department of Provincial Social Services </label>  
                                    <ul>
                                        <input type="checkbox"  id="socialsub" />
                                        <label class="tree_label" for="socialsub">Sub Offices </label> 
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="dppccs" />
                                    <label class="tree_label" for="dppccs">Department of Provincial Probation and Child Care Services </label> 
                                    <ul>
                                        <input type="checkbox"  id="socialdo" />
                                        <label class="tree_label" for="socialdo">Distrct Offices</label> 
                                    </ul>
                                    <ul>
                                        <input type="checkbox"  id="ccc" />
                                        <label class="tree_label" for="ccc">Child Care Centers </label> 
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="dopay" />
                                    <label class="tree_label" for="dopay">Department of Provincial Ayurveda </label> 
                                    <ul>
                                        <li><span class="tree_label">Drugs Manufacturing Unit</span></li>
                                    </ul>
                                    <ul>
                                        <li><span class="tree_label">DB Welagedara Hospitals</span></li>
                                    </ul>
                                    <ul>
                                        <li><span class="tree_label">Other Hospitals</span></li>
                                    </ul>
                                </ul>

                            </ul>

                            <!--============================== Chief Secretary Office =======================================-->
                            <ul>
                                <input type="checkbox"  id="cso" />
                                <label class="tree_label" for="cso">Chief Secretary Office</label> 
                                <ul>
                                    <input type="checkbox"  id="ad" />
                                    <label class="tree_label" for="ad">Administration Division</label> 
                                    <ul>
                                        <li><span class="tree_label">Legal Unit</span></li>
                                    </ul>
                                    <ul>
                                        <li><span class="tree_label">Statistical Unit</span></li>
                                    </ul>
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="dpr" />
                                    <label class="tree_label" for="dpr">Department of Provincial Revenue</label> 
                                </ul>
                                <ul>
                                    <input type="checkbox"  id="dia" />
                                    <label class="tree_label" for="dia">Department of Internal Audit</label> 
                                </ul>

                                <!--============================== Deputy Chief Secretery (Planning) =======================================-->
                                <ul>
                                    <input type="checkbox"  id="dcsp" />
                                    <label class="tree_label" for="dcsp">Deputy Chief Secretery (Planning)</label> 
                                    <ul>
                                        <li><span class="tree_label">Planning and Monitoring (MIS)</span></li>
                                    </ul>
                                </ul>
                                <!--============================== Deputy Chief Secretery (Finance) =======================================-->
                                <ul>
                                    <input type="checkbox"  id="dcsf" />
                                    <label class="tree_label" for="dcsf">Deputy Chief Secretery (Finance)</label> 
                                    <ul>
                                        <li><span class="tree_label"> Payment / Budget and Provincial Revenue</span></li>
                                    </ul>
                                </ul>
                                <!--============================== Deputy Chief Secretery (Engineering) =======================================-->
                                <ul>
                                    <input type="checkbox"  id="dcef" />
                                    <label class="tree_label" for="dcef">Deputy Chief Secretery (Engineering Service)</label> 
                                    <ul>
                                        <li><span class="tree_label">Quality Control Laboratory</span></li>
                                        <li><span class="tree_label">Maintaining Unit</span></li>
                                    </ul>
                                </ul>
                                <!--============================== Deputy Chief Secretery (Training) =======================================-->
                                <ul>
                                    <input type="checkbox"  id="dcet" />
                                    <label class="tree_label" for="dcet">Deputy Chief Secretery (Training)</label> 
                                    <ul>
                                        <li><span class="tree_label">Wayamba Training Unit</span></li>
                                    </ul>
                                </ul>
                            </ul>

                        </li>



                        <!--  <li>
                            <input type="checkbox" id="c5" />
                            <label class="tree_label" for="c5">Level 0</label>
                            <ul>
                              <li>
                                <input type="checkbox" id="c6" />
                                <label for="c6" class="tree_label">Level 1</label>
                                <ul>
                                  <li><span class="tree_label">Level 2</span></li>
                                </ul>
                              </li>
                              <li>
                                <input type="checkbox" id="c7" />
                                <label for="c7" class="tree_label">Level 1</label>
                                <ul>
                                  <li><span class="tree_label">Level 2</span></li>
                                  <li>
                                    <input type="checkbox" id="c8" />
                                    <label for="c8" class="tree_label">Level 2</label>
                                    <ul>
                                      <li><span class="tree_label">Level 3</span></li>
                                    </ul>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>-->
                    </ul>

                </div>
            </div>

        </div>
    </div>
</section> <!-- end s-about -->

<!-- services
================================================== -->
<section id='services' class="s-services target-section darker">

    <div class="row section-header bit-narrow" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">What we do</h3>
            <h1 class="display-1">
                A dedicated platform (online and in-person) where clients can report service-related challenges and receive timely assistance.
            </h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row bit-narrow services block-1-2 block-tab-full">

        <div class="col-block item-service" data-aos="fade-up">
            <div class="item-service__icon">
                <i class="icon-star"></i>
            </div>
            <div class="item-service__text">
                <h3 class="item-title">public Service</h3>
                <p>Foster collaboration between government Services and the public to create a more citizen-centric approach and Improving the efficiency and responsiveness of provincial public services
                </p>
            </div>
        </div>

        <div class="col-block item-service" data-aos="fade-up">
            <div class="item-service__icon">
                <i class="icon-group"></i>
            </div>
            <div class="item-service__text">
                <h3 class="item-title">Public Staff</h3>
                <p>Providing Public staff with clear solutions to administrative, procedural, and service-related issues and Enhance transparency and accountability in public service operations.
                </p>
            </div>
        </div>


    </div> <!-- end services -->

</section> <!-- end s-services -->


<!-- works
================================================== -->



<!-- clients
================================================== -->
<section id="clients" class="s-clients target-section darker">

    <div class="grid-overlay">
        <div></div>
    </div>

    <div class="row section-header text-center narrow" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">Our Clients</h3>
            <h1 class="display-1">Who we have work with</h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row clients-wrap" data-aos="fade-up">
        <div class="col-twelve">
            <ul class="clients">
                <li><a href="#0">Statutory Institution</a></li>
                <li><a href="#0">Provincial Ministries</a></li>
                <li><a href="#0">Departments</a></li>
                <li><a href="#0">Zonal Office</a></li>
                <li><a href="#0">Sub Office</a></li>

            </ul>
        </div>
    </div>

</section> <!-- end s-clients -->


<!-- testimonies
================================================== -->
<section class="s-testimonials">
    <!--
                <div class="testimonials__icon" data-aos="fade-up"></div>
    
                <div class="row testimonials narrow">
    
                    <div class="col-full testimonials__slider" data-aos="fade-up">
    
                        <div class="testimonials__slide">
                            <p>Qui ipsam temporibus quisquam vel. Maiores eos cumque distinctio nam accusantium ipsum. 
                                Laudantium quia consequatur molestias delectus culpa facere hic dolores aperiam. Accusantium quos qui praesentium corpori.</p>
                            <div class="testimonials__author">
                                Tim Cook
                                <span>CEO, Apple</span>
                            </div>
                        </div>  end testimonials__slide 
    
                        <div class="testimonials__slide">
                            <p>Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat voluptas animi adipisci.
                                Nisi eaque consequatur. Quasi voluptas eius distinctio. Atque eos maxime. Qui ipsam temporibus quisquam vel.</p>
                            <div class="testimonials__author">
                                Sundar Pichai
                                <span>CEO, Google</span>
                            </div>
                        </div>  end testimonials__slide 
    
                        <div class="testimonials__slide">
                            <p>Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea quia nesciunt. Ducimus aut sed ipsam.  
                                Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas eius distinctio.</p>
                            <div class="testimonials__author">
                                Satya Nadella
                                <span>CEO, Microsoft</span>
                            </div>
                        </div>  end testimonials__slide 
    
                    </div>  end testimonials__slider 
    
                </div>  end testimonials -->

</section> <!-- end s-testimonials -->





<!-- contact
================================================== -->
<section id="contact" class="s-contact target-section">

    <div class="grid-overlay">
        <div></div>
    </div>

    <div class="row section-header narrow" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">Keep In Touch</h3>
            <h1 class="display-1">Feel free to contact us for idea or collaboration</h1>
        </div>
    </div> <!-- end section-header -->

    <div class="row contact-main" data-aos="fade-up">
        <div class="col-full">
            <p class="contact-email">
                <a href="mailto:#0">http://www.cs.nw.gov.lk/</a>
            </p>
            <p class="contact-address">
                Provincial Council Complex,A Block, 1st floor.<br>
                Kurunegala, Sri Lanka 
            </p>
            <p class="contact-numbers">
                037-2231769/72 &nbsp; 037-2223777
            </p>

            <ul class="contact-social">
                <li>
                    <a href="#0"><i class="fab fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fab fa-behance"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fab fa-dribbble"></i></a>
                </li>
            </ul>
        </div>
    </div>

</section> <!-- end s-contact -->


<!-- footer
================================================== -->
<footer>
    <div class="row">
        <div class="col-full ss-copyright">
            <span>Copyright © 2025 Wayamba. All rights reserved. </span> 
            <span>Design by <a href="#">Wayamba Information Technology And GIS unit</a></span>
            <span>Re-Distributed by <a href="#">Chief Secretory Office</a></span>
        </div>
    </div>

    <div class="ss-go-top">
        <a class="smoothscroll" title="Back to Top" href="#top">Back to Top</a>
    </div>
</footer>


<!-- photoswipe background
================================================== -->
<div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">

        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                                                                                                                                        "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                                                                                                                                        "Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                                                                                                                         "Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>

    </div>

</div> <!-- end photoSwipe background -->


<!-- Java Script
================================================== -->
<script src="./index_lib/js/jquery-3.2.1.min.js"></script>
<script src="./index_lib/js/plugins.js"></script>
<script src="./index_lib/js/main.js"></script>    
<script type="text/javascript"></script>    

<style>


    #fontSizeWrapper { font-size: 16px; }

    #fontSize {
        width: 100px;
        font-size: 1em;
    }

    /* ————————————————————–
      Tree core styles
    */
    .tree { margin: 1em; }

    .tree input {
        position: absolute;
        clip: rect(0, 0, 0, 0);
    }

    .tree input ~ ul { display: none; }

    .tree input:checked ~ ul { display: block; }

    /* ————————————————————–
      Tree rows
    */
    .tree li {
        line-height: 1.2;
        position: relative;
        padding: 0 0 1em 1em;
    }

    .tree ul li { padding: 1em 0 0 1em; }

    .tree > li:last-child { padding-bottom: 0; }

    /* ————————————————————–
      Tree labels
    */
    .tree_label {
        position: relative;
        display: inline-block;
        /*background: #000;*/
    }

    label.tree_label { cursor: pointer; }

    label.tree_label:hover { color: #666; }

    /* ————————————————————–
      Tree expanded icon
    */
    label.tree_label:before {
        /*background: #000;*/
        color: #fff;
        position: relative;
        z-index: 1;
        float: left;
        margin: 0 1em 0 -2em;
        width: 1em;
        height: 1em;
        border-radius: 1em;
        content: '+';
        text-align: center;
        line-height: .9em;
    }

    :checked ~ label.tree_label:before { content: '–'; }

    /* ————————————————————–
      Tree branches
    */
    .tree li:before {
        position: absolute;
        top: 0;
        bottom: 0;
        left: -.5em;
        display: block;
        width: 0;
        border-left: 1px solid #777;
        content: "";
    }

    .tree_label:after {
        position: absolute;
        top: 0;
        left: -1.5em;
        display: block;
        height: 0.5em;
        width: 1em;
        border-bottom: 1px solid #777;
        border-left: 1px solid #777;
        border-radius: 0 0 0 .3em;
        content: '';
    }

    label.tree_label:after { border-bottom: 0; }

    :checked ~ label.tree_label:after {
        border-radius: 0 .3em 0 0;
        border-top: 1px solid #777;
        border-right: 1px solid #777;
        border-bottom: 0;
        border-left: 0;
        bottom: 0;
        top: 0.5em;
        height: auto;
    }

    .tree li:last-child:before {
        height: 1em;
        bottom: auto;
    }

    .tree > li:last-child:before { display: none; }

    .tree_custom {
        display: block;
        background: #fff;
        padding: 1em;
        border-radius: 0.3em;
    }
</style>

</body>
</html>
