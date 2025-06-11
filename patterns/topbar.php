<?php
/**
 * Title: Navbar with Topbar Image
 * Slug: yourplatform/topbar
 * Categories: header, navigation, yourplatform
 */

// Get a field value by field name/key
$topBar_content = get_field('topbar');
$social_links = ThemeOptions::get_social_links();
// echo "<pre>";print_r($social_links);exit;

if ($topBar_content) {
?>

<!-- wp:html -->
<nav class="navbar navbar-expand-lg bg-body-tertiary topbar">
  <div class="container-fluid">
    <div class="container d-flex flex-row justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <ul class="d-flex p-0 m-0 gap-30">
        <?php
            foreach($social_links as $k => $links){
        ?>
            <li class="list-unstyled">
                <a class="nav-link <?php echo $k; ?> d-flex align-items-center gap-10" href="<?php echo $links; ?>" target="_blank">
                  <span class="d-none d-md-block"><?php echo ucfirst($k); ?></span>
                </a>
            </li>
        <?php
            }
        ?>
        </ul>
      </div>
    </div>
  </div>
</nav>

<a class="topbar_image d-flex flex-row justify-content-center align-items-center" href="<?php echo $topBar_content['link'] ?>" target="_blank" style=" background: url('<?php echo $topBar_content['image'] ?>') center / cover no-repeat !important;">
    <h3><?php echo $topBar_content['caption'] ?></h3>
</a>
<!-- /wp:html -->
<?php

}

?>