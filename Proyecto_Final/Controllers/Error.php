<?php 
    class Errors extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function notFound()
        {
            $this->views->getView($this, "error");
        }

    }// End of class Error
    $notFound = new Errors();
    $notFound->notFound();
?>