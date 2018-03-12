<?php

namespace AppBundle\Action;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Resume;

/**
 * Action for getting parameters
 *
 * @package default
 * @subpackage default
 * @author monzey
 */
class ParametersGetAction
{
    protected $em;
    protected $serializer;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     * @param \Symfony\Component\Serializer\Serializer $serializer
     */
    public function __construct(\Doctrine\ORM\EntityManager $em, \Symfony\Component\Serializer\Serializer $serializer)
    {
        $this->em = $em;
        $this->serializer = $serializer;
    }
    
    /**
     * @Route(
     *     name="parameters_get",
     *     path="/parameters",
     *     methods={"GET"},
     *     defaults={"api_resource_class"=Parameters::class, "_api_item_opration_name"="get"}
     * )
     *
     * @return void
     * @author monzey
     */
    public function __invoke()
    {
        $parameters = $this->em->getRepository('AppBundle:Parameters')->find(1);

        return new Response($this->serializer->serialize($parameters, 'json'), Response::HTTP_OK);
    }
} // END class ParametersGetAction
