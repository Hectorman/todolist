<?php

Class Login_Database extends CI_Model {

public function __construct()
{
    $this->load->database();
}

// Insert registration data in database
public function registration_insert($data) {

    // Query to check whether username already exist or not
    $condition = "email =" . "'" . $data['email'] . "'";
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 0) {

        // Query to insert data in database
        $this->db->insert('usuarios', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }

    } else {

        return false;
        
    }
}

// Read data using email and password
public function login($data) {

    $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {

        return true;

    } else {

        return false;

    }
}

// Read data from database to show data in admin page
public function read_user_information($email) {

    $condition = "email =" . "'" . $email . "'";
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {

        return $query->result();

    } else {

        return false;

    }
}

}

?>