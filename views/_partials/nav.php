<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo ROOT_URL;?>#"><img src="/home/assets/images/ud_splash_att.png" height="40"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="<?php echo ROOT_URL;?>/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li><a href="/UD/cgi-bin/worklist.pl">UD</a></li>
        <li><a href="/upm2">UPM</a></li>
        <li><a href="/aqe/cgi-bin/index.pl">AQE</a></li>
        <li><a href="/teamdb">TeamDB</a></li>
        <li><a href="/shift">TeamDB_API/shifts</a></li>
        <li><a href="/Templates/cgi-bin/Template.pl">Template Tool</a></li>

        <li><a href="<?php echo ROOT_URL;?>/wam">WAM</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo ROOT_URL;?>/ticket">My Tickets</a></li>
        <li class="dropdown">

          <a href="<?php echo ROOT_URL;?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Usefull Links <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://icode3.web.att.com/cru?filter=inbox">ICODE</a></li>
            <li><a href="https://itrack.web.att.com/issues/?filter=49937">ITRACK</a></li>
            <li><a href="https://wiki.web.att.com/pages/viewpage.action?spaceKey=GCSDevOps&title=Git+Process+-+DTI">GIT WIKI</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">----</li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>