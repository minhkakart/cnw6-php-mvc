<?php

$title = 'MVC';

include_once HEADER;

?>
<div class="row">
    <a href="<?= DOMAIN ?>?controller=patient" class="btn btn-primary">Patient Management</a>
    <a href="<?= DOMAIN ?>?controller=member" class="btn btn-primary">Member Management</a>
    <a href="<?= DOMAIN ?>?controller=book" class="btn btn-primary">Book Management</a>

</div>

<?php

include_once FOOTER;

?>