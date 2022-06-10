
<?php
    
    $connect = mysqli_connect("localhost","root","","bdsistemapollos");

    if(isset($_POST["query"])){
        $output = '';
        $query = "SELECT * FROM PRODUCTO WHERE nombre LIKE '%".$_POST["query"]."%'";
        $result = mysqli_query($connect,$query);
        $output = '<ul class="list-unstyled">';

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $output .= '<li>'.$row["nombre"].'<li>';
            }
        } else {
            $output .= '<li>No encontrado</li>';
        }   
        
        $output .= '</ul>';

        echo $output;
    }

    /*
    $conn = new mysqli("localhost","root","","bdsistemapollos");

    if($conn->connect_error){
        die("Falló conexión!".$conn->connect_error);        
    }

    if(isset($_POST['query'])){
        $inpText=$_POST['query'];
        $query = "SELECT PRODUCTO FROM nombre LIKE '%$inpText%'";
        
        $result = $conn->query($query);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['country']."</a>";
            }
        } else {
            echo "<p class='list-group-item border-1'>No hay datos</p>";
        }

    }
    */

?>