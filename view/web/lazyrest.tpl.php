<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?=$data['title'] . ' | ' . c('site_name');?></title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="http://libs.useso.com/js/bootstrap/3.2.0/css/bootstrap.min.css"/>
 -->
    <link rel="stylesheet" href="<?=css('bootstrap.min.css');?>"/>
    <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css"/>
    
    <link rel="stylesheet" href="<?=css('toastr.min.css');?>"/>
    
	<link rel="stylesheet" type="text/css" href="/assets/css/app.css"/>

    <?php if( isset($data['css']) && is_array( $data['css'] ) ): ?>
        <?php foreach( $data['css'] as $cfile ): ?><link rel="stylesheet" type="text/css" href="/assets/css/<?=$cfile?>"/>
        <?php endforeach; ?>
	<?php endif; ?>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=js('jquery.base64.min.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js"></script> -->
    <script src="<?=js('toastr.min.js');?>"></script>

    <?php if( isset($data['js']) && is_array( $data['js'] ) ): ?>
        <?php foreach( $data['js'] as $jfile ): ?><script type="text/javascript" src="/assets/script/<?=$jfile;?>" ></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <script src="/assets/bower_components/ace-builds/src-min/ace.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="/assets/script/app.js" ></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <?php

    $header_file = dirname( __FILE__ ) . DS  . 'header.lr.tpl.php'; 
    if( file_exists( $header_file ) ) include( $header_file );

    
    $mainfile = dirname( __FILE__ ) . DS . 'main' . DS . g('c') . '_' . g('a') . '.tpl.php';
    if( file_exists( $mainfile ) ) include( $mainfile );
    else echo "<div class='notice-box'>没有设置模板文件，如需获取JSON，请将Header的Content-Type设置为application/json</div>";


    $footer_file = dirname( __FILE__ ) . DS  . 'footer.lr.tpl.php'; 
    if( file_exists( $footer_file ) ) include( $footer_file );
			
    ?>
  </body>
</html>
