<?php

/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2/2/2017
 * Time: 2:38 PM
 */
class Project
{
    private $name;
    private $link;

    /**
     * Project constructor.
     * @param $name
     * @param $link
     */
    public function __construct($name, $link)
    {
        $this->name = $name;
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    public static function getProjects()
    {
        $path = __DIR__ . '/../';

        $forbiddens = ['img', 'webalizer', 'xampp'];

        $rs = array();

        foreach (new DirectoryIterator($path) as $file) {
            if ($file->isDot()) continue;

            if ($file->isDir() && !in_array($file->getFilename(), $forbiddens)) {
                array_push($rs, new Project($file->getFilename(), $file->getFilename()));
            }
        }

        return $rs;
    }
}