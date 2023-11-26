<?
namespace Vendor\Restrictions\Plugin;

use Magento\CatalogSearch\Model\Search\IndexBuilder;
use Magento\Customer\Model\Session as CustomerSession;

class SearchBoxPlugin
{
    protected $customerSession;

    public function __construct(
        CustomerSession $customerSession
    ) {
        $this->customerSession = $customerSession;
    }

    public function aroundBuild(
        IndexBuilder $subject,
        \Closure $proceed,
        array $data
    ) {
        $customerGroupId = $this->customerSession->getCustomerGroupId();

        // For not-logged-in customers, Magento uses the customer group with ID 0 (NOT LOGGED IN)
        $customerGroupId = ($customerGroupId) ? $customerGroupId : 0;

        // Check customer group and modify the search query accordingly
        if ($customerGroupId == 2) {
            $data['select']->where('e.wholesale_visibility = ?', 1); // Show products where wholesale_visibility is "no"
        } else {
            $data['select']->where('e.wholesale_visibility = ?', 0);
        }

        return $proceed($data);
    }
}
