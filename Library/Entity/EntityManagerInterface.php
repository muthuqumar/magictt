<?php

namespace Library\Entity;

interface EntityManagerInterface
{
	public function getRepository($entityName);
	
	public function getMapper($entityName);
	
	public function createNew($entityName, array $args = array());
}
