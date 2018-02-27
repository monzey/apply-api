<?php

namespace AppBundle\Action;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Resume;

/**
 * Action for printing resume
 *
 * @package default
 * @subpackage default
 * @author monzey
 */
class ResumePrintAction
{
    /**
     * @Route(
     *     name="resume_print",
     *     path="/resumes/{id}/print",
     *     methods={"GET"},
     *     defaults={"api_resource_class"=Resume::class, "_api_item_opration_name"="print"}
     * )
     *
     * @return void
     * @author monzey
     */
    public function __invoke(Resume $resume)
    {
        return new Response(null, Response::HTTP_OK);
    }
} // END class ResumePrintAction
