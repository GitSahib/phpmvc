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
      <a class="navbar-brand" href="<?php echo $this->root_url();?>#"><img src="<?php echo $this->root_url();?>/assets/images/ud_splash_att.png" height="40"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="<?php echo $this->root_url();?>/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li><a href="#">ABC</a></li>
        <li><a href="#">ABC</a></li>
        <li><a href="#">ABC</a></li>        
        <li><a href="#">ABC</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo $this->root_url();?>ticket">My Tickets</a></li>
        <li class="dropdown">

          <a href="<?php echo $this->root_url();?>#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Profile<span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
            <li class="dropdown-header">----</li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>