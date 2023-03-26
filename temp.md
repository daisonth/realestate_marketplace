        <li class="<?php echo (($type == "any") ? "active" : "") ?>"><a href="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=<?php echo $view ?>&low=<?php echo $low ?>">All</a></li>
        <?php while ($row = mysqli_fetch_array($result_property_type)) { ?>
          <li class="<?php echo (($type == "$row[0]") ? "active" : "") ?>"><a href="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=<?php echo $view ?>&low=<?php echo $low ?>&type=<?php echo $row[0] ?>"><?php echo $row[0] ?></a></li>
        <?php } ?>
        
               <ul style="max-height: 200px; overflow: scroll;">
          <li class="pt-2">All</li>
          <?php while ($row2 = mysqli_fetch_array($result_cities)) { ?>
            <li class="pt-2"><?php echo $row2[1] ?></li>
          <?php } ?>
        </ul>
        
        
                  <?php $i = 0;
          while ($row2 = mysqli_fetch_array($result_cities)) { ?>
            <a class="dropdown-item" data-value="<?php echo ++$i; ?>" href="#"><?php echo $row2[1] ?></a>
          <?php } ?>
 
  
