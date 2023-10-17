<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kombinatorik extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$n = 5; // Starting number
    $r = 5; // Ending number
		$n=$this->input->get('nilai_n');
		$r=$this->input->get('nilai_r');
		empty($n)||$n=="" || $n>7?$n=5:$n=$this->input->get('nilai_n');
		empty($r)||$r=="" || $r>7?$r=5:$r=$this->input->get('nilai_r');
		
		$elements = range(1, $n); 
		$permutations = $this->Generatepermutations($n,$r);
		
		$permutationsdetail = $this->generatePermutationsDetail($elements, $r);
		
		$data['permutationsdetail'] = $permutationsdetail;
		
		$data['permutations'] = $permutations;
		$data['permutasi_label']="Permutasi P(".$n.",".$r.")";
		
    $this->load->view('permutation_view', $data);
		
	}
	public function Generatepermutations($n, $r) {
		if ($n < $r) {
			return 0;
		}
		
		$result = 1;
		for ($i = 0; $i < $r; $i++) {
			$result *= ($n - $i);
		}
		
		return $result;
	}
	public function cyclePermutations($elements, $r, $permutation = []) {
		$permutations = [];

		if (count($permutation) == $r) {
			$permutations[] = $permutation;
			return $permutations;
		}

		for ($i = 0; $i < count($elements); $i++) {
			$current = $elements[$i];
			$remaining = $elements;
			array_splice($remaining, $i, 1);

			$newPermutation = array_merge($permutation, [$current]);
			$permutations = array_merge($permutations, $this->cyclePermutations($remaining, $r, $newPermutation));
		}

		return $permutations;
	}
	public function generatePermutationsDetail($elements, $r, $permutation = []) {
		$permutations = [];

		if (count($permutation) == $r) {
			$permutations[] = implode(', ', $permutation);
			return $permutations;
		}

		for ($i = 0; $i < count($elements); $i++) {
			$current = $elements[$i];
			$remaining = $elements;
			array_splice($remaining, $i, 1);

			$newPermutation = array_merge($permutation, [$current]);
			$permutations = array_merge($permutations, $this->generatePermutationsDetail($remaining, $r, $newPermutation));
		}

		return $permutations;
	}

	public function generateCombinations($n, $m) {
			$permutations = array();

			for ($i = $n; $i <= $m; $i++) {
					for ($j = $n; $j <= $m; $j++) {
							if ($i != $j) {
									$permutations[] = "$i-$j";
							}
					}
			}

			return $permutations;
	}
}
