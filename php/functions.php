

    function getGenres(){
        $mysqli = dbConnect();
        $result =$mysqli->query("SELECT DISTINCT name FROM genres");
        while($row = $result->fetch_assoc()){
            $genres[] = $row;
        }
        return $genres;

    }

    function getHomePageBooks($int){
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM books ORDER BY rand() LIMIT $int");
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }