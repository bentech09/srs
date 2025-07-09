<?php

    class createCardController {

        private createCardService $createCardService;

        public function __construct(createCardService $createCardService) {
            $this->createCardService = $createCardService;
        }
        
        public function submitCreateCard() {
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

                return $this->createCardService->createCard($data);
            }
        }
    }
?>




