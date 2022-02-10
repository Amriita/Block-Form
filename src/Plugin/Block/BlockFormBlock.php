<?php
/**
 * @file
 * Contains \Drupal\block_form\Plugin\Block\BlockFormBlock
 */

namespace Drupal\block_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides block_form  Block
 * @block(
 *   id = "block_from_block",
 *   admin_label = @Translation("Form Block"),
 *   )
 */

 class BlockFormBlock extends BlockBase {
     /**
      *  {@inheritdoc}
      */
    public function build(){
        $builtForm = \Drupal::formBuilder()->getForm('Drupal\block_form\Form\BlockForm');
        $renderArray['form'] = $builtForm;

        return $renderArray;
    }
 }