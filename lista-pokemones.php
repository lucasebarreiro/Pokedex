<?php
include_once "data/PokemonDAO.php";
$dao = new PokemonDAO();

$pokemones = $dao->getAll();

foreach ( $pokemones as $pokemon){
    echo   "<tr>
                                <td class='text-center'>" . $pokemon['id_manual'] . "</td>
                                <td class='text-center'>" . $pokemon['nombre'] . "</td>
                                <td class='text-center'>" . $pokemon['altura'] . "</td>
                                <td class='text-center'>" . $pokemon['peso'] . "</td>
                                <td class='text-center'>" . $pokemon['habilidad'] . "</td>
                                <td class='text-center'><img src='".$pokemon['tipo']."' width='50' height='50'>";

    echo"</td>";
    echo "<td>" . $pokemon['descripcion'] . "</td>
                                <td> <img src=" . $pokemon['imagen'] . " width=75 height=75 ></td>
                                <td>    
                                <div class='row'>
                                    <div class ='my-1'>
                                      <form action='Detalle.php' method='POST'>
                                      <input type='hidden' name='nombre' value=".$pokemon['nombre'].">
                                      <input class='btn btn-primary ms-auto w-100' type='submit' value='Detalles'>
                                      </form>
                                    </div>
                                </div>
                                </td>
                                   
             </tr>";
}

?>
