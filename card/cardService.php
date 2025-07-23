<?php

/** @package  */
class cardService
{
    private cardRepository $cardRepository;
    private createCardValidatorInterface $createCardValidatorInterface;

    public function __construct(cardRepository $cardRepository, createCardValidatorInterface $createCardValidatorInterface)
    {
        $this->cardRepository = $cardRepository;
        $this->createCardValidatorInterface = $createCardValidatorInterface;
    }

    public function validateCard($data)
    {
        $result = $this->createCardValidatorInterface->validate($data);

        if ($result !== true) {
            throw new InvalidArgumentException($result);
        }
    }

    public function createCard($data)
    {
        $this->validateCard($data);
        $this->cardRepository->createCard($data);
    }

    public function listAllCards(): array
    {
        return $this->cardRepository->ListAllCards();
    }

    public function updateCard($data)
    {
        $this->validateCard($data);
        $this->cardRepository->updateCard($data);
    }

    public function deleteCard($id)
    {
        $this->cardRepository->deleteCard($id);
    }
}
