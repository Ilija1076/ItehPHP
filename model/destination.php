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

    public static function deleteById($id, mysqli $conn)
    {
        $query = "DELETE FROM destinations1 WHERE id=$id";
        return $conn->query($query);
    }

    public static function add($planet, $distance, $time, $departure, mysqli $conn)
    {
        $query = "INSERT INTO destinations1 (planet, distance, time, departure) VALUES ('$planet', '$distance', '$time', '$departure')";
        return $conn->query($query);
    }

    public static function update($id, $planet, $distance, $time, $departure, mysqli $conn)
    {
        $query = "UPDATE destinations1 SET planet='$planet', distance='$distance', time='$time', departure='$departure' WHERE id=$id";
        return $conn->query($query);
    }

    public static function getById($id, mysqli $conn)
    {
        $query = "SELECT * FROM destinations1 WHERE id=$id";
        $destinations = array();

        if ($result = $conn->query($query)) {
            while ($row = $result->fetch_array(1)) {
                $destinations[] = $row;
            }
        }

        return $destinations;
    }

    public static function getLast(mysqli $conn)
    {
        $query = "SELECT * FROM destinations1 ORDER BY id DESC LIMIT 1";
        return $conn->query($query);
    }
}
?>