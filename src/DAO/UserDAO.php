<?php

namespace NFC\DAO;

use NFC\Domain\User;

class UserDAO extends DAO {
    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id The user id.
     * @return \NFC\Domain\User return a user if matching user is found
     * @throws \Exception throws an exception if no matching user is found
     */
    public function find($id) {
        $sql = "SELECT * FROM NFC_user WHERE user_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row) return $this->buildDomainObject($row); else
            throw new \Exception("No mq_user matching id " . $id);
    }

    public function findAll() {
        $sql = "SELECT * FROM NFC_user";
        $rows = $this->getDb()->fetchAll($sql);

        $users = array();
        foreach ($rows as $row) {
            $user_id = $row['user_id'];
            $users[$user_id] = $this->buildDomainObject($row);
        }

        return $users;
    }

    public function findByUserName($user_name) {
        $sql = "SELECT * FROM NFC_user WHERE user_name=?";
        $row = $this->getDb()->fetchAssoc($sql, array($user_name));

        if ($row) return $this->buildDomainObject($row); else
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $user_name));
    }

    public function getConnectedUser() {
        $sql = "SELECT * FROM NFC_user WHERE user_is_here=1";
        $rows = $this->getDb()->fetchAll($sql);

        $users = array();
        foreach ($rows as $row) {
            $users[] = $this->buildDomainObject($row);
        }

        return $users;
    }

    public function updateUser($user) {
        $sql = "UPDATE NFC_user SET user_is_here = ? WHERE user_name = ?";
        $this->getDb()->executeUpdate($sql, array($user->isHere(), $user->getUserName()));
    }

    /**
     * Crée un objet \Miniquiz\Domain\User en fonction
     * des lignes dan la base de données.
     *
     * @param array $row La ligne contenant les données du User.
     * @return \Miniquiz\Domain\User
     */
    protected function buildDomainObject($row) {
        $user = new User();
        $user->setUserId($row['user_id']);
        $user->setUserName($row['user_name']);
        $user->setHere($row['user_is_here']);

        return $user;
    }
}