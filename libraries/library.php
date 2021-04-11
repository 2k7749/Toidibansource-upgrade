
    public function UserDetails($id)
    {
        $id = mysqli_real_escape_string($this->db, $id);
        $query = "SELECT `first_name`, `last_name`, `email`, `password`  FROM `users` WHERE `id` = '$id'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $row;
            }
        }

        return $data;
    }