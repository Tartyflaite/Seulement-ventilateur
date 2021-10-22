<?php

include(ROOT.'/views/home.html');
if(isset($_SESSION['connected']) && $_SESSION['connected'] == true){
include(ROOT.'/views/navbar/navbar.html');
}
else{
include(ROOT.'/views/navbar/navbar_notconnected.html');
}

include(ROOT.'/views/endofpage.html');