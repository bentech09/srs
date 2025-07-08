<?php
    require_once __DIR__ . '/../database/databaseHandlerInterface.php';
    require_once __DIR__ . '/queryHandlerInterface.php';

    class queryMysqliHandler implements queryHandlerInterface {

        private database $database;

        public function __construct(database $database) {
            $this->database = $database;
        }

        /* Map parameter types for bind_param() (eg. 'ssi') */
        /**
         * @param array $params 
         * @return string 
         */
        private function getParamTypes(array $params): string {
            return implode('', array_map(function ($param) {
                return match (gettype($param)) {
                    'integer' => 'i',
                    'double'  => 'd',
                    'string'  => 's',
                    default   => 'b', // binary, null, etc.
                };
            }, $params));
        }

        /* Bind parameters to prepared statement */
        /**
         * @param mysqli_stmt $stmt 
         * @param array $params 
         * @return void 
         * @throws Exception 
         */
        private function bindParams(mysqli_stmt $stmt, array $params): void {
            if (empty($params)) {
            return; //nothing to bind

            }
            $types = $this->getParamTypes($params);

            // Generate referentions
            $refs = [];
            foreach ($params as $i => $val) {
                $refs[$i] = &$params[$i];
            }

            //Add parameters and parameters type into one array
            array_unshift($refs, $types);

            //call $stmt->bind_param('', $arg) via callback
            call_user_func_array([$stmt, 'bind_param'], $refs);
        }

        // Method to execute a raw SQL query with prepared statements
        //$query->execute("INSERT INTO cards (question, answer) VALUES (?, ?)", ["i am:", "unknown"]);
        public function execute($sql, $params = []) {

                $database = $this->database->getConnection();
                $stmt = $database->prepare($sql);
                $this->bindParams($stmt, $params);
                $stmt->execute();

                //  SELECT → fetch data
                if (stripos(trim($sql), 'SELECT') === 0) {
                    $result = $stmt->get_result();
                    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
                }

                //  INSERT → return insert_id
                if (stripos(trim($sql), 'INSERT') === 0) {
                    return $stmt->insert_id ?: $database->insert_id;
                }

                //  UPDATE / DELETE → return affected rows
                return $stmt->affected_rows;
        }
}

?>