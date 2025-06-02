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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <ul class="d-flex p-0 m-0">
        <?php
            foreach($social_links as $k => $links){
        ?>
            <li class="list-unstyled">
                <a class="nav-link" href="<?php echo $links; ?>"><?php echo ucfirst($k); ?></a>
            </li>
        <?php
            }
        ?>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="topbar_image d-flex flex-row justify-content-center align-items-center" style="height: 200px; background: url('<?php echo $topBar_content['image'] ?>');">
    <h3><?php echo $topBar_content['caption'] ?></h3>
</div>
<!-- /wp:html -->
<?php

}

?>