<?php
    class createCardRepo {

        private query $query;
        public function __construct(query $query) {
            $this->query = $query;
        }

        public function createCard($data): bool {
            return $queryExecute = $this->query->execute("INSERT INTO cards (question, answer) VALUES (?, ?)", [$data['question'], $data['answer']]);
        }
    }

?>



  
  