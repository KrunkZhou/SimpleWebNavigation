<?

/**
 * Krunk.cn Portal - 网址导航
 * 
 * GitHub: https://github.com/KrunkZhou/KBlog
 * 
 * @author     Krunk Zhou
 * @copyright  2019 Krunk Zhou (https://krunk.cn)
 */

function get_file($file){
    $data=file_get_contents($file);
    $linkList=array();
    $lines=explode("\n",$data);
    foreach ($lines as $line) {
        if (strlen($line)==0) continue;
        $detail = str_replace("\r", '', $line);
        array_push($linkList, $detail);
    }
    return $linkList;
}

function echo_link($list){
    for ($x = 0; $x <= count($list); $x++) {
        if ($list[$x]=="box"){
            $x++;
            echo '<section class="item card-box" id="row-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="item-tit">
                            <strong><i class="'.$list[$x+1].'"></i>'.$list[$x].'</strong>
                        </div>
                        <div class="clearfix two-list-box">
                        ';
            $x++;
            
        }else if ($list[$x]=="endbox"){
            echo '</div></div></div></section>';
        }else if ($list[$x]!=""){
            echo '<div class="col-md-3 col-sm-4 col-xs-6">
                                <a href="'.$list[$x+1].'" class="card-link" target="_blank">
                                <div class="card-tit">'.$list[$x].'</div>
                                <div class="card-desc">'.$list[$x+1].'</div>
                                </a>
                            </div>';
            $x++;
        }
    }
}

function echo_nav($list){
    for ($x = 0; $x <= count($list); $x++) {
        if ($list[$x]!=""){
            echo '<li><a target="_blank" href="'.$list[$x+1].'">'.$list[$x].'</a></li>';
            $x++;
        }
    }
}

$cip = $_SERVER['REMOTE_ADDR'];
$is_internal=False;
$site_title="网址导航";
// if ($cip){
//   if ($cip=="127.0.0.1"){
//     $is_internal=True;
//     $site_title="内网导航";
//   }else{
//     $site_title="外网导航";
//   }
// }

// $internal_get=$_GET["internal"];
// if ($internal_get=="true"){
//   $is_internal=True;
//   $site_title="内网导航";
// }

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<!-- Header -->
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title><? echo $site_title; ?></title>
<meta name="keywords" content="KRUNK.CN"/>
<meta name="description" content="KRUNK.CN"/>

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

<link href="https://krunk.cn/krunk/sdk/ZUI/css/zui.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href=" css/style.css">
<link rel="stylesheet" href=" css/iconfont.css">
<link rel="stylesheet" href=" css/fontawesome.css">
</head>
<body id="nav_body">
<!-- Header Nav -->
<header>
<div class="main">
    <h1 class="logo">
    <a href="index.php">
    <img src="https://ca.krunk.cn/favicon.ico">
    <span><? echo $site_title; ?></span>
    </a>
    </h1>
    <!-- Top Nav -->
    <nav class="nav">
    <ul>
        <li><a href="https://krunk.cn/" target="_blank">KRUNK.CN</a></li>
        <li><a href="https://github.com/KrunkZhou/SimpleWebNavigation" target="_blank">GitHub</a></li>
    </ul>
    </nav>
    <!-- Mobile -->
    <button class="nav-btn visible-xs visible-sm"><span class="icon-line top"></span><span class="icon-line middle"></span><span class="icon-line bottom"></span>
    </button>
</div>
</header>
<div id="content">
    <!-- Left Bar -->
    <div class="left-bar">
        <div class="header">
            <h2>我的导航站</h2>
        </div>
        <div class="menu" id="menu">
            <ul class="scrollcontent">
                <!-- Left Nav -->
                <?
                    $list_nav=get_file("nav-left.txt");
                    echo_nav($list_nav);
                ?>
                <!--<li><a href="https://krunk.cn/">KRUNK.CN</a></li>-->
            </ul>
        </div>
    </div>
    <!-- Content -->
    <div class="main">
        <div class="container content-box">
            <!-- Search -->
            <section class="sousuo">
            <div class="search">
                <div class="search-box">
                    <button class="search-engine-name" id="search-engine-name">Google</button>
                    <input type="text" id="txt" class="search-input" placeholder="Hello World !"/>
                    <button class="search-btn" id="search-btn"><i class="fa fa-search"></i></button>
                </div>
                <!-- Engine  -->
                <div class="search-engine">
                    <div class="search-engine-head">
                        <strong class="search-engine-tit">Select Search Engine：</strong>
                    </div>
                    <ul class="search-engine-list">
                    </ul>
                </div>
            </div>
            </section>
            <!-- Links -->
            <?
              $list_link=get_file("data.txt");
              echo_link($list_link);

              // if ($is_internal){
              //   $list_link=get_file("internal-data.txt");
              //   echo_link($list_link);
              // }

              // $list_link=get_file("foot-data.txt");
              // echo_link($list_link);
            ?>
            <!-- Footer -->
            <footer class="footer">
            <div class="container">
                <div class="rwo">
                    <div class="col-md-12">
                      <!--小部分CSS代码修改自小呆导航的开源代码-->
                        <p>
                            Copyright © 2019 KRUNK DESIGN
                        </p>
                    </div>
                </div>
            </div>
            </footer>
        </div>
        <!-- Content -->
    </div>
    <div id="get-top" title="回到顶部">
        up
    </div>
    
    <!-- jQuery (ZUI Require jQuery) -->
    <script src="https://krunk.cn/krunk/sdk/jquery-3.4.1.min.js"></script>

    <script src="js/main.js"></script>
    
</div>
</body>
</html>