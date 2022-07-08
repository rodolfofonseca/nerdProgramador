<?php
class description{
    private $id_description;
    private $id_version;
    private $archivo;
    private $description;

    public function set_id_description($id_description){
        $this->id_description = (int) $id_description;
    }

    public function set_id_version($id_version){
        $this->id_version = (int) $id_version;
    }
    
    public function set_archivo($archivo){
        $this->archivo = (string) $archivo;
    }

    public function set_description($description){
        $this->description = (string) $description;
    }

    public function get_validator(){
        if($this->id_version != 0 && $this->description != '' && $this->archivo != '')
            return true;
        else 
            return false;
    }

    public function get_model(){
        return (array) ['id_description' => (int) $this->id_description, 'id_version' => (int) $this->id_version, 'archivo' => (string) $this->archivo, 'description' => (string) $this->description];
    }
}
?>