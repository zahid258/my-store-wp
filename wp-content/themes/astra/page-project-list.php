<?php
/*
Template Name: Project List
*/

get_header();

$args = array(
'post_type' => 'project',
'posts_per_page' => -1
);

$query = new WP_Query($args);
?>

<div style="max-width:1400px;margin:auto;padding:120px 20px;">

<h1 style="text-align:center;font-size:46px;margin-bottom:15px;">
Choose Your Package
</h1>

<p style="text-align:center;max-width:650px;margin:0 auto 70px;color:#666;font-size:18px;">
Select the package that best fits your brand and business needs.
</p>

<div class="project-grid">

<?php if ($query->have_posts()) : ?>

<?php while ($query->have_posts()) : $query->the_post(); ?>

<?php
$price = get_field('project_price');
$subtitle = get_field('project_subtitle');
$button_text = get_field('project_button_text');
$button_url = get_field('project_button_url');
$badge = get_field('project_badge');
?>

<div class="project-card">

<?php if ($badge): ?>
<div class="badge"><?php echo $badge; ?></div>
<?php endif; ?>

<?php if (has_post_thumbnail()) : ?>
<?php the_post_thumbnail('large'); ?>
<?php endif; ?>

<h2><?php the_title(); ?></h2>

<p><?php echo $subtitle; ?></p>

<div class="price"><?php echo $price; ?></div>

<a class="btn" href="<?php echo $button_url; ?>">
<?php echo $button_text; ?>
</a>

</div>

<?php endwhile; ?>

<?php endif; ?>

</div>

</div>

<?php get_footer(); ?>