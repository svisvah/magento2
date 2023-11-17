<?php
/**
 * Vendor_Grid Add New Row Form Admin Block.
 * @category    Vendor
 * @package     Vendor_Grid
 * @author      Vendor Software Private Limited
 *
 */
namespace Vendor\Grid\Block\Adminhtml\Grid\Edit;

/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context,
     * @param \Magento\Framework\Registry $registry,
     * @param \Magento\Framework\Data\FormFactory $formFactory,
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
     * @param \Vendor\Grid\Model\Status $options,
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Vendor\Grid\Model\Status $options,
        array $data = []
    ) {
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('eodform');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'firstname',
            'text',
            [
                'name' => 'firstname',
                'label' => __('First Name'),
                'id' => 'firstname',
                'title' => __('First Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'lastname',
            'text',
            [
                'name' => 'lastname',
                'label' => __('Last Name'),
                'id' => 'lastname',
                'title' => __('Last Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'id' => 'email',
                'title' => __('Email'),
                'class' => 'required-entry validate-email',
                'required' => true,
            ]
        );

        // ...

$fieldset->addField(
    'password',
    'password',
    [
        'name' => 'password',
        'label' => __('Password'),
        'id' => 'password',
        'title' => __('Password'),
        'class' => 'required-entry',
        'required' => true,
    ]
);

$fieldset->addField(
    'age',
    'text',
    [
        'name' => 'age',
        'label' => __('Age'),
        'id' => 'age',
        'title' => __('Age'),
        'class' => 'required-entry validate-number',
        'required' => true,
    ]
);

$fieldset->addField(
    'gender',
    'select',
    [
        'name' => 'gender',
        'label' => __('Gender'),
        'id' => 'gender',
        'title' => __('Gender'),
        'values' => [
            ['value' => 'male', 'label' => __('Male')],
            ['value' => 'female', 'label' => __('Female')],
        ],
        'class' => 'required-entry',
        'required' => true,
    ]
);

$fieldset->addField(
    'address',
    'text',
    [
        'name' => 'address',
        'label' => __('Address'),
        'id' => 'address',
        'title' => __('Address'),
        'class' => 'required-entry',
        'required' => true,
    ]
);

$fieldset->addField(
    'country',
    'text',
    [
        'name' => 'country',
        'label' => __('Country'),
        'id' => 'country',
        'title' => __('Country'),
        'class' => 'required-entry',
        'required' => true,
    ]
);

$fieldset->addField(
    'dob',
    'date',
    [
        'name' => 'dob',
        'label' => __('Date of Birth'),
        'date_format' => $dateFormat,
        'time_format' => 'H:mm:ss',
        'class' => 'required-entry validate-date',
        'style' => 'width:200px',
        'required' => true,
    ]
);

// ...

$fieldset->addField(
    'contact',
    'text',
    [
        'name' => 'contact',
        'label' => __('Contact'),
        'id' => 'contact',
        'title' => __('Contact'),
        'class' => 'required-entry validate-number',
        'required' => true,
    ]
);

$fieldset->addField(
    'fresher',
    'select',
    [
        'name' => 'fresher',
        'label' => __('Fresher'),
        'id' => 'fresher',
        'title' => __('Fresher'),
        'values' => [
            ['value' => 'yes', 'label' => __('Yes')],
            ['value' => 'no', 'label' => __('No')],
        ],
        'class' => 'required-entry',
        'required' => true,
    ]
);

$fieldset->addField(
    'companyname',
    'text',
    [
        'name' => 'companyname',
        'label' => __('Company Name'),
        'id' => 'companyname',
        'title' => __('Company Name'),
    ]
);

$fieldset->addField(
    'role',
    'text',
    [
        'name' => 'role',
        'label' => __('Role'),
        'id' => 'role',
        'title' => __('Role'),
    ]
);

$fieldset->addField(
    'dateofjoining',
    'date',
    [
        'name' => 'dateofjoining',
        'label' => __('Date of Joining'),
        'date_format' => $dateFormat,
        'time_format' => 'H:mm:ss',
        'class' => 'validate-date',
        'style' => 'width:200px',
    ]
);

$fieldset->addField(
    'dateofleaving',
    'date',
    [
        'name' => 'dateofleaving',
        'label' => __('Date of Leaving'),
        'date_format' => $dateFormat,
        'time_format' => 'H:mm:ss',
        'class' => 'validate-date',
        'style' => 'width:200px',
    ]
);

$fieldset->addField(
    'currentsalary',
    'text',
    [
        'name' => 'currentsalary',
        'label' => __('Current Salary'),
        'id' => 'currentsalary',
        'title' => __('Current Salary'),
    ]
);

$fieldset->addField(
    'expectedsalary',
    'text',
    [
        'name' => 'expectedsalary',
        'label' => __('Expected Salary'),
        'id' => 'expectedsalary',
        'title' => __('Expected Salary'),
        'class' => 'required-entry validate-number',
        'required' => true,
    ]
);

$fieldset->addField(
    'rellocate',
    'select',
    [
        'name' => 'rellocate',
        'label' => __('Willing to Relocate'),
        'id' => 'rellocate',
        'title' => __('Willing to Relocate'),
        'values' => [
            ['value' => 'yes', 'label' => __('Yes')],
            ['value' => 'no', 'label' => __('No')],
        ],
        'class' => 'required-entry',
        'required' => true,
    ]
);

$fieldset->addField(
    'shiftbasis',
    'select',
    [
        'name' => 'shiftbasis',
        'label' => __('Shifting Basis'),
        'id' => 'shiftbasis',
        'title' => __('Shifting Basis'),
        'values' => [
            ['value' => 'yes', 'label' => __('Yes')],
            ['value' => 'no', 'label' => __('No')],
        ],
        'class' => 'required-entry',
        'required' => true,
    ]
);

$fieldset->addField(
    'skills',
    'text',
    [
        'name' => 'skills',
        'label' => __('Skills'),
        'id' => 'skills',
        'title' => __('Skills'),
        'class' => 'required-entry',
        'required' => true,
    ]
);

$fieldset->addField(
    'resume',
    'file',
    [
        'name' => 'resume',
        'label' => __('Resume'),
        'id' => 'resume',
        'title' => __('Resume'),
        'class' => 'required-entry',
        'required' => true,
    ]
);




        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
