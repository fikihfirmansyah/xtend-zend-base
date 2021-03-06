<?php

namespace User\V1;

use Zend\EventManager\Event;
use User\Entity\ResetPassword;
use Aqilix\OAuth2\Entity\OauthUsers as User;
use User\Entity\UserProfile;

class ResetPasswordEvent extends Event
{
    /**#@+
     * Signup events triggered by eventmanager
     */
    const EVENT_RESET_PASSWORD_CONFIRM_EMAIL = 'reset.password.confirm.email';
    const EVENT_RESET_PASSWORD_CONFIRM_EMAIL_SUCCESS = 'reset.password.confirm.email.success';
    const EVENT_RESET_PASSWORD_CONFIRM_EMAIL_ERROR   = 'reset.password.confirm.email.error';
    const EVENT_RESET_PASSWORD_RESET = 'reset.password.reset';
    const EVENT_RESET_PASSWORD_RESET_SUCCESS = 'reset.password.reset.success';
    const EVENT_RESET_PASSWORD_RESET_ERROR   = 'reset.password.reset.error';
    /**#@-*/

    /**
     * @var \User\Entity\ResetPassword
     */
    protected $resetPasswordEntity;

    /**
     * @var \Aqilix\OAuth2\Entity\OauthUsers
     */
    protected $userEntity;

    /**
     * @var \User\Entity\UserProfile
     */
    protected $userProfileEntity;

    /**
     * @var string
     */
    protected $resetPasswordKey;

    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var array
     */
    protected $resetPasswordData;

    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * @return the $resetPasswordData
     */
    public function getResetPasswordData()
    {
        return $this->resetPasswordData;
    }

    /**
     * @param array $resetPasswordData
     */
    public function setResetPasswordData($resetPasswordData)
    {
        $this->resetPasswordData = $resetPasswordData;
    }

    /**
     * @param Exception $exception
     */
    public function setException(\Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * @return the $resetPasswordEntity
     */
    public function getResetPasswordEntity()
    {
        return $this->resetPasswordEntity;
    }

    /**
     * @param \User\Entity\ResetPassword $resetPasswordEntity
     */
    public function setResetPasswordEntity(ResetPassword $resetPasswordEntity)
    {
        $this->resetPasswordEntity = $resetPasswordEntity;
    }

    /**
     * @return the $userProfileEntity
     */
    public function getUserProfileEntity()
    {
        return $this->userProfileEntity;
    }

    /**
     * @param \User\Entity\UserProfile $userProfileEntity
     */
    public function setUserProfileEntity(UserProfile $userProfileEntity)
    {
        $this->userProfileEntity = $userProfileEntity;
    }

    /**
     * @return the $resetPasswordKey
     */
    public function getResetPasswordKey()
    {
        return $this->resetPasswordKey;
    }

    /**
     * @param string $resetPasswordKey
     */
    public function setResetPasswordKey($resetPasswordKey)
    {
        $this->resetPasswordKey = $resetPasswordKey;
    }

    /**
     * @return \Aqilix\OAuth2\Entity\OauthUsers
     */
    public function getUserEntity()
    {
        return $this->userEntity;
    }

    /**
     * @param \Aqilix\OAuth2\Entity\OauthUsers $userEntity
     */
    public function setUserEntity(User $userEntity)
    {
        $this->userEntity = $userEntity;
    }

    /**
     * Get Email Address
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set Email Address
     *
     * @param  emailAddress $emailAddress
     * @return \User\V1\ResetPasswordEvent
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @return the $exception
     */
    public function getException()
    {
        return $this->exception;
    }
}
