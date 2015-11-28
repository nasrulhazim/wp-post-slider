<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://nasrulhazim.com
 * @since      1.0.0
 *
 * @package    Content_Slider
 * @subpackage Content_Slider/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php $index = 0; ?>

<ul id="light-slider">
  <?php foreach ($posts as $key => $value): ?>
    <li>
      <h4><?= $value->post_title; ?></h4>
      <a href="<?= $value->guid; ?>">Read More</a>
    </li>
    <?php $index++; ?>
  <?php endforeach ?>
</ul>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    jQuery("#light-slider").lightSlider({loop:true,auto:true,item:1});
});
</script>