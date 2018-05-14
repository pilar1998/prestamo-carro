<?php 
	$pres=$_POST['pres'];
	$carro=$_POST['carro'];
	$plazo=$_POST['plazo'];
	$base=10;
	$cuotas=$plazo;
	$ea=0.15;
    $vp=$carro-$pres;
	$em=((pow((1+($ea/100)),(1/12))-1))*100;
	$valor_cuota=round(($vp)*((pow((1+($em/100)),($cuotas))*($em/100)))/(pow((1+($em/100)),($cuotas))-1),3);
	echo "<table class='table table-striped table-bordered table-condensed table-hover'>";            
        echo "<thead>";
        	echo "<th>Cuota #</th>";
            echo "<th>Valor Cuota</th>";
            echo "<th>Intereses</th>";
            echo "<th>Amortización</th>";
            echo "<th>Saldo</th>";
        echo "</thead>";
    $saldo[0]=$vp;
    echo "<tr>";
       		echo "<td>";
            echo 0;
            echo "</td>";
            echo "<td>";
            echo $pres;
            echo "</td>";
            echo "<td>";
            echo 0;
            echo "</td>";     
            echo "<td>";
            echo 0;
            echo "</td>";
            echo "<td>";
            echo $saldo[0];
            echo "</td>";            
        echo "</tr>";
	for($i=1;$i<=$cuotas;$i++){
		 echo "<tr>";
       		echo "<td>";
            echo $i;
            echo "</td>";
            echo "<td>";
            echo $valor_cuota;
            echo "</td>";
            echo "<td>";
            echo $intereses=round(($saldo[$i-1]*($em/100)),3);
            echo "</td>";     
            echo "<td>";
            echo $amort=round(($valor_cuota-$intereses),3);
            echo "</td>";
            echo "<td>";
            echo $saldo[$i]=round(($saldo[$i-1]-$amort),3);
            echo "</td>";            
        echo "</tr>";
	}
	

?>