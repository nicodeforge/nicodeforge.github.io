<?php 
    // Get the private context 
    session_name('Private'); 
    session_start(); 
    $private_id = session_id(); 
    $b = $_SESSION['pr_key']; 
    session_write_close(); 
    
    // Get the global context 
    
    session_name('Global'); 
    session_id('TEST'); 
    session_start(); 
    
    $a = $_SESSION['key']; 
    session_write_close();


    session_start();
    if (!isset($_SESSION['count'])) {
      $_SESSION['count'] = 0;
    } else {
      $_SESSION['count']++;
      echo $_SESSION['count'];
    }
    

    

    // Work & modify the global & private context (be ware of changing the global context!) 
?> 
<html> 
    <body> 
        <?php
            if (session_name() == 'Private') {
                echo "<hr /><br />Cette session est privée.";
            }elseif (session_name()  == 'Global') {
                echo "<hr /><br />Cette session est publique.";
            }

            echo $_SESSION['count'];
        ?> 
    </body> 
</html>
<?php 
    // Store it back 
    session_name('Private'); 
    session_id($private_id); 
    session_start(); 
    $_SESSION['pr_key'] = $b; 
    session_write_close(); 

    session_name('Global'); 
    session_id('TEST'); 
    session_start(); 
    $_SESSION['key']=$a; 
    session_write_close(); 
?>