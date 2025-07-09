<?php
    /** @package  */
    class cardService {
        private cardRepository $cardRepository;
        private createCardValidatorInterface $createCardValidatorInterface;

        public function __construct(cardRepository $cardRepository, createCardValidatorInterface $createCardValidatorInterface) {
            $this->cardRepository = $cardRepository;
            $this->createCardValidatorInterface = $createCardValidatorInterface;
        }

        public function validateCard($data) {
            $result = $this->createCardValidatorInterface->validate($data);

            if ($result !== true) {
                //var_dump($result);
                throw new InvalidArgumentException($result);
            } 
        }

        public function createCard($data) {
            $this->validateCard($data);
            $this->cardRepository->createCard($data);
        }
    }
?>         