<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visasponsors_model extends CRUD_model {

    public function __construct() {
        parent::__construct();
        $this->table_name="visa_sponsors";
        $this->field="id";
    }
}
?>



