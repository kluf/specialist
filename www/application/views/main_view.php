<html>
    <head>
        <title><?=$title?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="/css/mystyle.css" rel="stylesheet" media="screen">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery.jqplot.min.js"></script>
        <script type="text/javascript" src="/js/plugins/jqplot.barRenderer.js"></script>
        <script type="text/javascript" src="/js/plugins/jqplot.pieRenderer.js"></script>
        <script type="text/javascript" src="/js/plugins/jqplot.categoryAxisRenderer.js"></script>
        <script type="text/javascript" src="/js/plugins/jqplot.pointLabels.js"></script>
        <script type="text/javascript" src="/js/jquery.bxslider.js"></script>
        <script type='text/javascript' src='/js/jquery.cookie.js'></script>
        <script type='text/javascript' src='/js/jquery.hoverIntent.minified.js'></script>
        <script src="/js/script.js"></script>
    </head>
    <body>
        <div id="containerMy" class="container-fluid">
            <?php $this->load->view('/parts/header');?>
            <?php $this->load->view('/parts/content');?>
        </div>
        <?php $this->load->view('/parts/footer');?>
    </body>
</html>
