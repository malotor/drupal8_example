<?php
/**
 * @file
 * Contains \Drupal\example\Controller\ServiceDemoController.
 */
namespace Drupal\example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Service Example page controller.
 */
class ServiceDemoController extends ControllerBase {

  private $welcometext;

  public function __construct($serviceDemo) {
    $this->welcometext = $serviceDemo->getText();
  }

	/**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    return new static(
      // Load the service required to construct this class.
      $container->get('example.example_service')
    );
  }

  /**
   * Generates an example page.
   */
  public function content() {

    return array(
      '#markup' => $this->welcometext,
    );
  }
}