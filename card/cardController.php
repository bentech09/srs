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
                $this->cardService->createCard($data);
                header("Location: index.php?page=listallcards");
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
                $this->cardService->updateCard($data);
                header("Location: index.php?page=listallcards");
            } catch (InvalidArgumentException $e) {
                echo $e->getMessage();
            }
            return;
        }
    }

    public function deleteCard()
    {
        $id = [
            null => null,
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = [
                'id' => $_GET['id'],
            ];

            try {
                $this->cardService->deleteCard($id);
                header("Location: index.php?page=listallcards");
            } catch (InvalidArgumentException $e) {
                echo $e->getMessage();
            }

            return;
        }
    }
}
