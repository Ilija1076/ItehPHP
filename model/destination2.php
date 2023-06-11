<?php 
class Destination
{
    public $id;
    public $place;
    public $distance;
    public $time;
    public $departure;

    public function __construct($id = null, $place = null, $distance = null, $time = null, $departure = null)
    {
        $this->id = $id;
        $this->place = $place;
        $this->distance = $distance;
        $this->time = $time;
        $this->departure = $departure;
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM destinations2";
        return $conn->query($query);
    }

    public static function deleteById($id, mysqli $conn)
    {
        $query = "DELETE FROM destinations2 WHERE id=$id";
        return $conn->query($query);
    }

    public static function add($place, $distance, $time, $departure, mysqli $conn)
    {
        $query = "INSERT INTO destinations2 (place, distance, time, departure) VALUES ('$place', '$distance', '$time', '$departure')";
        return $conn->query($query);
    }

    public static function getById($id, mysqli $conn)
    {
        $query = "SELECT * FROM destinations2 WHERE id=$id";
        $destinations = array();

        if ($res = $conn->query($query)) {
            while ($row = $res->fetch_array(1)) {
                $destinations[] = $row;
            }
        }

        return $destinations;
    }

}
?>