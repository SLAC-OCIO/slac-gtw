<div class="views-field-title"><?php print $title ?></div>
<div class="time-location">
  <?php if ($times) print $times; if ($location) print ', ' . $location; ?>
</div>
<div class="views-field-nothing-1">
  <a href="/node/<?php print $node->nid ?>/ical.ics"><img src="/sites/all/themes/slac/images/calendar-icon-gray.png" /></a>
</div>
