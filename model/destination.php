<?php
class Destination
{
    public $id;
    public $planet;
    public $distance;
    public $time;
    public $departure;

    public function __construct($id = null, $planet = null, $distance = null, $time = null, $departure = null)
    {
        $this->id = $id;
        $this->planet = $planet;
        $this->distance = $distance;
        $this->time = $time;
        $this->departure = $departure;
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM destinations1";
        return $conn->query($query);
    }

    public static function deleteByIds($ids, mysqli $conn)
    {
        $idsString = implode(',', $ids);
        $query = "DELETE FROM destinations1 WHERE id IN ($idsString)";
        return $conn->query($query);
    }


    public static function add($planet, $distance, $time, $departure, mysqli $conn)
    {
        $query = "INSERT INTO destinations1 (planet, distance, time, departure) VALUES ('$planet', '$distance', '$time', '$departure')";
        return $conn->query($query);
    }

    public static function update($id, $planet, $distance, $time, $departure, mysqli $conn)
    {
        $query = "UPDATE destinations1 SET planet=?, distance=?, time=?, departure=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi", $planet, $distance, $time, $departure, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>