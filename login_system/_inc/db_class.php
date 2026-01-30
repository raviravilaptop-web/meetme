<?php
date_default_timezone_set('Asia/Calcutta');
/*
  Project   SimpleDBClass
  Author    Mark Kumar
  Site      http://codewithmark.com/
  Link      https://github.com/codewithmark/php-simple-database-functions
  Howto Doc http://codewithmark.com/php-simple-database-class/
  version   1.17.05.08
  copyright Copyright (c) 2010-2016
  license   http://opensource.org/licenses/gpl-3.0.html GNU Public License
 */

class SimpleDBClass {

    public $isConn;
    //To show query error messages set on or to hide then set to off
    //For trouble shooting only
    public $ShowQryErrors = 'on'; //on or off

    //--->Connect to database - Start
    public function __construct($db_conn = array()) {
        // OpenShift Environment Variables කියවා ගැනීම (එවා නැතිනම් default අගයන් භාවිතා වේ)
        $host     = getenv('DATABASE_SERVICE_NAME') ?: 'mysql'; 
        $user     = getenv('DATABASE_USER') ?: 'cmnwgovl_nimal'; 
        $pass     = getenv('DATABASE_PASSWORD') ?: 'raviravi'; 
        $database = getenv('DATABASE_NAME') ?: 'cmnwgovl_cliet_meet';
        $port     = 3306;

        // Create connection
        $connection = mysqli_connect($host, $user, $pass, $database, $port);
        
        // Check connection
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $this->isConn = $connection;
            mysqli_set_charset($connection, "utf8");
        }
    }
    //--->Connect to database - End

    public function getresultset($query) {
        $con = $this->isConn;
        if (!$con) {
            die("Connection failed in Select function - " . mysqli_connect_error());
        }
        if ($con) {
            $stmt = $con->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
    }

    //--->Select - Start
    function Select($SQLStatement) {
        $con = $this->isConn;
        if (!$con) {
            die("Connection failed in Select function - " . mysqli_connect_error());
        }
        if ($con) {
            $q = $con->query($SQLStatement);
            if (!$q) {
                if ($this->ShowQryErrors == 'on') {
                    die(mysqli_error($con));
                }
            }
            $row = $q->num_rows;
            if ($row < 1) {
                $result = $row;
            } else if ($row == 1) {
                $result = array($q->fetch_assoc());
            } else if ($row > 1) {
                $d1 = array($q->fetch_assoc());
                $d2 = array();
                while ($row = $q->fetch_assoc()) {
                    $d2[] = $row;
                }
                $result = array_merge($d1, $d2);
            }
            return $result;
        }
    }
    //--->Select - End

    //--->Insert - Start  
    function Insert($TableName, $row_arrays = array()) {
        foreach (array_keys($row_arrays) as $key) {
            $columns[] = "$key";
            $values[] = "'" . $row_arrays[$key] . "'";
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
        $sql = "INSERT INTO $TableName ($columns) VALUES ($values)";
        $con = $this->isConn;
        if (!$con) {
            die("Connection failed in query function - " . mysqli_connect_error());
        }
        if ($con) {
            $q = $con->query($sql);
            if (!$q) {
                if ($this->ShowQryErrors == 'on') {
                    die(mysqli_error($con));
                }
                $result = 0;
            } else {
                $result = $con->insert_id;
            }
            return $result;
        }
    }
    //--->Insert - End

    //--->Update - Start
    function Update($strTableName, $array_fields, $array_where) {
        foreach ($array_fields as $key => $value) {
            if ($key) {
                $field_update[] = " $key='$value'";
            }
        }
        $fields_update = implode(',', $field_update);
        foreach ($array_where as $key => $value) {
            if ($key) {
                $field_where[] = " $key='$value'";
            }
        }
        $fields_where = implode(' and ', $field_where);
        $SQLStatement = "UPDATE $strTableName SET $fields_update WHERE $fields_where ";
        $con = $this->isConn;

        if (!$con) {
            die("Connection failed in query function - " . mysqli_connect_error());
        }
        if ($con) {
            $q = $con->query($SQLStatement);
            if (!$q) {
                if ($this->ShowQryErrors == 'on') {
                    die(mysqli_error($con));
                }
                $result = 0;
            } else {
                $result = 1;
            }
            return $result;
        }
    }
    //--->Update - End

    //--->Delete - Start
    function Delete($strTableName, $array_where) {
        foreach ($array_where as $key => $value) {
            if ($key) {
                $field_where[] = " $key='$value' ";
            }
        }
        $fields_where = implode(' and ', $field_where);
        $con = $this->isConn;
        if (!$con) {
            die("Connection failed in query function - " . mysqli_connect_error());
        }
        $QDeleteRec = "DELETE FROM $strTableName WHERE $fields_where";

        if ($con) {
            $q = $con->query($QDeleteRec);
            if ($q) {
                $result = 1;
            } else {
                $result = 0;
            }
            return $result;
        }
    }
    //--->Delete - End

    function Qry($SQLStatement) {
        $con = $this->isConn;
        if (!$con) {
            die("Connection failed in query function - " . mysqli_connect_error());
        }
        if ($con) {
            $q = $con->query($SQLStatement);
            if (!$q) {
                if ($this->ShowQryErrors == 'on') {
                    die(mysqli_error($con));
                }
                $result = 0;
            } else {
                $result = 1;
            }
            return $result;
        }
    }

    function CleanDBData($Data) {
        $con = $this->isConn;
        $str = mysqli_real_escape_string($con, $Data);
        return $str;
    }

    function CleanHTMLData($Data) {
        $con = $this->isConn;
        $str = mysqli_real_escape_string($con, $Data);
        $result = preg_replace('/(?:<|&lt;)\/?([a-zA-Z]+) *[^<\/]*?(?:>|&gt;)/', '', $str);
        return $result;
    }
}
?>
