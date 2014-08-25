<?php
/**
 * @file
 * Contains \Drupal\example\Controller\UserInfoController.
 */
namespace Drupal\example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountInterface;


/**
 * Example page controller.
 */
class UserInfoController extends ControllerBase { 
	
	/**
   * @var AccountInterface $account
   */
  protected $account;

  /**
   * Class constructor.
   */
  public function __construct(AccountInterface $account) {
    $this->account = $account;
  }

	/**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    return new static(
      // Load the service required to construct this class.
      $container->get('current_user')
    );
  }

  /**
   * Generates an example page.
   */
  public function content() {
  	
    $header = array(
      $this->t('Uid'),
      $this->t('Username'),
      $this->t('Email'),
    );

    $rows = array(
      array(
        $this->account->id(),
        $this->account->getUsername(), 
        $this->account->getEmail(),
      ),
    );
    
    return array(
      'title' => array(
        '#markup' => t('This is your user information.'),
      ),
      'table' => array(
        '#theme' => 'table',
        '#header' => $header,
        '#rows' => $rows,
        '#attributes' => array('class' => array('table-class')),
      ),
    );

  }
}