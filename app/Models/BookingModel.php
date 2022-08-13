<?php
namespace App\Models;
use CodeIgniter\Model;

class BookingModel extends Model{
    protected $table = 'bookings';
    protected $primaryKey = 'bid';
    protected $allowedFields = ['date', 'time', 'reason', 'observations', 'user_id', 'created_at' ,'updated_at'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    /*public function insert($data) {
        return $this->db->insert('bookings', $data);
     }
  
     public function update($data, $id) {
        $this->db->where('id', $id);
  
        return $this->db->update('bookings', $data);
     }
    public function delete($id) {
        $this->db->where('id', $id);
        
        return $this->db->delete('bookings');
     }*/

    public function getBookingsToday() {
        $data = date('Y-m-d', time());
        $this->db->where('date', $data);
        $query = $this->db->get('bookings');
  
        return $query->result();
     }

    public function getBookingbyUser($id) {
        $this->db->where('user_id', $id);
        $query = $this->db->get('bookings');
  
        return $query->result();
     }

    public function getBookingByID($id=NULL) {
        if ($id != NULL):
          //check if booking is in DB
          $this->db->where('bid', $id);           
          $this->db->limit(1);
          //get the booking
          $query = $this->db->get("bookings");        
          //retornamos o produto
          return $query->result();   
        endif;
     }


    public function getName($id=NULL) { //get name of user from table users
        $this->db->select('firstname');    
        $this->db->from('users u');
        $this->db->join('bookings b', 'b.user_id = u.id');
        $this->db->where('b.bid', $id);        
  
        $query = $this->db->get();   
  
        return $query->row_array();
     }


}