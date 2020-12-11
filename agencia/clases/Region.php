<?php

    class Region
    {
        private $regID;
        private $regNombre;

        public function listarRegiones()
        {
            $link = Conexion::conectar();
            $sql = "SELECT regID, regNombre
                        FROM regiones";
            $stmt = $link->prepare($sql);
            $stmt->execute();

            $regiones = $stmt->fetchAll();
            return $regiones;
        }

        public function verRegionPorID()
        {
            $regID = $_GET['regID'];
            $link = Conexion::conectar();
            $sql = "SELECT regID, regNombre
                        FROM regiones
                        WHERE regID = :regID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->execute();
            //obtenemos datos de la base
            $datos = $stmt->fetch();
            // registrar los valores de las atributos
            $this->setRegID($datos['regID']);
            $this->setRegNombre($datos['regNombre']);
            //retornamos objeto de tipo Region
            return $this;
        }

        public function agregarRegion()
        {
            $regNombre = $_POST['regNombre'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO regiones
                        VALUE 
                             ( DEFAULT, :regNombre )";
            $stmt = $link->prepare($sql);
            //data binding
            $stmt->bindParam(':regNombre', $regNombre, PDO::PARAM_STR);

            if( $stmt->execute() ){
                //asignamos atributos
                $this->setRegID( $link->lastInsertId() );
                $this->setRegNombre($regNombre);
                return $this;
            }
            return false;

        }

        public function modificarRegion()
        {
            $regNombre = $_POST['regNombre'];
            $regID = $_POST['regID'];
            $link = Conexion::conectar();
            $sql = "UPDATE regiones
                       SET
                            regNombre = :regNombre
                        WHERE regID = :regID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':regNombre', $regNombre, PDO::PARAM_STR);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            if( $stmt->execute() ){
                //registramos valores de atributos
                $this->setRegID($regID);
                $this->setRegNombre($regNombre);
                return $this;
            }
            return false;
        }
        
        /**
         * @return mixed
         */
        public function getRegID()
        {
            return $this->regID;
        }
        /**
         * @param mixed $regID
         */
        public function setRegID($regID): void
        {
            $this->regID = $regID;
        }

        /**
         * @return mixed
         */
        public function getRegNombre()
        {
            return $this->regNombre;
        }
        /**
         * @param mixed $regNombre
         */
        public function setRegNombre($regNombre): void
        {
            $this->regNombre = $regNombre;
        }

    }