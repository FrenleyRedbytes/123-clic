<?php
class SubcategoryModel extends CI_Model{
    function __construct(){
	   $this->load->database();
	}
// Data Fatch subcategory
	function show_enquiry()
	{	
		$this->db->select('*');
        $this->db->from('subcategory s');
        $this->db->join('category sh', 'sh.cat_id=s.cat_id', 'left');
	     $query=$this->db->get();
		 return $query->result_array();
	}
// show category
	function show_category(){
		$query=$this->db->get('category');
		return $query->result_array();
	}

//Add subcategory
	function insert_data($table,$data){
		$this->db->insert($table,$data);
		redirect('subcategory');
	}
// update show category
	public function update_subimage($id,$file_name){
		$this->db->where('subcat_id',$id);
		$this->db->update('subcategory',array('logos'=>$file_name));
	}
//Show dt fro edit AC to ADmin ID
	function find_enquiry($id)
	{
	     $query=$this->db->get_where('subcategory',array("subcat_id"=>$id));
		 return $query->result_array();
	}
//udate admin part 
	function update_reg($id,$cat,$subcat_name,$file_name,$file_name1){	
	 $this->db->where("subcat_id",$id);
     $query=$this->db->update('subcategory',
	           array("cat_id"=>$cat,"subcat_name"=>$subcat_name,"logos"=>$file_name,"logos1"=>$file_name1));
	   if($query)
	   {
	    redirect('subcategory');
	   }
	}
//Delete Admin
	function delete_enquiry($id){
	   $query=$this->db->delete('subcategory',array("subcat_id"=>$id));
	   redirect('subcategory');
	}
// --------------------------------------------------------------------------------------	

		
}

?>