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

    /**
     * @param \Knp\Snappy\Pdf $knpSnappyPdf
     * @param \Twig\Environment $view
     */
    public function __construct(\Knp\Snappy\Pdf $knpSnappyPdf, \Twig\Environment $view)
    {
        $this->knpSnappyPdf = $knpSnappyPdf;
        $this->view = $view;
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
        $html = $this->view->render('print.html.twig', array());

        return new PdfResponse($this->knpSnappyPdf->getOutputFromHtml($html), 'file.pdf');
    }
} // END class ResumePrintAction
