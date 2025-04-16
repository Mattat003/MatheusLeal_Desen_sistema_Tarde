<?php
    # rand - Gera um inteiro aleatório
    $sorteio = rand(0 , 5);
    echo "Sorteado: $sorteio <hr/>";
    # array_merge -Combina um ou mais arrays
    # range - Cria um array contendo uma faixa de elementos
    # (inicio, fim, passo)
    $vetor = array_merge(range(0,10),
                        range($sorteio,10,2),
                        array($sorteio));
    print_r($vetor);
    echo "<hr/>";
    # embaralha
    shuffle($vetor);
    print_r($vetor);
    echo "<hr/>";
    foreach($vetor as $valor)
    {
        echo 'O valor ', $valor, ' tem 3 elementos. <br/>';
    }
?>