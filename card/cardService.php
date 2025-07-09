<?php
    /** @package  */
    class cardService {
        private cardRepository $cardRepository;

        public function __construct(cardRepository $cardRepository) {
            $this->cardRepository = $cardRepository;
        }

        public function createCard($data) {
            $this->cardRepository->createCard($data);
        }


            /*$result = cardFormValidator::validate($data);
            if ($result === true) {
                foreach($data as $value){
                    echo $value . '<br>';
                }
            } else {
                $errorinstance->renderErrors($result);
            }*/
    }
?>         