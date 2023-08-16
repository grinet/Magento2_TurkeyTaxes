<?php
/**
 * @category   GriNet
 * @package    Grinet_VergiBilgisi
 * @copyright  Copyright (c) 2010 GriNet Internet ve Yazilim Hizmetleri // http://www.grinet.com.tr
 * @developer  Hidayet Ok - hidonet@gmail.com - hidayet@grinet.com.tr
 * @license    Freeware
 */

namespace Grinet\TurkeyTaxes\Setup;

use Magento\Directory\Helper\Data;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * Tax setup factory
     *
     * @var TaxSetupFactory
     */
    private $taxSetupFactory;

    /**
     * Init
     *
     * @param TaxSetupFactory $taxSetupFactory
     */
    public function __construct()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup,ModuleContextInterface $context) 
    {
		$this->conn = $setup->getConnection();

		$customer_tax_class_id = 3;

		/**
         * install tax classes
         */
		
		$tax_arr = [
						'20'	=> 'KDV %20',
						'10'	=> 'KDV %10',
						'1'		=> 'KDV %1',
						'0'		=> 'KDV %0',
						];
		
		$position = 0;
		foreach ($tax_arr as $tax_rate => $tax_name) 
		{

			/// Tax Class 

			$data = [
					'class_id' => NULL,
					'class_name' => $tax_name,
					'class_type' => \Magento\Tax\Model\ClassModel::TAX_CLASS_TYPE_PRODUCT,
					];
			$this->conn->insert($setup->getTable('tax_class'), $data);
			$tax_class_id =  $this->conn->lastInsertId();

			/// Tax Calculation Rule
			$position++;
			$data = [
					'tax_calculation_rule_id'  => NULL,
					'code'                     => $tax_name,
					'priority'                 => 0,
					'position'                 => $position,
					'calculate_subtotal'       => 0,
					];
			$this->conn->insert($setup->getTable('tax_calculation_rule'), $data);
			$tax_calculation_rule_id =  $this->conn->lastInsertId();

			/// Tax Calculation Rate

			$data = [
					'tax_calculation_rate_id'  => NULL,
					'tax_country_id'           => 'TR',
					'tax_region_id'            => 0,
					'tax_postcode'             => '*',
					'code'                     => $tax_name,
					'rate'                     => $tax_rate,
					'zip_is_range'             => '',
					'zip_from'                 => '',
					'zip_to'                   => '',
					];
			$this->conn->insert($setup->getTable('tax_calculation_rate'), $data);
			$tax_calculation_rate_id =  $this->conn->lastInsertId();

			/// Tax Calculation

			$data = [
//					'tax_calculation_id'       => null,
					'tax_calculation_rate_id'  => $tax_calculation_rate_id,
					'tax_calculation_rule_id'  => $tax_calculation_rule_id,
					'customer_tax_class_id'    => $customer_tax_class_id,
					'product_tax_class_id'     => $tax_class_id,
					];
			
			//$ret = $this->conn->insert($setup->getTable('tax_calculation'), $data)->getSelect();
			$this->conn->insert($setup->getTable('tax_calculation'), $data);


		} // foreach sonu

    }

	// #######################################################################################################
	public function tr2en($text) {

		$trans=array(
						"Ç" => "C",
						"Ğ" => "G",
						"İ" => "I",
						"Ö" => "O",
						"Ş" => "S",
						"Ü" => "U",
						"ç" => "c",
						"ğ" => "g",
						"ı" => "i",
						"ö" => "o",
						"ş" => "s",
						"ü" => "u",
					);
		
		return strtr($text,$trans);

	} // function sonu #######################################################################################

}
