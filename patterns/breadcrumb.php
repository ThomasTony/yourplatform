<?php

/**
 * Title: Breadcrumb
 * Slug: yourplatform/breadcrumb
 * Categories: yourplatform
 */
?>
<nav class="breadcrumb" aria-label="Breadcrumb">
    <ul class="d-flex flex-row flex-nowrap align-items-center gap-10">
        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
        <?php
        $category = get_the_category();
        if (!empty($category)) {
            echo '<li><a href="' . esc_url(get_category_link($category[0]->term_id)) . '">' . esc_html($category[0]->name) . '</a></li>';
        }
        ?>
        <li aria-current="page"><?php the_title(); ?></li>
    </ul>
</nav>