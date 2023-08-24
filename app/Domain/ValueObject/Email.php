<?php


namespace App\Domain\ValueObject;


use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * Class Email
 *
 * @package App\Domain\ValueObject
 * @ORM\Embeddable()
 */
final class Email
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $email;
    
    /**
     * Email constructor.
     *
     * @param string $email
     */
    private function __construct(string $email)
    {
        $this->email = $email;
    }
    
    /**
     * @param string $email
     *
     * @return \App\Domain\ValueObject\Email
     */
    #[Pure]
    public static function create(string $email): Email
    {
        return new self($email);
    }
    
    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }
}