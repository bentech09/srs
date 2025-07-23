<?php

class cardController
{

    private cardService $cardService;

    public function __construct(cardService $cardService)
    {
        $this->cardService = $cardService;
    }

    public function createCard()
    {
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
            } catch (InvalidArgumentException $e) {
                echo $e->getMessage();
            }
            return;
        }
    }

    public function listAllCards()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->cardService->listAllCards();
            require_once __DIR__ . '/view/listAllCards.php';
            return;
        }
        return;
    }

    public function updateCard()
    {
        $data = [
            'question' => [''],
            'answer'   => [''],
            'id'       => [''],
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'question' => $_POST['question'] ?? '',
                'answer'   => $_POST['answer'] ?? '',
                'id'       => $_POST['id'] ?? '',
            ];

            try {
                return $this->cardService->updateCard($data);
            } catch (InvalidArgumentException $e) {
                echo $e->getMessage();
            }
            return;
        }
    }
}
