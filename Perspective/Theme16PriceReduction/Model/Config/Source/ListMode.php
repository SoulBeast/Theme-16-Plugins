<?php
namespace Perspective\Theme16PriceReduction\Model\Config\Source;

class ListMode implements \Magento\Framework\Data\OptionSourceInterface
{
 public function toOptionArray()
 {
  return [
    // --- --- Men->Tops --- --- //
    ['value' => '14', 'label' => __('Jackets')],
    ['value' => '15', 'label' => __('Hoodies')],
    ['value' => '16', 'label' => __('Tees')],
    ['value' => '17', 'label' => __('Tanks')],
    // --- --- Men->Bottoms --- --- //
    ['value' => '18', 'label' => __('Pants')],
    ['value' => '19', 'label' => __('Shorts')]
  ];
 }
}
