<?php
    class Controller {

        protected function view($view, $data = []) {
            require_once APP_ROOT . 'app/views/' . $view . '.php';
        }

        protected function redirect($url) {
            header('Location: ' . $url);
        }
    }