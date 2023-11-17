<?php
namespace Vendor\Grid\Api\Data;
interface GridInterface
{
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
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId);

    /**
     * Get First Name.
     *
     * @return varchar
     */
    public function getFirstName();

    /**
     * Set First Name.
     */
    public function setFirstName($firstName);

    /**
     * Get Last Name.
     *
     * @return varchar
     */
    public function getLastName();

    /**
     * Set Last Name.
     */
    public function setLastName($lastName);

    /**
     * Get Email.
     *
     * @return varchar
     */
    public function getEmail();

    /**
     * Set Email.
     */
    public function setEmail($email);

    /**
     * Get Password.
     *
     * @return varchar
     */
    public function getPassword();

    /**
     * Set Password.
     */
    public function setPassword($password);

    /**
     * Get Age.
     *
     * @return int
     */
    public function getAge();

    /**
     * Set Age.
     */
    public function setAge($age);

    /**
     * Get Gender.
     *
     * @return varchar
     */
    public function getGender();

    /**
     * Set Gender.
     */
    public function setGender($gender);

    /**
     * Get Address.
     *
     * @return varchar
     */
    public function getAddress();

    /**
     * Set Address.
     */
    public function setAddress($address);

    /**
     * Get Country.
     *
     * @return varchar
     */
    public function getCountry();

    /**
     * Set Country.
     */
    public function setCountry($country);

    /**
     * Get DOB.
     *
     * @return date
     */
    public function getDob();

    /**
     * Set DOB.
     */
    public function setDob($dob);

    /**
     * Get Contact.
     *
     * @return int
     */
    public function getContact();

    /**
     * Set Contact.
     */
    public function setContact($contact);

    /**
     * Get Fresher.
     *
     * @return varchar
     */
    public function getFresher();

    /**
     * Set Fresher.
     */
    public function setFresher($fresher);

    /**
     * Get Company Name.
     *
     * @return varchar
     */
    public function getCompanyName();

    /**
     * Set Company Name.
     */
    public function setCompanyName($companyName);

    /**
     * Get Role.
     *
     * @return varchar
     */
    public function getRole();

    /**
     * Set Role.
     */
    public function setRole($role);

    /**
     * Get Date of Joining.
     *
     * @return date
     */
    public function getDateOfJoining();

    /**
     * Set Date of Joining.
     */
    public function setDateOfJoining($dateOfJoining);

    /**
     * Get Date of Leaving.
     *
     * @return date
     */
    public function getDateOfLeaving();

    /**
     * Set Date of Leaving.
     */
    public function setDateOfLeaving($dateOfLeaving);

    /**
     * Get Current Salary.
     *
     * @return int
     */
    public function getCurrentSalary();

    /**
     * Set Current Salary.
     */
    public function setCurrentSalary($currentSalary);

    /**
     * Get Expected Salary.
     *
     * @return int
     */
    public function getExpectedSalary();

    /**
     * Set Expected Salary.
     */
    public function setExpectedSalary($expectedSalary);

    /**
     * Get Relocate.
     *
     * @return varchar
     */
    public function getRelocate();

    /**
     * Set Relocate.
     */
    public function setRelocate($relocate);

    /**
     * Get Shift Basis.
     *
     * @return varchar
     */
    public function getShiftBasis();

    /**
     * Set Shift Basis.
     */
    public function setShiftBasis($shiftBasis);

    /**
     * Get Skills.
     *
     * @return text
     */
    public function getSkills();

    /**
     * Set Skills.
     */
    public function setSkills($skills);

    /**
     * Get Resume.
     *
     * @return varchar
     */
    public function getResume();

    /**
     * Set Resume.
     */
    public function setResume($resume);
}
