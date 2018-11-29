<?php


    class ToString {

        public $param;

        public function __toString() {
            $this->param = $param;
            return $param;
        }
    }

    $bs = new ToString;
    $bs->__toString($commented_by);
