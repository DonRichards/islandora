<?php
/**
 * @file
 * Contains \Drupal\islandora\Controller\HomeController.
 */

namespace Drupal\islandora\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Views\ViewExecutable;
use Drupal\views\Views;

class HomeController extends ControllerBase {
  public function welcome() {
    return [
        '#theme' => 'welcome'
      ];
  }
}
