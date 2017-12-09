<nav id="navbar" class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php"><?php echo substr($page_title, 0, strpos($page_title, ' ')); ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="../../admin/php/create_html_form.php">Add new <?php echo substr($page_title, 0, strpos($page_title, ' ')); ?></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>