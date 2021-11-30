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
    $frontPage = \Drupal::configFactory()->get('system.site')->get('page.front');
    $original_template = \Drupal::service('file_system')->realpath(\Drupal::service('module_handler')->getModule('islandora')->getPath());
    $theme_templates = DRUPAL_ROOT . '/' . drupal_get_path('theme', \Drupal::config('system.theme')->get('default')) . '/templates';
    if (! file_exists($theme_templates . '/welcome.html.twig')) {
        copy( $original_template . '/templates/welcome.html.twig', $theme_templates . '/welcome.html.twig');
        copy( $original_template . '/templates/welcome_base.html.twig', $theme_templates . '/welcome_base.html.twig');
    }
    if ($frontPage != '/welcome') {
        \Drupal::configFactory()->getEditable('system.site')->set('page.front', '/welcome')->save();
    }
    return [
        '#theme' => 'welcome'
      ];
  }
}
