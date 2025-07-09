<?php
    /** @package  */
    class createCardService {
        private createCardRepo $createCardRepo;

        public function __construct(createCardRepo $createCardRepo) {
            $this->createCardRepo = $createCardRepo;
        }

        public function createCard($data) {
            $this->createCardRepo->createCard($data);
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