<?php

namespace Sandbox\WebsiteBundle\Controller;

use Sandbox\WebsiteBundle\AdminList\SatelliteAdminListConfigurator;
use Kunstmaan\AdminListBundle\Controller\AdminListController;
use Kunstmaan\AdminListBundle\AdminList\Configurator\AdminListConfiguratorInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * The admin list controller for Satellite
 */
class SatelliteAdminListController extends AdminListController
{

    /**
     * @var AdminListConfiguratorInterface
     */
    private $configurator;

    /**
     * @return AdminListConfiguratorInterface
     */
    public function getAdminListConfigurator()
    {
        if (!isset($this->configurator)) {
            $this->configurator = new SatelliteAdminListConfigurator($this->getDoctrine()->getManager());
        }

        return $this->configurator;
    }

    /**
     * The index action
     *
     * @Route("/", name="sandboxwebsitebundle_admin_satellite")
     */
    public function indexAction()
    {
        return parent::doIndexAction($this->getAdminListConfigurator());
    }

    /**
     * The add action
     *
     * @Route("/add", name="sandboxwebsitebundle_admin_satellite_add")
     * @Method({"GET", "POST"})
     * @return array
     */
    public function addAction()
    {
        return parent::doAddAction($this->getAdminListConfigurator());
    }

    /**
     * The edit action
     *
     * @param int $id
     *
     * @Route("/{id}", requirements={"id" = "\d+"}, name="sandboxwebsitebundle_admin_satellite_edit")
     * @Method({"GET", "POST"})
     *
     * @return array
     */
    public function editAction($id)
    {
        return parent::doEditAction($this->getAdminListConfigurator(), $id);
    }

    /**
     * The delete action
     *
     * @param int $id
     *
     * @Route("/{id}/delete", requirements={"id" = "\d+"}, name="sandboxwebsitebundle_admin_satellite_delete")
     * @Method({"GET", "POST"})
     *
     * @return array
     */
    public function deleteAction($id)
    {
        return parent::doDeleteAction($this->getAdminListConfigurator(), $id);
    }

    /**
     * @Route("/export.{_format}", requirements={"_format" = "csv"}, name="sandboxwebsitebundle_admin_satellite_export")
     * @Method({"GET", "POST"})
     * @return array
     */
    public function exportAction($_format)
    {
        return parent::doExportAction($this->getAdminListConfigurator(), $_format);
    }

}
