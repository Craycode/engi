<?php

namespace Engi\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity 
 * @Table(name="people")
 * */
class Person
{
    /**
     * @Id
     * @Column(type="integer", length=32, unique=true, nullable=false)
     * @GeneratedValue
     * @var integer 
     */
    public $id;

    /**
     * @Column(type="string", length=32, unique=false, nullable=true)
     * @var string 
     */
    public $name;

    /**
     * @Column(type="integer", length=32, unique=false, nullable=true)
     * @var int 
     */
    public $age;

    /**
     * @ManyToOne(targetEntity="Person", cascade={"all"}, fetch="LAZY", inversedBy="children")
     * @var type 
     */
    public $parent;

    /**
     * @OneToMany(targetEntity="Person", mappedBy="parent", cascade={"persist"}, orphanRemoval=true)
     * @var type 
     */
    public $children;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

}
