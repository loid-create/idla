<?php
	// Kecepatan kinerja dokter
	$KKD = [
		[
			"pasien" => 'P1',
			"penyakit" => 'Demodekosis',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P2',
			"penyakit" => 'Demodekosis2',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P3',
			"penyakit" => 'Demodekosis3',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P4',
			"penyakit" => 'Demodekosis4',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P5',
			"penyakit" => 'Demodekosis5',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P6',
			"penyakit" => 'Demodekosis6',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P7',
			"penyakit" => 'Demodekosis7',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P8',
			"penyakit" => 'Demodekosis8',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P9',
			"penyakit" => 'Demodekosis9',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P10',
			"penyakit" => 'Demodekosis10',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P11',
			"penyakit" => 'Demodekosis11',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P12',
			"penyakit" => 'Demodekosis12',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P13',
			"penyakit" => 'Demodekosis13',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P14',
			"penyakit" => 'Demodekosis14',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P15',
			"penyakit" => 'Demodekosis15',
			"avgKerja" => [0.42, 0.58]
		],
		[
			"pasien" => 'P16',
			"penyakit" => 'Demodekosis16',
			"avgKerja" => [0.42, 0.58]
		]
	];
	$dokter = ['dokter1', 'dokter2'];
	$hari = 6;

	function generatePemesanan($penyakits, $dokters, $jumlahHari, $isTest = 0)
	{
		$seedValue = [
			[
				[0.52,0.50,0.50,0.52,0.53,0.57,0.48,0.50,0.43,0.43,0.48,0.47,0.42,0.48,0.47,0.48]					
				// [0.52,0.5,0.5,0.5,0.5,0.57,0.48,0.5,0.43,0.43,0.48,0.5,0.4,0.48,0.47,0.5]
			],
			[
				[0.54,0.54,0.55,0.55,0.56,0.60,0.50,0.55,0.45,0.45,0.50,0.50,0.45,0.52,0.50,0.52]					
				// [0.54,0.54,0.55,0.6,0.6,0.6,0.5,0.6,0.45,0.45,0.5,0.5,0.5,0.52,0.5,0.5]
			],
			[
				[0.48,0.50,0.48,0.50,0.48,0.50,0.48,0.52,0.50,0.43,0.52,0.52,0.48,0.50,0.50,0.50]					
				// [0.48,0.50,0.48,0.50,0.48,0.50,0.48,0.52,0.50,0.43,0.52,0.52,0.48,0.50,0.50,0.50]
			],
			[
				[0.50,0.50,0.45,0.45,0.48,0.50,0.50,0.52,0.43,0.45,0.55,0.53,0.50,0.48,0.48,0.48]					
				// [0.50,0.50,0.45,0.45,0.48,0.50,0.50,0.52,0.43,0.45,0.55,0.53,0.50,0.48,0.48,0.48]
			],
			[
				[0.48,0.50,0.50,0.52,0.48,0.48,0.50,0.52,0.47,0.43,0.55,0.55,0.50,0.50,0.55,0.48]					
				// [0.48,0.50,0.50,0.52,0.48,0.48,0.50,0.52,0.47,0.43,0.55,0.55,0.50,0.50,0.55,0.48]
			],
			[
				[0.50,0.50,0.47,0.43,0.50,0.52,0.50,0.52,0.52,0.50,0.55,0.50,0.50,0.50,0.53,0.50]					
				// [0.50,0.50,0.47,0.43,0.50,0.52,0.50,0.52,0.52,0.50,0.55,0.50,0.50,0.50,0.53,0.50]
			]
			];
	
		$result = [];
		for ($i=0; $i <$jumlahHari ; $i++) {
			$data = [];
			$batasBawah = 0;
			foreach ($dokters as $dokterKey => $dokter) {
				$rangeDokter = count($penyakits) / count($dokters); // 16/2=8
				$dataPenyakit = [];
				$totalAvgkerja = 0;
				$batasAtas = $rangeDokter * ($dokterKey + 1);
				foreach ($penyakits as $key => $penyakit) {
					if ($key+1 > $batasBawah && $key+1 <= $batasAtas) {
						$value = rand(40,60)/100;
						if ($isTest) { // menggunkan data yg tetap
							$value = number_format($seedValue[$i][0][$key], 2);
						}
						$dataPenyakit[] = [
							"noAppointment" => $key+1,
							"pasien" => $penyakit['pasien'],
							"value" => $value
						];
						$totalAvgkerja += $value;
					}
					if ($key+1 >= $batasAtas) {
						$batasBawah = $batasAtas;
					}
				}

				$data[] = [
					"dokter" => $dokter,
					"data" => $dataPenyakit,
					"totalAvgkerja" => round($totalAvgkerja, 2)

				];
			}
			array_push($result, ["hari".($i+1) => $data]);
		}
		return $result;
	}
	function generateIndividu($pemesanans, $dokter, $jumlahHari)
	{
		$hariDivideByDokter = $jumlahHari / count($dokter);
		$individu = [];
		$batasBawah = 1;
		for ($i=0; $i < $hariDivideByDokter ; $i++) { 
			$batasAtas = count($dokter) * ($i+1);
			foreach ($pemesanans as $keyPemesanan => $pemesanan) {
				if ($keyPemesanan+1 >= $batasBawah && $keyPemesanan+1 <= $batasAtas) {
					$dataHari = $pemesanan['hari'.($keyPemesanan+1)];
					foreach ($dataHari as $keyHari => $hari) {
						$allValueDokter = array_column($hari['data'], 'value');
						$individu['individu'.($i+1)][] = [
							"dokter" => $hari['dokter'],
							"hari" => ($keyPemesanan%2)+1,
							"value" => $allValueDokter
						];
					}
				}
			}
			$batasBawah = $batasAtas+1;
		}	
		return $individu;
	}
	function calculateFitness($individus)
	{
		$result = [];
		$originalIndividus = $individus;
		foreach ($individus as $keyIndividu => $individu) {
			$total = 0;
			foreach ($individu as $keyDataIndividu => $dataIndividu) {
				foreach ($dataIndividu['value'] as $keyValue => $value) {
					$value = number_format(1/$value, 2);
					$dataIndividu['value'][$keyValue] = $value;
					$total += $value;
				}
				$individu[$keyDataIndividu] = $dataIndividu;
			}
			$individus[$keyIndividu]['total'] = $total;
			$hasil = [
				'dataOriginal' => $originalIndividus[$keyIndividu],
				'data' => $individu,
				'total' => number_format($total, 2),
				'individu' => $keyIndividu,
				'id' => uniqid()
			];
			$result[$keyIndividu] = $hasil;
		}
		return $result;
	}
	function selectParent($fitness)
	{
		usort($fitness, function ($a, $b)
		{
			return $a['total'] < $b['total'];
		});
		$selected = array_splice($fitness, 2);
		return $fitness;
	}
	function generateFirstCrossover($parents, $isTest = 0)
	{
		$seedIsSwap = [
			[1,0,1,1,0,1,1,1],
			[1,1,0,1,1,0,0,1],
			[0,1,1,1,0,1,1,1],
			[1,1,0,1,1,0,1,0]
		];
		$seedMask2 = [
			[0.52,0.50,0.48,0.43,0.48,0.50,0.50,0.52],
			[0.48,0.48,0.52,0.53,0.47,0.50,0.53,0.48],
			[0.50,0.50,0.47,0.48,0.48,0.48,0.48,0.52],
			[0.52,0.50,0.55,0.48,0.45,0.48,0.50,0.50]
		];

		$parentA = $parents[0];
		$parentB = $parents[1];

		$tableCross = $parents[0];
		$tableCrossReal = $parents[0];
		$totalCrossA = 0;
		$totalCrossB = 0;
		$countDataParent = count($parentA['dataOriginal']);
		for ($i=0; $i < $countDataParent; $i++) {
			$keyDataParent = $i; 
			$countData = count($parentA['dataOriginal'][$keyDataParent]['value']);
			for ($j=0; $j < $countData; $j++) { 
				$keyData = $j;
				$isSwap = rand(0, 1);
				if ($isTest) {
					$isSwap = $seedIsSwap[$keyDataParent][$keyData];
				}
				// echo $keyDataParent.'|'.$keyData.'='.$isSwap; echo "<br>";
				$valueA = $parentA['dataOriginal'][$keyDataParent]['value'][$keyData]; // apa harus dibalik?
				$valueB = $parentB['dataOriginal'][$keyDataParent]['value'][$keyData];
				$valueAChild = $parentA['data'][$keyDataParent]['value'][$keyData]; // apa harus dibalik?
				$valueBChild = $parentB['data'][$keyDataParent]['value'][$keyData];
				$valueTMP = 0;
				$valueTMPChild = 0;
				if ($isSwap) {
					// echo "<br>".$keyDataParent." | ".$keyData."SWap:".$valueA."==>".$valueB."<br>";
					$valueTMP = $valueB;
					$valueB = $valueA;
					$valueA = $valueTMP;

					$valueTMPChild = $valueBChild;
					$valueBChild = $valueAChild;
					$valueAChild = $valueTMPChild;
				}
				$randValue = number_format(rand(40,60)/100, 2);
				if ($isTest) {
					$randValue = $seedMask2[$keyDataParent][$keyData];
				}
				$tableCross['dataOriginal'][$keyDataParent]['value'][$keyData] = $isSwap;
				$tableCross['id'] = uniqid();
				$tableCross['individu'] = 'Binner';
				unset($tableCross['data']);
				unset($tableCross['total']);

				$tableCrossReal['dataOriginal'][$keyDataParent]['value'][$keyData] = number_format($randValue, 2);
				$tableCrossReal['id'] = uniqid();
				$tableCrossReal['individu'] = 'Real';
				unset($tableCrossReal['total']);
				unset($tableCrossReal['data']);

				$parentA['dataOriginal'][$keyDataParent]['value'][$keyData] = $valueA;
				$parentB['dataOriginal'][$keyDataParent]['value'][$keyData] = $valueB;
				$parentA['data'][$keyDataParent]['value'][$keyData] = $valueAChild;
				$parentB['data'][$keyDataParent]['value'][$keyData] = $valueBChild;

			}
			$totalCrossA += array_sum($parentA['dataOriginal'][$keyDataParent]['value']);
			$totalCrossB += array_sum($parentB['dataOriginal'][$keyDataParent]['value']);
		}
			$parentA['totalFirstCrossA'] = $totalCrossA;
			$parentB['totalFirstCrossB'] = $totalCrossB;
		
		return (object)["childA" => $parentA, "childB" => $parentB, "crossBinner" => $tableCross, "crossReal" => $tableCrossReal ];
	}

	function generateSecondCrossover($parents, $mask)
	{
		$parentsBefore = $parents;
		$hasils = $parents;
		foreach ($hasils as $keyParent => $parent) {
			$totalCross =0;
			foreach ($parent['dataOriginal'] as $keyDataParent => $dataParent) {
				foreach ($dataParent['value'] as $keyData => $data) {
					$valueB = $parents[0]['dataOriginal'][$keyDataParent]['value'][$keyData];
					$valueA = $parents[1]['dataOriginal'][$keyDataParent]['value'][$keyData];
					$masking = $mask['dataOriginal'][$keyDataParent]['value'][$keyData];
					$asli = $parents[$keyParent]['dataOriginal'][$keyDataParent]['value'][$keyData];
					$hasil = 0;
					if ($keyParent === 1) { // rumus A [ ef1 = ep1 + r(ep2-ep1) ]
						$hasil = number_format($valueB + $masking * ( $valueA - $valueB), 2);
					} else { // rumus B [ ef2 = ep2 + r(ep1-ep2) ]
						$hasil = number_format($valueA + $masking * ( $valueB - $valueA), 2);
					}
					$hasil = number_format($hasil, 2);
					$dataParent['value'][$keyData] = $hasil;
				}
				$parent['dataOriginal'][$keyDataParent] = $dataParent;
				$totalCross += array_sum($dataParent['value']);
			}
			$parent['total'] = $parentsBefore[$keyParent]['total'];
			$parent['totalSecondCross'] = number_format($totalCross, 2);
			$hasils[$keyParent] = $parent;
		}

		foreach ($hasils as $keyParent => $parent) {
			foreach ($parent['data'] as $keyDataParent => $dataParent) {
				foreach ($dataParent['value'] as $keyData => $data) {
					$value = $parent['dataOriginal'][$keyDataParent]['value'][$keyData];
					$dataParent['value'][$keyData] = number_format(1/$value, 2);
				}
				$parent['data'][$keyDataParent] = $dataParent;
			}
			$hasils[$keyParent] = $parent;
		}
		return $hasils;
	}

	function generateMutasi($parents)
	{
		$countRandom = 0;
		$lengthDataParent = count($parents[0]['dataOriginal']);
		$lengthKeyData = count($parents[0]['dataOriginal'][0]['value']);
		$result = $parents;
		while ( $countRandom <= 5) {
				$randParent = rand(0,1);
				$randDataParent = rand(0, $lengthDataParent-1);
				$randKeyData = rand(0, $lengthKeyData-1);
				$hasil = number_format(rand(-40, -60) / 100, 2);
				$valBefore = $result[$randParent]['dataOriginal'][$randDataParent]['value'][$randKeyData];
				if ($valBefore > 0) {
					$result[$randParent]['dataOriginal'][$randDataParent]['value'][$randKeyData] = $hasil; // minus sbg penanda
					$countRandom ++;					
				}

		}

		foreach ($result as $keyParent => $parent) {
			$total = 0;
			foreach ($parent['dataOriginal'] as $keyOriginal => $original) {
				foreach ($original['value'] as $keyData => $data) {
					$fitness = number_format(1/abs($data), 2);
					$original['value'][$keyData] = $fitness;
					$total += $fitness;
				}
				$parent['data'][$keyOriginal] = $original;
			}
			$result[$keyParent] = $parent;
			$result[$keyParent]['id'] = uniqid();
			$result[$keyParent]['totalMutasi'] = $total;
		}
		return $result;
	}

	function calculateBestCross($firsts, $seconds)
	{
		$bestFirst = array_reduce($firsts, function($a, $b) {
			return $a ? ($a['total'] > $b['total'] ? $a: $b) : $b;
		});
		$bestSecond = array_reduce($seconds, function($a, $b) {
			return $a ? ($a['total'] > $b['total'] ? $a: $b) : $b;
		});
		$result = $bestFirst;
		if ($bestFirst['total'] < $bestSecond['total']) {
			$result = $bestSecond;
		}

		return $result;

	}

	function calculateBestMutasi($mutasi)
	{
		$bestMutasi = array_reduce($mutasi, function($a, $b) {
			return $a ? ($a['totalMutasi'] > $b['totalMutasi'] ? $a: $b) : $b;
		});
		return $bestMutasi;
	}

	function transformToMinute($cross, $mutasi, $originalParent)
	{

		$parentsIndex = array_search($cross, array_column($originalParent, 'id'));
		$nameParent = array_column($originalParent, 'individu');
		$parents = $originalParent[$nameParent[$parentsIndex]];
		$totalMinute =0;
		foreach ($parents['dataOriginal'] as $keyDataParent => $dataParent) {
			foreach ($dataParent['value'] as $keyValue => $value) {
				$valueMinute = number_format($value * 60, 2);
				$dataParent['value'][$keyValue] = $valueMinute;
				$totalMinute += $valueMinute;
			}
			// print_r($value);
			$parents['dataOriginal'][$keyDataParent] = $dataParent; // mgkin data parent nya
		}
		$parents['average'] = number_format($totalMinute/32, 2);
		// print_r($parents);

		$parentsMutasiIndex = array_search($mutasi, array_column($originalParent, 'id'));
		$nameParent = array_column($originalParent, 'individu');
		$parentsMutasi = $originalParent[$nameParent[$parentsMutasiIndex]];
		$totalMinuteMutasi =0;
		foreach ($parentsMutasi['dataOriginal'] as $keyDataParent => $dataParent) {
			foreach ($dataParent['value'] as $keyValue => $value) {
				$valueMinute = number_format($value * 60, 2);
				$dataParent['value'][$keyValue] = $valueMinute;
				$totalMinuteMutasi += $valueMinute;
			}
			// print_r($value);
			$parentsMutasi['dataOriginal'][$keyDataParent] = $dataParent; // mgkin data parent nya
		}
		$parentsMutasi['average'] = number_format($totalMinuteMutasi/32, 2);
		$average = ($parentsMutasi['average'] + $parents['average']) / 2;
		// print_r($parentsMutasi);
		return (object)["cross" => $parents, "mutasi" => $parentsMutasi, "average" => $average, "avgCeil" => ceil($average) ];
	}

	// print_r($KKD);
	$hasil = generatePemesanan($KKD, $dokter, $hari);
	$individu = generateIndividu($hasil, $dokter, $hari);
	$fitnesIndividu = calculateFitness($individu);
	$selectedParent = selectParent($fitnesIndividu);
	$firstCrossover = generateFirstCrossover($selectedParent);
	$secondCrossover = generateSecondCrossover($selectedParent, $firstCrossover->crossReal);
	$mutasi =  generateMutasi($selectedParent);
	$bestFitCrossover = calculateBestCross([$firstCrossover->childA, $firstCrossover->childB], $secondCrossover);
	$bestFitMutasi = calculateBestMutasi($mutasi);
	$minute = transformToMinute($bestFitCrossover['id'], $bestFitMutasi['id'], $fitnesIndividu);

	// print("<pre>".print_r($hasil,true)."</pre>");
	// print("<pre>".print_r($individu,true)."</pre>");
	// print("<pre>".print_r($fitnesIndividu,true)."</pre>"); // koma kurang pas padadhal angka pas
	// print("<pre>".print_r($selectedParent,true)."</pre>");
	// print("<pre>".print_r($firstCrossover,true)."</pre>");
	// print("<pre>".print_r($secondCrossover,true)."</pre>");
	// print("<pre>".print_r($mutasi,true)."</pre>");
	// print("<pre>".print_r($bestFitCrossover,true)."</pre>");
	// print("<pre>".print_r($bestFitMutasi,true)."</pre>");
	// print("<pre>".print_r($minute,true)."</pre>");
?>