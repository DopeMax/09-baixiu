<!-- 也可以使用 $_SERVER['PHP_SELF'] 取代 $current_page -->
<?php 

// 因为这个 sidebar.php 是被 index.php 载入执行，所以 这里的相对路径 是相对于 index.php
// 如果希望根治这个问题，可以采用物理路径解决
require_once '../functions.php';
$current_page = isset($current_page) ? $current_page : ''; 
// session_start();
// $current_user = $_SESSION['current_login_user'];
$current_user = xiu_get_current_user();
?>
<div class="aside">
    <div class="profile">
      <img class="avatar" src="<?php echo $current_user['avatar'] ;?>">
      <h3 class="name"><?php echo $current_user['nickname'] ;?></h3>
    </div>
    <ul class="nav">
      <li class="<?php echo $current_page === 'index' ? ' active' :''; ?>">
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <?php $menu_posts = array('posts','post-add','categories');?>
      <li class="<?php echo in_array($current_page,$menu_posts) ? ' active' :''; ?>">
        <a href="#menu-posts" class="<?php echo in_array($current_page,$menu_posts) ? ' collapsed' :''; ?>" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse<?php echo in_array($current_page,$menu_posts) ? ' in' :''; ?>">
          <li class="<?php echo $current_page === 'posts'? ' active' :''; ?>"><a href="posts.php">所有文章</a></li>
          <li class="<?php echo $current_page === 'post-add'? ' active' :''; ?>"><a href="post-add.php">写文章</a></li>
          <li class="<?php echo $current_page === 'categories'? ' active' :''; ?>"><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li class="<?php echo $current_page === 'comments'? ' active' :'';?>">
        <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li class="<?php echo $current_page === 'users'? ' active' :'' ;?>">
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <?php $menu_settings = array('nav-menus','slides','settings');?>
      <li class="<?php echo in_array($current_page,$menu_settings) ?  ' active' :''; ?>">
        <a href="#menu-settings"  class="<?php echo in_array($current_page,$menu_settings) ? ' collapsed' :''; ?>" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings"  class="collapse<?php echo in_array($current_page,$menu_settings) ? ' in' :''; ?>">
          <li class="<?php echo $current_page === 'nav-menus'? ' active' :''; ?>"><a href="nav-menus.php">导航菜单</a></li>
          <li class="<?php echo $current_page === 'slides'? ' active' :''; ?>"><a href="slides.php">图片轮播</a></li>
          <li class="<?php echo $current_page === 'settings'? ' active' :''; ?>"><a href="settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>