<?php

namespace Vendor\Grid\Model;
use Vendor\Grid\Api\Data\GridInterface;
class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface{

    const ID = 'id';
    const FIRST_NAME = 'firstname';
    const LAST_NAME = 'lastname';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const AGE = 'age';
    const GENDER = 'gender';
    const ADDRESS = 'address';
    const COUNTRY = 'country';
    const DOB = 'dob';
    const CONTACT = 'contact';
    const FRESHER = 'fresher';
    const COMPANY_NAME = 'companyname';
    const ROLE = 'role';
    const DATE_OF_JOINING = 'dateofjoining';
    const DATE_OF_LEAVING = 'dateofleaving';
    const CURRENT_SALARY = 'currentsalary';
    const EXPECTED_SALARY = 'expectedsalary';
    const RELOCATE = 'rellocate';
    const SHIFT_BASIS = 'shiftbasis';
    const SKILLS = 'skills';
    const RESUME = 'resume';

    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'eodform';

    /**
     * @var string
     */
    protected $_cacheTag = 'eodform';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'eodform';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Vendor\Grid\Model\ResourceModel\Grid');
    }

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ID, $entityId);
    }

    /**
     * Get First Name.
     *
     * @return varchar
     */
    public function getFirstName()
    {
        return $this->getData(self::FIRST_NAME);
    }

    /**
     * Set First Name.
     */
    public function setFirstName($firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }

    /**
     * Get Last Name.
     *
     * @return varchar
     */
    public function getLastName()
    {
        return $this->getData(self::LAST_NAME);
    }

    /**
     * Set Last Name.
     */
    public function setLastName($lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * Get Email.
     *
     * @return varchar
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Email.
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get Password.
     *
     * @return varchar
     */
    public function getPassword()
    {
        return $this->getData(self::PASSWORD);
    }

    /**
     * Set Password.
     */
    public function setPassword($password)
    {
        return $this->setData(self::PASSWORD, $password);
    }

    /**
     * Get Age.
     *
     * @return int
     */
    public function getAge()
    {
        return $this->getData(self::AGE);
    }

    /**
     * Set Age.
     */
    public function setAge($age)
    {
        return $this->setData(self::AGE, $age);
    }

    /**
     * Get Gender.
     *
     * @return varchar
     */
    public function getGender()
    {
        return $this->getData(self::GENDER);
    }

    /**
     * Set Gender.
     */
    public function setGender($gender)
    {
        return $this->setData(self::GENDER, $gender);
    }

    /**
     * Get Address.
     *
     * @return varchar
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * Set Address.
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * Get Country.
     *
     * @return varchar
     */
    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    /**
     * Set Country.
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * Get DOB.
     *
     * @return date
     */
    public function getDob()
    {
        return $this->getData(self::DOB);
    }

    /**
     * Set DOB.
     */
    public function setDob($dob)
    {
        return $this->setData(self::DOB, $dob);
    }

    /**
     * Get Contact.
     *
     * @return int
     */
    public function getContact()
    {
        return $this->getData(self::CONTACT);
    }

    /**
     * Set Contact.
     */
    public function setContact($contact)
    {
        return $this->setData(self::CONTACT, $contact);
    }

    /**
     * Get Fresher.
     *
     * @return varchar
     */
    public function getFresher()
    {
        return $this->getData(self::FRESHER);
    }

    /**
     * Set Fresher.
     */
    public function setFresher($fresher)
    {
        return $this->setData(self::FRESHER, $fresher);
    }

    /**
     * Get Company Name.
     *
     * @return varchar
     */
    public function getCompanyName()
    {
        return $this->getData(self::COMPANY_NAME);
    }

    /**
     * Set Company Name.
     */
    public function setCompanyName($companyName)
    {
        return $this->setData(self::COMPANY_NAME, $companyName);
    }

    /**
     * Get Role.
     *
     * @return varchar
     */
    public function getRole()
    {
        return $this->getData(self::ROLE);
    }

    /**
     * Set Role.
     */
    public function setRole($role)
    {
        return $this->setData(self::ROLE, $role);
    }

    /**
     * Get Date of Joining.
     *
     * @return date
     */
    public function getDateOfJoining()
    {
        return $this->getData(self::DATE_OF_JOINING);
    }

    /**
     * Set Date of Joining.
     */
    public function setDateOfJoining($dateOfJoining)
    {
        return $this->setData(self::DATE_OF_JOINING, $dateOfJoining);
    }

    /**
     * Get Date of Leaving.
     *
     * @return date
     */
    public function getDateOfLeaving()
    {
        return $this->getData(self::DATE_OF_LEAVING);
    }

    /**
     * Set Date of Leaving.
     */
    public function setDateOfLeaving($dateOfLeaving)
    {
        return $this->setData(self::DATE_OF_LEAVING, $dateOfLeaving);
    }

    /**
     * Get Current Salary.
     *
     * @return int
     */
    public function getCurrentSalary()
    {
        return $this->getData(self::CURRENT_SALARY);
    }

    /**
     * Set Current Salary.
     */
    public function setCurrentSalary($currentSalary)
    {
        return $this->setData(self::CURRENT_SALARY, $currentSalary);
    }

    /**
     * Get Expected Salary.
     *
     * @return int
     */
    public function getExpectedSalary()
    {
        return $this->getData(self::EXPECTED_SALARY);
    }

    /**
     * Set Expected Salary.
     */
    public function setExpectedSalary($expectedSalary)
    {
        return $this->setData(self::EXPECTED_SALARY, $expectedSalary);
    }

    /**
     * Get Relocate.
     *
     * @return varchar
     */
    public function getRelocate()
    {
        return $this->getData(self::RELOCATE);
    }

    /**
     * Set Relocate.
     */
    public function setRelocate($relocate)
    {
        return $this->setData(self::RELOCATE, $relocate);
    }

    /**
     * Get Shift Basis.
     *
     * @return varchar
     */
    public function getShiftBasis()
    {
        return $this->getData(self::SHIFT_BASIS);
    }

    /**
     * Set Shift Basis.
     */
    public function setShiftBasis($shiftBasis)
    {
        return $this->setData(self::SHIFT_BASIS, $shiftBasis);
    }

    /**
     * Get Skills.
     *
     * @return text
     */
    public function getSkills()
    {
        return $this->getData(self::SKILLS);
    }

    /**
     * Set Skills.
     */
    public function setSkills($skills)
    {
        return $this->setData(self::SKILLS, $skills);
    }

    /**
     * Get Resume.
     *
     * @return varchar
     */
    public function getResume()
    {
        return $this->getData(self::RESUME);
    }

    /**
     * Set Resume.
     */
    public function setResume($resume)
    {
        return $this->setData(self::RESUME, $resume);
    }
}
