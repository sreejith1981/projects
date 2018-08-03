<?php

namespace AppBundle\Lib;

use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

/**
 * jwt helper class for benchmark api.
 *  
 * @author Vishnu prasad vs < Vishnuprasad@vinamsolutions.com >
 */
class JwtTokenAuthenticator extends AbstractGuardAuthenticator {

    private $jwtEncoder;
    

    public function __construct(JWTEncoderInterface $jwtEncoder) {
        $this->jwtEncoder = $jwtEncoder;
       
    }

    public function start(Request $request, AuthenticationException $authException = null): Response {
        
    }

    public function checkCredentials($credentials, UserInterface $user): bool {
        return true;
    }

    public function getCredentials(Request $request) {
        $extractor = new JwtExtractor(
                'Bearer', 'Authorization'
        );

        $token = $extractor->extract($request);
        if (!$token) {
            return "";
        }
        return $token;
    }

    public function getUser($credentials, UserProviderInterface $userProvider = null) {
        $user = array('cid' => 0, 'username' => '', 'exp' => 0);
        try {
            $data = $this->jwtEncoder->decode($credentials);
            if ($data === false) {
                $user['cid'] = 0;
                $user['username'] = '';
                $user['exp'] = 0;
            } else {
                $user['cid'] = $data['cid'];
                $user['username'] = $data['username'];
                $user['exp'] = $data['exp'];
            }
        } catch (\Exception $e) {
            $user['cid'] = 0;
            $user['username'] = '';
            $user['exp'] = 0;
        }
        return $user;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey) {
        
    }

    public function supportsRememberMe(): bool {
        return false;
    }

}

class JwtExtractor extends AuthorizationHeaderTokenExtractor {

    /**
     * @var string
     */
    protected $prefix;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param string|null $prefix
     * @param string      $name
     */
    public function __construct($prefix, $name) {
        $this->prefix = $prefix;
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function extract(Request $request) {
        $headers = getallheaders();
       
        if (empty($headers['authorization'])&&empty($headers['Authorization'])) {
            return false;
        }

        $authorizationHeader = isset($headers['authorization'])?$headers['authorization']:$headers['Authorization'];

        if (empty($this->prefix)) {
            return $authorizationHeader;
        }

        $headerParts = explode(' ', $authorizationHeader);

        if (!(2 === count($headerParts) && $headerParts[0] === $this->prefix)) {
            return false;
        }

        return $headerParts[1];
    }

}
