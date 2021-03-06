<?php

namespace DataAccess {
    if(isset($_SERVER['argv'])) {
        if (strpos($_SERVER['argv'][0], 'phpunit') !== FALSE) {
            include_once "../Framework/Logging/Logging.php";
        }else{
            include_once "../Framework/Logging/Logging.php";
        }
    }
    else{
        include_once "../Framework/Logging/Logging.php";
    }

    class DataAccess
    {

        public $connection;
        private $host = "localhost";
        private $user = 'public';
        private $password = 'P@ssword';
        private $database = 'OCDXGroup1';
        private $logger = null;

        public function __construct()
        {
            if ($this->logger == null) {
                $this->logger = new \Framework\Logging();
            }
            $this->connection = new \mysqli($this->host, $this->user, $this->password, $this->database);
        }

        public function getUserByUserName($username)
        {
            $this->logger->logInfo("Calling pGetUserByUserName, username is ".$username);
            $stmt = $this->connection->prepare("CALL pGetUserByUserName(?)");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result) {
                $this->logger->logError("There was an error retrieving a user: " . $this->connection->error);
                return null;
            }
            $stmt->close();
            return $result;
        }

        public function getManifestByManifestId($manifestId){
            $this->logger->logInfo("Calling pSelectManifestAndFiles, manifest id is ".$manifestId);
            $stmt = $this->connection->prepare("CALL pSelectManifestAndFiles(?)");
            $stmt->bind_param("i", $manifestId);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result) {
                $this->logger->logError("There was an error retrieving a manifest by id : " . $this->connection->error);
                return null;
            }
            $stmt->close();
            return $result;
        }

        public function getByteStat(){
            $stmt = $this->connection->prepare("CALL pSumBytes()");
            $stmt->execute();
            $result = $stmt->get_result();
            if($result == null){
                return null;
            }
            else{
                return $result;
            }
            $stmt->close();
            return $result;
        }

        public function getRecentlyAddedManifests(){
            $stmt = $this->connection->prepare("CALL pSelectRecentlyAdded()");
            $stmt->execute();
            $result = $stmt->get_result();
            if($result == null){
                return null;
            }
            else{
                return $result;
            }
            $stmt->close();
            return $result;
        }

        public function searchByUsername($username)
        {
            $stmt = $this->connection->prepare("CALL pSearchByUsername(?)");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result) {
                $this->logger->logError("There was an error retreiving a file by user name: " . $this->connection->error);
                return null;
            }
            $stmt->close();
            return $result;
        }

        public function searchManifest($searchField){
            $stmt = $this->connection->prepare("CALL pSearchManifest(?)");
            $stmt->bind_param("s", $searchField);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!$result) {
                $this->logger->logError("There was an error searching a manifest: " . $this->connection->error);
                return null;
            }
            $stmt->close();
            return $result;
        }

        public function insertFile($file,$abstract,$researchId){
            if($file != null) {
                $name = $file["name"];
                $type = explode(".", $name)[1];
                $size = $file["size"];
                $url = "/publicFiles/" . $name;
                $checksum = "";
                $stmt = $this->connection->prepare("CALL pInsertFile(?,?,?,?,?,?,?)");
                $stmt->bind_param("sssissi", $name, $type, $abstract, $size, $url, $checksum, $researchId);
                $stmt->execute();
                $result = $stmt->affected_rows;
                if ($result == -1) {
                    $this->logger->logError("There was an error inserting a file: " . $this->connection->error);
                    return $result;
                }
                $stmt->close();
                return $result;
            }
            else{
                $this->logger->logError("There was an error inserting a file, the file was null");
                return -1;
            }
        }

        public function insertManifest($standardsVersion, $comment, $userId, $title)
        {
            $this->logger->logInfo("Calling insert manifest, parameters are $standardsVersion $comment $userId $title");
            $stmt = $this->connection->prepare("CALL pInsertManifest(?,?,?,?)");
            $stmt->bind_param("ssis", $standardsVersion, $comment, $userId, $title);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($stmt->affected_rows == -1) {
                $this->logger->logError("There was an error inserting a manifest: " . $this->connection->error);
                return null;
            }
            else{
                $this->logger->logInfo("Successfully inserted manifest");
            }
            $stmt->close();
            return $result;
        }

        public function insertResearchObject($title, $abstract, $oversight, $oversightType, $informedConsent, $privacy, $provenance, $permissions, $manifestId)
        {
            $stmt = $this->connection->prepare("CALL pInsertResearchObject(?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssisssssi", $title, $abstract, $oversight, $oversightType, $informedConsent, $privacy, $provenance, $permissions, $manifestId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($stmt->affected_rows == -1) {
                $this->logger->logError("There was an error inserting a research object: " . $this->connection->error);
                return null;
            }
            $stmt->close();
            return $result;
        }

        public function insertResearcher($name, $role, $type, $contact)
        {
            $stmt = $this->connection->prepare("CALL pInsertResearcher(?,?,?,?)");
            $stmt->bind_param("ssss", $name, $role, $type, $contact);
            $stmt->execute();
            $result = $stmt->affected_rows;
            if ($stmt->affected_rows == -1) {
                $this->logger->logError("There was an error inserting a researcher: " . $this->connection->error);
                return null;
            }
            $stmt->close();
            return $result;
        }

        public function insertUser($username, $password)
        {
            $this->logger->logInfo("Calling insert user, the username is ".$username);
            $hpass = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->connection->prepare("CALL pInsertUser(?,?)");
            $stmt->bind_param("ss", $username, $hpass);
            $stmt->execute();
            $result = $stmt->affected_rows;
            if ($result == -1) {
                $this->logger->logError("There was an error inserting a user: " . $this->connection->error);
                return -1;
            }
            else{
                $this->logger->logInfo("Successfully created a new user");
            }
            $stmt->close();
            return $result;
        }

        public function deleteManifest($manifest_id)
        {
            $this->logger->logInfo("Calling delete manifest, the manifest id is ".$manifest_id);
            $stmt = $this->connection->prepare("CALL pDeleteManifest(?)");
            $stmt->bind_param("i", $manifest_id);
            $stmt->execute();
            $result = $stmt->affected_rows;
            if ($result == -1) {
                $this->logger->logError("There was an error deleting a manifest: " . $this->connection->error);
                return null;
            }
            else{
                $this->logger->logInfo("Successfully deleted manifest");
            }
            $stmt->close();
            return $result;
        }

        public function deleteFile($file_id)
        {
            $this->logger->logInfo("Calling delete file, the file id is ".$file_id);
            $stmt = $this->connection->prepare("CALL pDeleteFile(?)");
            $stmt->bind_param("i", $file_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result == null) {
                $this->logger->logError("There was an error deleting a file: " . $this->connection->error);
                return null;
            }
            else{
                $this->logger->logInfo("Successfully deleted file");
            }
            $stmt->close();
            return $result;
        }

        public function updateManifest($standardsVersion, $comment, $title,$manifestId)
        {
            $this->logger->logInfo("Calling update manifest, parameters are $standardsVersion $comment $title $manifestId");
            $stmt = $this->connection->prepare("CALL pUpdateManifest(?,?,?,?)");
            $stmt->bind_param("sssi", $standardsVersion, $comment, $title,$manifestId);
            $stmt->execute();
            if ($stmt->affected_rows == -1) {
                $this->logger->logError("There was an error updating a manifest: " . $this->connection->error);
                return -1;
            }
            else{
                $this->logger->logInfo("Successfully updated manifest");
            }
            $stmt->close();
            return 1;
        }

        public function close()
        {
            return $this->connection->close();
        }

    }

}
?>