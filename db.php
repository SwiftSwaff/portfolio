<?php
class DB {
    protected static $_instance = null;
    protected $_conn;
    protected $_config;
    
    protected function __construct() {
        $xml = json_decode(json_encode(simplexml_load_file(getenv("DOCUMENT_ROOT") . "/config/db.xml")), true);
        
        $xmlTable = ($xml["current-env"] == "live") ? $xml["live-database"] : $xml["development-database"];
        
        $this->_config = array(
            "host" => !empty($xmlTable["host"]) ? $xmlTable["host"] : "",
            "user" => !empty($xmlTable["user"]) ? $xmlTable["user"] : "",
            "pass" => !empty($xmlTable["pass"]) ? $xmlTable["pass"] : "",
            "name" => !empty($xmlTable["name"]) ? $xmlTable["name"] : ""
        );
    }

    public function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getConnection() {
        if (is_null($this->_conn)) {
            $config = $this->_config;
            $this->_conn = new mysqli($config["host"], $config["user"], $config["pass"], $config["name"]) 
                            or die("Connect failed: %s\n" . $this->db->error);
        }
        return $this->_conn;
    }

    public function makeQuery($query, $params = array()) {
        $conn = $this->getConnection();
        if (!empty($params)) {
            $types = $this->getTypes($params);

            $stmt = mysqli_prepare($conn, $query);
            
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            mysqli_stmt_execute($stmt);
            return $stmt;
        }
        else {
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_execute($stmt);
            return $stmt;
        }
    }
    private function getTypes($params) {
        $types = "";
        foreach ($params as $param) {
            switch (gettype($param)) {
                case "string":
                    $types.= 's';
                    break;
                case "integer":
                    $types.= 'd';
                    break;
                case "double":
                    $types.= 'd';
                    break;
                case "boolean":
                    $types.= 'i';
                    break;
                default:
                    $types.= 's';
                    break;
            }
        }
        return $types;
    }
}
?>