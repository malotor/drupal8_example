<?php
/**
 * @file
 * Contains \Drupal\example\Controller\AdvancedExampleController.
 */
namespace Drupal\example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountInterface;


/**
 * Example page controller.
 */
class AdvancedExampleController extends ControllerBase { 
	
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
  	// Get current user data.

    $uid = $this->account->id();
    $username = $this->account->getUsername();
    $email = $this->account->getEmail();

    $header = array(t('Uid'), t('Username'), t('Email'));
    $rows = array(
      array($uid, $username, $email),
    );
    
    return array(
      'title' => array(
        '#markup' => t('Account information'),
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