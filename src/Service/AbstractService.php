<?php

namespace App\Service;

use App\Entity\AbstractEntity;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
* @author Sebastian Thum <mail@sebastianthum.de>
* @copyright 2020
*/
abstract class AbstractService
{

    /**
    * @var EntityManagerInterface
    */
    protected $em;

    /**
    * @var
    */
    protected $repository;

    /**
    * ServiceAbstract constructor.
    * @param EntityManagerInterface $em
    */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
    * @return ObjectRepository
    */
    protected function getRepository()
    {
        return $this->repository;
    }

    /**
    * @param AbstractEntity $entity
    */
    public function saveOne(AbstractEntity $entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
    * @param array $entities
    */
    public function save(array $entities)
    {
        foreach ($entities as $entity) {
            $this->em->persist($entity);
        }

        $this->em->flush();
    }

    /**
    * @param $id
    * @return null|object
    */
    public function find($id): ?AbstractEntity
    {
        return $this->getRepository()->find($id);
    }

    /**
    * @param array $criteria
    * @return null|object
    */
    public function findOneBy(array $criteria = []): ?AbstractEntity
    {
        return $this->getRepository()->findOneBy($criteria);
    }

    /**
    * @param array|null $criteria
    * @param array|null $orderBy
    * @param null $limit
    * @param null $offset
    * @return AbstractEntity[]
    */
    public function findBy(array $criteria = null, array $orderBy = null, $limit = null, $offset = null): array
    {
        return $this->getRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
    * @return AbstractEntity[]
    */
    public function findAll(): array
    {
        return $this->getRepository()->findAll();
    }

}