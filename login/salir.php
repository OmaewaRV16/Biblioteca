<?php
session_start();
session_destroy();
echo '
    <script> 
      alert("Cerraste de forma exitosa tu sesión");
      location.href = "index.php";
    </script>
    ';
