<?php

    class Destino
    {
        private $destID;
        private $destNombre;
        private $regID;
        static  $regNombre;
        private $destPrecio;
        private $destAsientos;
        private $destDisponibles;
        private $destActivo;

    ##################################
    ### CRUD de destinos

        public function listarDestinos()
        {
            $link = Conexion::conectar();
            $sql = "SELECT destID, destNombre,
                           destinos.regID, regiones.regNombre,
                           destPrecio, 
                           destAsientos, destDisponibles,
                           destActivo
                       FROM destinos, regiones
                       WHERE destinos.regID = regiones.regID";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $destinos = $stmt->fetchAll();
            return $destinos;
        }

        public function verDestinoPorID()
        {
            $destID = $_GET['destID'];
            $link = Conexion::conectar();
            $sql = "SELECT destID, destNombre,
                           destinos.regID, regiones.regNombre,
                           destPrecio, 
                           destAsientos, destDisponibles,
                           destActivo
                       FROM destinos, regiones
                       WHERE destinos.regID = regiones.regID
                        AND  destinos.destID = :destID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':destID', $destID, PDO::PARAM_INT);
            $stmt->execute();
            $destino = $stmt->fetch();
            //registrar todos los atributos
            $this->setDestID($destino['destID']);
            $this->setDestNombre($destino['destNombre']);
            $this->setRegID($destino['regID']);
            self::setRegNombre($destino['regNombre']);
            $this->setDestPrecio($destino['destPrecio']);
            $this->setDestAsientos($destino['destAsientos']);
            $this->setDestDisponibles($destino['destDisponibles']);
            return $this;
        }

        public function agregarDestino()
        {
            $destNombre = $_POST['destNombre'];
            $regID = $_POST['regID'];
            $destPrecio = $_POST['destPrecio'];
            $destAsientos = $_POST['destAsientos'];
            $destDisponibles = $_POST['destDisponibles'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO destinos
                        ( destNombre, regID, destPrecio, destAsientos, destDisponibles )
                        VALUE
                        ( :destNombre, :regID, :destPrecio, :destAsientos, :destDisponibles )";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
            $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);

            if( $stmt->execute() ){
                $this->setDestID( $link->lastInsertId() );
                $this->destNombre( $destNombre );
                $this->setRegID($regID);
                $this->setDestPrecio($destPrecio);
                $this->setDestAsientos($destAsientos);
                $this->setDestDisponibles($destDisponibles);
                $this->setDestActivo(1);//default
                return $this;
            }
            return false;
        }

        public function modificarDestino()
        {
            $destID = $_POST['destID'];
            $destNombre = $_POST['destNombre'];
            $regID = $_POST['regID'];
            $destPrecio = $_POST['destPrecio'];
            $destAsientos = $_POST['destAsientos'];
            $destDisponibles = $_POST['destDisponibles'];
            $link = Conexion::conectar();
            $sql = "UPDATE destinos
                        SET 
                            destNombre = :destNombre,
                            regID = :regID,
                            destPrecio = :destPrecio,
                            destAsientos = :destAsientos,
                            destDisponibles = :destDisponibles
                        WHERE 
                            destID = :destID";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
            $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
            $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
            $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
            $stmt->bindParam(':destID', $destID, PDO::PARAM_INT);

            if( $stmt->execute() ){
                $this->setDestID( $destID );
                $this->setDestNombre($destNombre);
                $this->setRegID($regID);
                $this->setDestPrecio($destPrecio);
                $this->setDestAsientos($destAsientos);
                $this->setDestDisponibles($destDisponibles);
                $this->setDestActivo(1);//default
                return $this;
            }
            return false;
        }
        
        /**
         * @return mixed
         */
        public function getDestID()
        {
            return $this->destID;
        }

        /**
         * @param mixed $destID
         */
        public function setDestID($destID): void
        {
            $this->destID = $destID;
        }

        /**
         * @return mixed
         */
        public function getDestNombre()
        {
            return $this->destNombre;
        }

        /**
         * @param mixed $destNombre
         */
        public function setDestNombre($destNombre): void
        {
            $this->destNombre = $destNombre;
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
        public static function getRegNombre()
        {
            return self::$regNombre;
        }

        /**
         * @param mixed $regNombre
         */
        public static function setRegNombre($regNombre): void
        {
            self::$regNombre = $regNombre;
        }

        /**
         * @return mixed
         */
        public function getDestPrecio()
        {
            return $this->destPrecio;
        }

        /**
         * @param mixed $destPrecio
         */
        public function setDestPrecio($destPrecio): void
        {
            $this->destPrecio = $destPrecio;
        }

        /**
         * @return mixed
         */
        public function getDestAsientos()
        {
            return $this->destAsientos;
        }

        /**
         * @param mixed $destAsientos
         */
        public function setDestAsientos($destAsientos): void
        {
            $this->destAsientos = $destAsientos;
        }

        /**
         * @return mixed
         */
        public function getDestDisponibles()
        {
            return $this->destDisponibles;
        }

        /**
         * @param mixed $destDisponibles
         */
        public function setDestDisponibles($destDisponibles): void
        {
            $this->destDisponibles = $destDisponibles;
        }

        /**
         * @return mixed
         */
        public function getDestActivo()
        {
            return $this->destActivo;
        }

        /**
         * @param mixed $destActivo
         */
        public function setDestActivo($destActivo): void
        {
            $this->destActivo = $destActivo;
        }

    }