 <?php
        $i=1;
        while ($i <= 10) {
          echo "<li class='list-group-item'>" . $i . "<ul class='list-group'>";
          $n = 1;
          while ($n <= 3) {
            echo "<li class='list-group-item'>" . $n . "</li>";
            $n++;
          }
          echo("</ul>");
          $i++;
        }
      ?>