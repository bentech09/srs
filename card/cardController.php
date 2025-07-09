<?php

    class cardController {

        private cardService $cardService;

        public function __construct(cardService $cardService) {
            $this->cardService = $cardService;
        }
        
        public function createCard() {
            $data = [
                'question' => [''],
                'answer'   => [''],
            ];

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {

                require __DIR__ . '/../view/createCardView.php';
                exit;

            } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $data = [
                    'question' => $_POST['question'] ?? '',
                    'answer'   => $_POST['answer'] ?? '',
                    ];

                try { 
                    return $this->cardService->createCard($data);
                } catch(InvalidArgumentException $e) {
                    echo $e->getMessage();
                 }
                return;
            }
        }
    }
?>




