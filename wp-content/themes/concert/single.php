<?php
if(get_post_type() == "formation"){
    include(locate_template('template/single/formation.php'));
}
elseif(get_post_type() == "date"){
    include(locate_template('template/single/date.php'));
}