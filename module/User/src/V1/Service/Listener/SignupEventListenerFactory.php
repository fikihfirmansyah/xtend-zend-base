<?php
namespace User\V1\Service\Listener;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class SignupEventListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $qrCodeMapper = $container->get(\QRCode\Mapper\QRCode::class);
        $userMapper = $container->get('Aqilix\OAuth2\Mapper\OauthUsers');
        $userProfileMapper    = $container->get('User\Mapper\UserProfile');
        $userActivationMapper = $container->get('User\Mapper\UserActivation');
        $accessTokensMapper  = $container->get('Aqilix\OAuth2\Mapper\OauthAccessTokens');
        $refreshTokensMapper = $container->get('Aqilix\OAuth2\Mapper\OauthRefreshTokens');
        $oauth2AccessToken   = $container->get('oauth2.accessToken');
        $userProfileHydrator = $container->get('HydratorManager')->get('User\Hydrator\UserProfile');
        $qrCodeHydrator = $container->get('HydratorManager')->get('QRCode\\Hydrator\\QRCode');
        $config = $container->get('Config');
        $signupEventConfig = [
            'expires_in' => $config['zf-oauth2']['access_lifetime'],
            'client_id'  => 'testclient',
            'token_type' => 'Bearer',
            'scope' => null
        ];
        $signupEventListener = new SignupEventListener(
            $oauth2AccessToken,
            $userMapper,
            $userProfileMapper,
            $userActivationMapper,
            $accessTokensMapper,
            $refreshTokensMapper,
            $qrCodeMapper,
            $signupEventConfig
        );
        $signupEventListener->setQrCodeHydrator($qrCodeHydrator);
        $signupEventListener->setUserProfileHydrator($userProfileHydrator);
        $signupEventListener->setLogger($container->get("logger_default"));
        return $signupEventListener;
    }
}
