<?php 
class Destination2
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

    public static function deleteByIds($ids, mysqli $conn)
    {
        $idsString = implode(',', $ids);
        $query = "DELETE FROM destinations2 WHERE id IN ($idsString)";
        return $conn->query($query);
    }
    
    public static function add($place, $distance, $time, $departure, mysqli $conn)
    {
        $query = "INSERT INTO destinations2 (place, distance, time, departure) VALUES ('$place', '$distance', '$time', '$departure')";
        return $conn->query($query);
    }

    public static function update($id, $place, $distance, $time, $departure, mysqli $conn)
    {
        $query = "UPDATE destinations2 SET place=?, distance=?, time=?, departure=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi", $place, $distance, $time, $departure, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>