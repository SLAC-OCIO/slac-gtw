<?php
/**
 * @file
 * Template for the 2 column panel layout.
 *
 * This template provides a two column ~75%-25% panel display layout.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>
<div class="panel-display general-two-col clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-panel general-left">
     <?php if ($content['left']): ?>
        <div class="inside"><?php print $content['left']; ?></div>
      <?php endif ?>
  </div>

  <div class="panel-panel general-right">
     <?php if ($content['right']): ?>
        <div class="inside"><?php print $content['right']; ?></div>
      <?php endif ?>
  </div>
</div>
