<div class="progress-bar">

<?php 

  if(isset($progressBarSections) && isset($activeSections)){

    for($i = 1; $i <= $progressBarSections; $i++) {

      if($i <= $activeSections){
        echo('<div class="active-section"></div>');
      } else {
        echo('<div></div>');
      }
      

    };

  }

?>

</div>