<?php
class Version{
    private $id_version;
    private $version;
    private $software;

    public function set_id_version($id_version)
    {
        $this->id_version = (int) $id_version;
    }

    public function get_id_version(){
        return (int) $this->id_version;
    }

    public function set_version($version){
        $this->version = (string) strtoupper($version);
    }

    public function set_software($software){
        $this->software = (string) $software;
    }

    public function get_validator(){
        if($this->version != '' && $this->software != '')
            return true;
        else
            return false;
    }

    public function get_model(){
        return (array) ['id_version' => (int) $this->id_version, 'version' => (string) $this->version, 'software' => (string) $this->software];
    }
}
?>