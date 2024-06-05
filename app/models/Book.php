<?php
    class Book {
        public $id;
        public $name;
        public $author;

        public function __construct($id, $name, $author) {
            $this->id = $id;
            $this->name = $name;
            $this->author = $author;
        }
    }