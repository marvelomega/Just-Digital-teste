<?php

namespace App;

class Prova
{

    public function QuestaoUm(int $n, array $arr)
    {

    	sort($arr);

		$ocorrencias = [];

		//Cria um array com as especificações de cada número
		//Esse Foreach ele separa os numeros e conta quantas ocorrencias ele tem
		foreach ($arr as $key => $value) {

			$ocorrencias[$value]['valor'] 		= $value;
			$ocorrencias[$value]['ocorrencia']	= isset($ocorrencias[$value]['ocorrencia'])?$ocorrencias[$value]['ocorrencia']+1:1;
		}


		//Aqui separa os array em sub conjuntos de ocorrencias;
		$ordemAux = [];
		foreach ($ocorrencias as $key => $ocorrencia) {
			$ordemAux[$ocorrencia['ocorrencia']][$key] = $ocorrencia['valor'];
		}

		ksort($ordemAux);

		//Este foreach cria o array na ordem desejada.
		$ordemFinal = [];
		foreach ($ordemAux as $key => $ordem) {
			foreach ($ordem as $k => $ord) {
				
				for ($i=1; $i <=$key ; $i++) { 
					$ordemFinal[] = $ord;
				}

			}
		}

		//Esse foreach limita o numero de valores no array
		$arrayFinal = [];
		$i = 1;
		foreach ($ordemFinal as $key => $value) {
			$arrayFinal[] = $value;

			if($i==$n){
				break;
			}
		}

		return $arrayFinal;


    }

    public function QuestaoDois(int $n)
    {

		$arrayFib = [0 , 1];	

		for ($i=1; $i <$n-1 ; $i++) { 
			$arrayFib[] = $arrayFib[$i]+$arrayFib[$i-1];	
		}

		return $n==1 ? [0] : $arrayFib;

    }

    public function QuestaoTres(string $s)
    {

    	$vogaisMagicas = [
			1 => 'a',
			2 => 'e',
			3 => 'i',
			4 => 'o',
			5 => 'u'
		];

		foreach ($vogaisMagicas as $key => $value) {
			$s = str_replace($value, $key, $s);
		}

		$numeros = str_split($s);
		$total   = sizeof($numeros);

		$ponteiro = 1;
		$contador = 0;

		$seq = '';
		for ($i=0; $i <$total ; $i++) { 
			
			if($numeros[$i]==$ponteiro){
				$contador++;
				$seq.= $numeros[$i];
			}else{
				if($numeros[$i]==$ponteiro+1 and $contador>0){
					$ponteiro++;
					$contador++;
					$seq.= $numeros[$i];
				}
			}
		}

		foreach ($vogaisMagicas as $key => $value) {
			$keyS = (string) $key;
			if( strpos( $seq, $keyS ) === false) {
				$contador = 0;
		    	break;
			}
		}

		return $contador;
    }

    public function QuestaoQuatro(int $n, array $a, array $b, array $v)
    {

		$lista = [];

		for ($i=1; $i <= $n ; $i++) { 
			$lista[$i] = 0;
		}

		foreach ($a as $key => $val) {
			
			$valorA = $val;
			$valorB = $b[$key];

			for ($i=$valorA; $i <=$valorB ; $i++) { 
				$lista[$i] += $v[$key];
			}
		}

		return max($lista);

    }
}
