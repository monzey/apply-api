<?php

namespace AppBundle\Action;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
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
    protected $knpSnappyPdf;
    protected $view;
    protected $em;

    /**
     * @param \Knp\Snappy\Pdf $knpSnappyPdf
     * @param \Twig\Environment $view
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(\Knp\Snappy\Pdf $knpSnappyPdf, \Twig\Environment $view, \Doctrine\ORM\EntityManager $em)
    {
        $this->knpSnappyPdf = $knpSnappyPdf;
        $this->view = $view;
        $this->em = $em;
    }
    
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
        $html = $this->view->render('print.html.twig', array(
            'resume' => $resume
        ));

        return new Response($html, Response::HTTP_OK);
        // return new PdfResponse($this->knpSnappyPdf->getOutputFromHtml($html), 'file.pdf');
    }
} // END class ResumePrintAction
