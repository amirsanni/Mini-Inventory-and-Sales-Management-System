<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Genmod
 *
 * @author Amir <amirsanni@gmail.com>
 */
class Genmod extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */

    /**
     * Update any single column in any table using a single column in the where clause
     * @param string $tableName the name of the table to update
     * @param string $colName name of column to update
     * @param mixed $colVal value to insert into $colName
     * @param string $whereCol column to use in the where clause
     * @param mixed $whereColVal value of column $whereCol
     * @return boolean
     */
    public function updateTableCol($tableName, $colName, $colVal, $whereCol, $whereColVal){
        $q = "UPDATE $tableName SET $colName = ? WHERE $whereCol = ?";
        
        $this->db->query($q, [$colVal, $whereColVal]);
        
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        
        else{
            return FALSE;
        }
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * get a single column from any table using a single column in the where clause
     * @param string $tableName
     * @param string $selColName
     * @param string $whereColName
     * @param mixed $colValue
     * @return boolean
     */
    public function getTableCol($tableName, $selColName, $whereColName, $colValue){
        $q = "SELECT $selColName FROM $tableName WHERE $whereColName = ?";
        
        $run_q = $this->db->query($q, [$colValue]);
        
        if($run_q->num_rows() > 0){
            foreach($run_q->result() as $get){
                return $get->$selColName;
            }
        }
        
        else{
            return FALSE;
        }
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    
    /**
     * 
     * @param type $event
     * @param type $eventRowIdOrRef
     * @param type $eventDesc
     * @param type $eventTable
     * @param type $staffId
     * @return boolean
     */
    public function addevent($event, $eventRowIdOrRef, $eventDesc, $eventTable, $staffId){
        $data = ['event'=>$event, 'eventRowIdOrRef'=>$eventRowIdOrRef, 'eventDesc'=>$eventDesc, 'eventTable'=>$eventTable, 'staffInCharge'=>$staffId];
        
        $this->db->insert('eventlog', $data);
        
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        
        else{
            return FALSE;
        }
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param type $admin_id
     * @return boolean
     */
    public function get_admin_name($admin_id){
       $q = "SELECT CONCAT_WS(' ', first_name, last_name) as 'name' FROM admin WHERE id = ?";
       
       $run_q = $this->db->query($q, [$admin_id]);
       
       if($run_q->num_rows() > 0){
           foreach($run_q->result_array() as $get){
               return $get['name'];
           }
       }
       
       else{
           return FALSE;
       }
   }
   
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
   
   /**
    * 
    * @param type $id
    * @param type $table_name
    * @return boolean
    */
   public function update_last_seen_time($id, $table_name){
        //set the datetime based on the db driver in use
        $this->db->platform() == "sqlite3" 
                ? 
        $this->db->set('last_seen', "datetime('now')", FALSE) 
                : 
        $this->db->set('last_seen', "NOW()", FALSE);
        
        $this->db->where('id', $id);

        $this->db->update($table_name);

        if($this->db->affected_rows()){
            return TRUE;
        }

        else{
            return FALSE;
        }
    }
    
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param type $year
     * @return boolean
     */
    public function getYearEarnings($year=""){
        $year_to_fetch = $year ? $year : date('Y');
		
        if($this->db->platform() == "sqlite3"){
			$q = "SELECT transDate, totalPrice FROM transactions WHERE strftime('%Y', transDate) = '{$year_to_fetch}'";
			
			$run_q = $this->db->query($q);
		}
		
		else{
			$this->db->select('transDate, totalPrice');
			$this->db->where(['YEAR(transDate)'=>$year_to_fetch]);
			$run_q = $this->db->get('transactions');
		}
        
        if($run_q->num_rows()){
            return $run_q->result();
        }
        
        else{
            return FALSE;
        }
    }
    
    
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * Get all mode of payments
     * @year
     * @return boolean
     */
    public function getPaymentMethods($year){
		if($this->db->platform() == "sqlite3"){
			$q = "SELECT modeOfPayment FROM transactions WHERE strftime('%Y', transDate) GROUP BY ref";
			
			$run_q = $this->db->query($q);
		}
		
		else{
			$this->db->select('modeOfPayment');
			$year ? $this->db->where('YEAR(transDate)', $year) : "";
			$this->db->group_by('ref');
			$run_q = $this->db->get('transactions');
		}
        
        if($run_q->num_rows()){
            return $run_q->result();
        }
        
        else{
            return FALSE;
        }
    }
}
