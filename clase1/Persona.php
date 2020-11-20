<?php

    class Persona
    {
        private $nombre;
        private $apellido;

        public function verDatos()
        {
            $mensaje = 'Nombre: '.$this->getNombre().'<br>';
            $mensaje .= 'Apellido: '.$this->getApellido().'<br>';

            return $mensaje;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre): void
        {
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getApellido()
        {
            return $this->apellido;
        }

        /**
         * @param mixed $apellido
         */
        public function setApellido($apellido): void
        {
            $this->apellido = $apellido;
        }

    }