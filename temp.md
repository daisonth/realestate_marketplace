        <li class="<?php echo (($type == "any") ? "active" : "") ?>"><a href="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=<?php echo $view ?>&low=<?php echo $low ?>">All</a></li>
        <?php while ($row = mysqli_fetch_array($result_property_type)) { ?>
          <li class="<?php echo (($type == "$row[0]") ? "active" : "") ?>"><a href="shop.php?sort=<?php echo $sort ?>&order=<?php echo $order ?>&view=<?php echo $view ?>&low=<?php echo $low ?>&type=<?php echo $row[0] ?>"><?php echo $row[0] ?></a></li>
        <?php } ?>
