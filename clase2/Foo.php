<?php

    class Foo
    {
        static $dato;

        private function __construct()
        {
            echo 'método constructor <br>';
        }

        public function publico()
        {
            echo 'método público <br>';
            $this->privado();
        }
        private function privado()
        {
            echo 'método privado <br>';
        }
        static function estatico()
        {
            echo 'método estatico <br>';
        }

        /**
         * @return mixed
         */
        public static function getDato()
        {
            return self::$dato;
        }
        /**
         * @param mixed $dato
         */
        public static function setDato($dato): void
        {
            self::$dato = $dato;
        }

    }

    // mientras tanto, en otro archivo
    # $Foo = new Foo; no se puede porque el constructor es privado
    # $Foo->publico(); no se puede porque no hay objeto
    //$Foo->privado(); no se puede por contexto
    Foo::estatico();