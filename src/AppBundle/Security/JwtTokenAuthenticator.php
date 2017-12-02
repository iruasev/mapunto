<?php
namespace AppBundle\Security;

use AppBundle\Entity\Usuario;
use Doctrine\ORM\EntityManager;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTDecodeFailureException;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor;
use Symfony\Component\HttpFoundation\{
    JsonResponse, Response, Request
};
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\{
    AuthenticationException, CustomUserMessageAuthenticationException
};
use Symfony\Component\Security\Core\User\{
    UserInterface, UserProviderInterface
};
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class JwtTokenAuthenticator extends AbstractGuardAuthenticator
{
    /**
     * @var JWTEncoderInterface
     */
    private $jwtEncoder;
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * JwtTokenAuthenticator constructor.
     *
     * @param JWTEncoderInterface $jwtEncoder
     * @param EntityManager       $em
     */
    public function __construct(JWTEncoderInterface $jwtEncoder, EntityManager $em)
    {
        $this->jwtEncoder = $jwtEncoder;
        $this->em         = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function getCredentials(Request $request)
    {
        $extractor = new AuthorizationHeaderTokenExtractor('', 'Authorization');

        $token = $extractor->extract($request);

        if (! $token) {
            return null;
        }

        return $token;
    }

    /**
     * {@inheritdoc}
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        try {
            /*
             * $data is now an array of whatever information we originally put into the token.
             * Fundamentally, this works just like a normal json_decode, except that
             * the library is also checking to make sure that the contents of our token weren't changed.
             * It does this by using our private key.
             * This guarantees that nobody has changed the username to some other username because they're a jerk.
             * Encryption is amazing.
             * It also checks the token's expiration: our tokens last 1 hour because that's what we setup in config.yml
             */
            $data = $this->jwtEncoder->decode($credentials);
        } catch (JWTDecodeFailureException $e) {
            throw new CustomUserMessageAuthenticationException('Invalid Token');
        }

        $username = $data['username'];

        // If user is not found NULL is returned and auth will fail.
        // If user is found Symfony will call checkCredentials
        return $this->em->getRepository(Usuario::class)->findOneBy(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        // check credentials - e.g. make sure the password is valid
        // no credential check is needed in this case

        // return true to cause authentication success
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $data = array(
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        );

        return new JsonResponse($data, Response::HTTP_FORBIDDEN);
    }

    /**
     * {@inheritdoc}
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // on success, let the request continue
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsRememberMe()
    {
        // N/A
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $data = array(
            // you might translate this message
            'message' => 'Authentication Required'
        );

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }
}