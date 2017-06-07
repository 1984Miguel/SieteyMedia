<?php

 $palos= array("bastos","copas","espadas","oros");
 $cartas= array("As",2,3,4,5,6,7,"Sota","Caballo","Rey");



    for($x=0;$x<=3;$x++) 
     {
        echo "\n".$palos[$x];
        for($y=0;$y<=9;$y++)
        {
                
            $encontrado[$x][$y]=false;
        }

    }

    



    echo "Bienvenido al black Jack \n";
echo "El bojetivo del juego es acumular 7,5 Sin pasarse \n";
echo "Tu oponente sera el propio ordenador\n";

echo"\n\n\n\n";


 //este array guardara cartas ya vistas la usare como variable global
   
juego($palos, $cartas);




pintarbaraja($palos, $cartas,$encontrado);



function juego($palos, $cartas){
  
   
    $contador[0]=0;
    $contador[1]=0;
    $fin=false;
    
    
    while(!$fin)
    {
        if($contador[0]<=$contador[1])
        {
            echo "juega la maquina \n";
            $contador[0]+=tirada($palos, $cartas);
            echo "los puntos acumulados por la maquina  son $contador[0] \n";
            
        }
        else{
            echo "+++++++++++++++++++++++++++++++++++\n";
            echo "La maquina ha decidido pasar turno \n";
            echo "+++++++++++++++++++++++++++++++++++\n";
        }

        if ($contador[0]>7.5)
        {
            echo "Gano el jugador";
            $fin=true;
            return;
           
        }
      
         if($contador[1]<=$contador[0])
        {
            echo "juega el usuario \n";
            $contador[1]+=tirada($palos, $cartas);  
            echo "los puntos acumulados por el jugador son $contador[1] \n";
        }
         else{
            echo "Escribe P para pasar:";
            $line = trim(fgets(STDIN));
            if ($line=="P")
            {
                 echo "+++++++++++++++++++++++++++++++++++\n";
                 echo "el jugador ha decidido pasar turno \n";
                 echo "+++++++++++++++++++++++++++++++++++\n";
            }
            else
            {
                echo "juega el usuario \n";
                 $contador[1]+=tirada($palos, $cartas);  
                 echo "los puntos acumulados por el jugador son $contador[1] \n";
            }
             
        }
        echo"\n\n";
        if ($contador[1]>7.5 ||($contador[0]==$contador[1] && $fin))
        {
            echo "Gano la maquina \n";
            $fin=true;
            return;
        }
        elseif ($contador[0]>7.5 )
        {
            echo "gano el jugador";
            return;
           
        }

        echo"\n\n";




    }

}

function tirada($palos, $cartas)
{
 $palo=rand(0, 3);
 $carta=rand(0, 9 );

$valor= valorc($cartas,$carta);
 echo "la carta elegida al azar es  $cartas[$carta] de $palos[$palo] y vale: $valor \n";
global $encontrado;
$encontrado[$palo][$carta]=true;

return $valor;

}

function valorc($cartas,$carta)
{
    if($cartas[$carta]=="As")
    {
    return 1;
    }
    elseif(is_numeric($cartas[$carta]))
    {
        return $cartas[$carta];
    }
    else
    {
        return 0.5;
    }
}


function pintarbaraja($palos, $cartas,$encontrado)
{

    

    for($x=0;$x<=3;$x++) 
    {
        echo "\n $palos[$x]";
        for($y=0;$y<=9;$y++)
        {
            
            if(!$encontrado[$x][$y])
            {
                echo "$cartas[$y]:V  ";
            }else
            {
                echo "$cartas[$y] :X  ";
            }
            

        }

    }
}





    
