<?php
    /** @package  */
    class cardRepository {

        private query $query;
        public function __construct(query $query) {
            $this->query = $query;
        }

        public function createCard($data): bool {
            return $this->query->execute("INSERT INTO cards (question, answer) VALUES (?, ?)", [$data['question'], $data['answer']]);
        }

        public function listAllCards(): array {
            return $this->query->execute("SELECT * FROM cards");
        }

        public function updateCard($data): bool {
            return $this->query->execute("UPDATE cards SET question = ?,  answer = ? WHERE id = ?", [$data['question'], $data['answer'], $data['id']]);
        }
    }

?>



  
  