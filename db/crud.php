<?php 

class crud
{

    private PDO $db;

    public function __construct(PDO $conn)
    {
        $this->db = $conn;
    }

    function verifyUser()
    {
        $sql = "SELECT COUNT('username') FROM users WHERE username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $_POST["username"], PDO::PARAM_STR);
        $stmt->execute();
        
        if( $stmt->fetchColumn() ) return TRUE;
        return FALSE;
    }

}

?>