<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kombinatorik extends CI_Controller {
	public function index()
	{
		$n = 5; // Starting number
    	$r = 5; // Ending number
		$n=$this->input->get('nilai_n');
		$r=$this->input->get('nilai_r');
		empty($n)||$n=="" || $n>7?$n=5:$n=$this->input->get('nilai_n');
		empty($r)||$r=="" || $r>7?$r=5:$r=$this->input->get('nilai_r');
		$s=0;
		if($r>$n){
			$elements = range(1, $r); 
			$permutationsdetail = $this->generatePermutationsDetail($elements,
			 $n);
			$data['permutasi_label']="Permutasi P(".$r.",".$n.")";
		}else{
			$elements = range(1, $n); 
			$permutationsdetail = $this->generatePermutationsDetail($elements, 
			$r);
			$data['permutasi_label']="Permutasi P(".$n.",".$r.")";
		}
		$data['permutationsdetail'] = $permutationsdetail;
    	$this->load->view('permutation_view', $data);
		
	}
	public function generatePermutationsDetail($elements, $r, $permutation = []){
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
			$permutations = array_merge($permutations, 
			$this->generatePermutationsDetail($remaining, $r, $newPermutation));
		}
		return $permutations;
	}
}
